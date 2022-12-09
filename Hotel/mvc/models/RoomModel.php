<?php

class RoomModel extends DB{

    public $item_in_page = 4;
    public $statusRoom = Array();
    
    public function listAll(){
        $qr = "SELECT * FROM tb_rooms";
        $rows = mysqli_query($this->con, $qr);
        $list = array();

        while ($row = mysqli_fetch_array($rows)) {
            $list[] = $row;
        }
    
        return $list;
    }

    public function listAllLocation(){
        $qr = "SELECT * FROM tb_locations";
        $rows = mysqli_query($this->con, $qr);
        $list = array();

        while ($row = mysqli_fetch_array($rows)) {
            $list[] = $row;
        }
    
        return $list;
    }

    public function setItemPage($number){
        $this->item_in_page = $this->item_in_page + $number;
    }

    
    public function paginationRoom($element, $order){
        if (!isset($_SESSION['location'])) {
            $sql = "SELECT `tb_rooms`.`id_room`, `nameRoom`, `kind`, `rating`, `location`, `adult`, `children`, `bedroom`, `bathroom`, `price`, `image`, `description`, `status` 
                    FROM tb_rooms 
                    INNER JOIN tb_locations ON `tb_rooms`.`id_location` = `tb_locations`.`id_location` 
                    ORDER BY $element $order LIMIT $this->item_in_page";    
        }else {
            $sqlDate = "SELECT * FROM tb_room_reservations 
            WHERE id_location = ".$_SESSION['location']."
            
            AND 
            (
                (
                ('".$_SESSION['dateFrom']."' BETWEEN date_from AND date_to) OR ('".$_SESSION['dateTo']."' BETWEEN date_from AND date_to)
                )
                OR
                (
                (date_from BETWEEN '".$_SESSION['dateFrom']."' AND '".$_SESSION['dateTo']."') OR (date_to BETWEEN '".$_SESSION['dateFrom']."' AND '".$_SESSION['dateTo']."')
                )
            )";
            $dateRows = mysqli_query($this->con, $sqlDate);
            $numDate = $dateRows->num_rows;
            $statusList = array();

            while ($row = mysqli_fetch_array($dateRows)) {
                $statusList[] = $row;
            }

            for ($i=0; $i < $numDate; $i++) {
                array_push($this->statusRoom,$statusList[$i]['id_room']);
            }

            $sql = "SELECT `tb_rooms`.`id_room`, `nameRoom`, `kind`, `rating`, `location`, `adult`, `children`, `bedroom`, `bathroom`, `price`, `image`, `description`, `status`
            FROM tb_rooms 
            INNER JOIN tb_locations ON `tb_rooms`.`id_location` = `tb_locations`.`id_location`
            WHERE `tb_rooms`.`id_location` = ".$_SESSION['location']."
            AND (`adult` + `children`) >= ".$_SESSION['quantify']."
            ORDER BY $element $order LIMIT $this->item_in_page";  
        }

        $rows = mysqli_query($this->con, $sql);
        $list = array();
        while ($row = mysqli_fetch_array($rows)) {
            $list[] = $row;
        }

        return $list;
    }

    public function insertRoom($nameRoom, $kind, $image , $price , $status){
        $result = false;
        
        $sql = "INSERT INTO tb_rooms (nameRoom, kind, image ,price , status) VALUES ('$nameRoom', '$kind', '$image', '$price', '$status')";
        if (mysqli_query($this->con,$sql)) {
            $result = true;
        };
        return json_encode($result);
    }

    public function deleteRoom($id){
        $result = false;
        
        $sql = "DELETE FROM tb_rooms WHERE id = $id";
        if (mysqli_query($this->con,$sql)) {
            $result = true;
        };
        return json_encode($result);
    }

    public function editRoom($id,$nameRoom, $kind, $image , $price , $status){
        $result = false;

        $sql=  "UPDATE tb_rooms 
                SET nameRoom = '$nameRoom', 
                    kind = '$kind', 
                    image = '$image', 
                    price = '$price', 
                    status = '$status' 
                WHERE id = $id";
                
        if (mysqli_query($this->con,$sql)) {
            $result = true;
        };
        return json_encode($result);
    }

    public function detailRoom($id_room){
        $qr = "SELECT `tb_rooms`.`id_room`, `nameRoom`, `kind`, `rating`, `location`, `adult`, `children`, `bedroom`, `bathroom`, `price`, `image`, `description`, `status`
        FROM tb_rooms 
        INNER JOIN tb_locations ON `tb_rooms`.`id_location` = `tb_locations`.`id_location`
        WHERE `tb_rooms`.`id_room` = $id_room";
        $rows = mysqli_query($this->con, $qr);

        while ($row = mysqli_fetch_array($rows)) {
            $room = $row;
        }
    
        return $room;
    }

    public function searchRoom($location,$dateFrom,$dateTo,$quantify){
        //SQL DATE
        $sqlDate = "SELECT * FROM tb_room_reservations 
                WHERE id_location = $location 
                AND
                (
                    (
                    ('".$dateFrom."' BETWEEN date_from AND date_to) OR ('".$dateTo."' BETWEEN date_from AND date_to)
                    )
                    OR
                    (
                    (date_from BETWEEN '".$dateFrom."' AND '".$dateTo."') OR (date_to BETWEEN '".$dateFrom."' AND '".$dateTo."')
                    )
                )";
        $dateRows = mysqli_query($this->con, $sqlDate);
        $numDate = $dateRows->num_rows;
        $list = array();
        while ($row = mysqli_fetch_array($dateRows)) {
            $list[] = $row;
        }

        // LIST UNAVAILABLE ROOM
        for ($i=0; $i < $numDate; $i++) {
            array_push($this->statusRoom,$list[$i]['id_room']);
        }

        //SQL NUMBER OF PEOPLE
        $sqlQuantify = "SELECT * FROM `tb_rooms` WHERE (adult + children) >= $quantify";      
        $quantifyRows = mysqli_query($this->con, $sqlQuantify);
        $numQuantify = $quantifyRows->num_rows;
        

        //RESULT SEARCHING
        $sql = "SELECT `tb_rooms`.`id_room`, `nameRoom`, `kind`, `rating`, `location`, `adult`, `children`, `bedroom`, `bathroom`, `price`, `image`, `description`, `status`
             FROM tb_rooms 
             INNER JOIN tb_locations ON `tb_rooms`.`id_location` = `tb_locations`.`id_location`
             WHERE `tb_rooms`.`id_location` = $location
             AND (`adult` + `children`) >= $quantify       
             LIMIT $this->item_in_page ";
       
        $rows = mysqli_query($this->con, $sql);
        $list = array();
        while ($row = mysqli_fetch_array($rows)) {
            $list[] = $row;
        }
        return $list;
    }
}

?>