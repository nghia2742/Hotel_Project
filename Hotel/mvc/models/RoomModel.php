<?php

class RoomModel extends DB{

    public $item_in_page = 4;
    public $statusRoom = Array();
    
    public function listAll(){
        $sql = "SELECT * FROM tb_rooms";
        $rows = mysqli_query($this->con, $sql);
        $list = array();

        while ($row = mysqli_fetch_array($rows)) {
            $list[] = $row;
        }
    
        return $list;
    }

    public function listAllHistory(){
        $sql = "SELECT * FROM tb_history";
        $rows = mysqli_query($this->con, $sql);
        $list = array();

        while ($row = mysqli_fetch_array($rows)) {
            $list[] = $row;
        }
    
        return $list;
    }

    public function listAllReservation(){
        $sql = "SELECT * FROM tb_room_reservations";
        $rows = mysqli_query($this->con, $sql);
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

    public function getIdLocation(){
        $id = 0;
        $sql = "SELECT *  FROM `tb_locations` WHERE `location` LIKE '".$_SESSION['getPlace']."'";
        $location = mysqli_query($this->con,$sql);
        $row = mysqli_fetch_array($location);
        if (isset($row['id_location'])) {
            $id = $row['id_location'];
        }
        return $id;
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

    public function insertRoom($nameRoom, $kind, $rating, $idLocation, $adult, $children, $bedroom, $bathroom, $price, $image, $description  , $status){
        $result = false;
        $sql = "INSERT INTO `tb_rooms` (`id_room`, `nameRoom`, `kind`, `rating`, `id_location`, `adult`, `children`, `bedroom`, `bathroom`, `price`, `image`, `description`, `status`) 
        VALUES (NULL, '$nameRoom','$kind','$rating', '$idLocation', '$adult', '$children', '$bedroom', '$bathroom', '$price', '$image', '$description', '$status')
        ";
        if (mysqli_query($this->con,$sql)) {
            $result = true;
        };
        return $result;
    }

    public function deleteRoom($id){
        $result = false;
        
        $sql = "DELETE FROM tb_rooms WHERE id_room = $id";
        if (mysqli_query($this->con,$sql)) {
            $result = true;
        };
        return $result;
    }

    public function editRoom($id,$nameRoom, $kind, $rating, $idLocation, $adult, $children, $bedroom, $bathroom, $price, $image, $description, $status){
        $result = false;
        $sql=  "UPDATE tb_rooms 
                SET nameRoom = '$nameRoom', 
                    kind = '$kind', 
                    rating = '$rating', 
                    id_location = '$idLocation', 
                    adult = '$adult', 
                    children = '$children', 
                    bedroom = '$bedroom', 
                    bathroom = '$bathroom', 
                    price = '$price', 
                    image = '$image', 
                    description = '$description', 
                    status = '$status' 
                WHERE id_room = $id";
                
        if (mysqli_query($this->con,$sql)) {
            $result = true;
        };
        return $result;
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

    public function checkAvailableDate($room,$dateFrom,$dateTo) {
        $sqlDate = "SELECT * FROM tb_room_reservations 
                WHERE id_room = $room
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
        if ($numDate > 0) {
            return 1;
        }
        return 0;
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

    public function addReserved($idRoom, $idLocation, $idCustomer, $dateFrom, $dateTo, $price){
        $result = false;
        $dateFrom = date('Y-m-d',strtotime($dateFrom));
        $dateTo = date('Y-m-d',strtotime($dateTo));
        $sql = "INSERT INTO `tb_room_reservations` 
        (`id_reservation`, `id_room`, `id_location`, `id_customer`, `date_from`, `date_to`, `price`) 
        VALUES (NULL, '$idRoom', '$idLocation', '$idCustomer', '$dateFrom', '$dateTo', '$price');";

        if (mysqli_query($this->con,$sql)) {
            $result = true;
        };
        return  $result;
    }

    public function getLenReservation() {
        $sql = "SELECT * FROM `tb_room_reservations`";
        $rows = mysqli_query($this->con,$sql);
        return $rows->num_rows;
    }

    public function setHistory($idCustomer,$idReservation,$price){
        $result = false;
        $sql = "INSERT INTO `tb_history` (`id_customer`,`id_reservation`,`price`)
         VALUES ('$idCustomer','$idReservation','$price')";
        if (mysqli_query($this->con,$sql)) {
            $result = true;
        };
        return $result;
    }

    public function getHistory($idCustomer){
        $sql = "SELECT * FROM `tb_history` WHERE `id_customer` = $idCustomer";
        $rows = mysqli_query($this->con,$sql);
        
        $listHistory = array();
        while ($row = mysqli_fetch_array($rows)) {
            $listHistory[] = $row;
        }
        return $listHistory;
    }

    public function showViewDetail($idReservation){
        $sql = "SELECT 
        `tb_customers`.`name`, `tb_customers`.`email`, `tb_customers`.`phone`,
        `tb_rooms`.`nameRoom`, `tb_locations`.`location`, `tb_rooms`.`adult`, `tb_rooms`.`children`, 
        `tb_room_reservations`.`date_from`, `tb_room_reservations`.`date_to`,`tb_history`.`price`
        FROM `tb_room_reservations`, `tb_rooms` , `tb_locations`, `tb_customers`, `tb_history`
        WHERE 
        `tb_room_reservations`.`id_reservation` = $idReservation 
        AND `tb_room_reservations`.`id_room` = `tb_rooms`.`id_room`
        AND `tb_room_reservations`.`id_reservation` = `tb_history`.`id_reservation`
        AND `tb_rooms`.`id_location` = `tb_locations`.`id_location`
        AND `tb_room_reservations`.`id_customer` = `tb_customers`.`id_customer`";
        $rows = mysqli_query($this->con,$sql);
        
        $list = array();
        while ($row = mysqli_fetch_array($rows)) {
            $list[] = $row;
        }
        return $list;
    }
}

?>