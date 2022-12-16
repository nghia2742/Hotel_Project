<?php
class Ajax extends Controller
{
    public $RoomModel;
    public $CustomerModel;

    public function __construct()
    {
        $this->RoomModel = $this->model("RoomModel");
        $this->CustomerModel = $this->model("CustomerModel");
    }

    // ROOM
    // -----ADMIN
    public function displayRooms()
    {
        $rooms = $this->RoomModel->listAll();
        foreach ($rooms as $room) {
            echo '
                    <tr class="rowRoom">
                        <td class="text-center"> ' . $room["id_room"] . '</td>
                        <td> ' . $room["nameRoom"] . '</td>
                        <td> ' . $room["kind"] . '</td>
                        <td> ' . $room["rating"] . '</td>
                        <td> ' . $room["id_location"] . '</td>
                        <td> ' . $room["adult"] . '</td>
                        <td> ' . $room["children"] . '</td>
                        <td> ' . $room["bedroom"] . '</td>
                        <td> ' . $room["bathroom"] . '</td>
                        <td> ' . $room["price"] . '</td>
                        <td> ' . $room["image"] . '</td>
                        <td> ' . $room["description"] . '</td>
                        <td> ' . $room["status"] . '</td>
                        <td class="tools_table">
                            <div class ="d-flex align-items-center">
                                <svg x//www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" data-toggle="modal" data-target="#editModal' . $room["id_room"] . '">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                                <div class="modal fade" id="editModal' . $room["id_room"] . '">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title text-success">Edit</h2>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body px-5 my-4">
                                                <form class="formModal">
                                                    <div>
                                                        <label for="nameRoom">Name room:</label>
                                                        <input type="text" name="nameRoom" id="nameRoom' . $room["id_room"] . '" value="' . $room["nameRoom"] . '">

                                                        <label for="kind">Kind:</label>
                                                        <input type="text" name="kind" id="kind' . $room["id_room"] . '" value="' . $room["kind"] . '">

                                                        <label for="rating">Rating:</label>
                                                        <input type="text" name="rating" id="rating' . $room["id_room"] . '" value="' . $room["rating"] . '">

                                                        <label for="idLocation">idLocation:</label>
                                                        <input type="text" name="idLocation" id="idLocation' . $room["id_room"] . '" value="' . $room["id_location"] . '">

                                                        <label for="adult">adult:</label>
                                                        <input type="text" name="adult" id="adult' . $room["id_room"] . '" value="' . $room["adult"] . '">

                                                        <label for="children">children:</label>
                                                        <input type="text" name="children" id="children' . $room["id_room"] . '" value="' . $room["children"] . '">

                                                        <label for="bedroom">bedroom:</label>
                                                        <input type="text" name="bedroom" id="bedroom' . $room["id_room"] . '" value="' . $room["bedroom"] . '">

                                                        <label for="bathroom">bathroom:</label>
                                                        <input type="text" name="bathroom" id="bathroom' . $room["id_room"] . '" value="' . $room["bathroom"] . '">
                                                        
                                                        <label for="image">Image:</label>
                                                        <input type="text" name="image" id="image' . $room["id_room"] . '" value="' . $room["image"] . '">
                                                        
                                                        <label for="description">description:</label>
                                                        <textarea  name="description" id="description' . $room["id_room"] . '" cols="30" rows="4">' . $room["description"] . '</textarea>
                                                        
                                                        <label for="price">Price:</label>
                                                        <input type="text" name="price" id="price' . $room["id_room"] . '" value="' . $room["price"] . '">

                                                        <label for="status">Status:</label>
                                                        <select id="status' . $room["id_room"] . '" name="status">
                                                            <option value="Available">Available</option>
                                                            <option value="Unavailable">Unavailable</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer mt-4">
                                                    <button id="btnEditRoom" class="btn btn-primary btn-lg w-100" onclick="editRoom(' . $room["id_room"] . ')" data-dismiss="modal">Finish</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                &nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" id="R' . $room["id_room"] . '" data-toggle="modal" data-target="#deleteModal" onclick="getIdRoom(' . $room["id_room"] . ')">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
                        </td>
                    </tr>
                ';
        }
    }

    public function displayCustomers()
    {
        $customers = $this->CustomerModel->listAll();
        foreach ($customers as $customer) {
            echo '
                    <tr>
                        <td class="text-center">' . $customer["id_customer"] . '</td>
                        <td> ' . $customer["name"] . '</td>
                        <td> ' . $customer["email"] . '</td>
                        <td> ' . $customer["phone"] . '</td>
                        <td> ' . $customer["password"] . '</td>
                        <td class="text-center"> ' . $customer["member"] . '</td>
                        <td class="tools_table class="text-center"">
                            <div class ="d-flex align-items-center">
                                <svg x//www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                                &nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" data-toggle="modal" data-target="#deleteModal">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
                        </td>
                    </tr>
                ';
        }
    }

    public function displayHistory()
    {
        $history = $this->RoomModel->listAllHistory();
        foreach ($history as $his) {
            if ($his['status'] == 1) {
                $status = '<span class="statusHistory bg-success rounded text-light py-2 px-4">Finish</span>';
            } else {
                $status = '<span class="statusHistory bg-danger rounded text-light py-2 px-4">Processing...</span>';
            }

            if ($his['payment'] == 1) {
                $payment = 'Paid';
            } else {
                $payment = 'Unpaid';
            }
            $price = (round($his['price']*$_SESSION['currency'],3));
            echo '
                    <tr>
                        <td class="text-center">' . $his["id_history"] . '</td>
                        <td class="text-center"> ' . $his["id_reservation"] . '</td>
                        <td class="text-center"> ' . $his["id_customer"] . '</td>
                        <td> ' . $his["date"] . '</td>
                        <td> ' . $status . '</td>
                        <td class="text-center"> ' . $price . '</td>
                        <td class="text-center">' . $payment . '</td>
                        <td class="tools_table class="text-center"">
                            <div class ="d-flex align-items-center">
                                <svg x//www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                                &nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" data-toggle="modal" data-target="#deleteModal">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
                        </td>
                    </tr>
                ';
        }
    }

    public function displayReservation()
    {
        $listRes = $this->RoomModel->listAllReservation();
        foreach ($listRes as $reservation) {
            echo '
                    <tr>
                        <td class="text-center">' . $reservation["id_reservation"] . '</td>
                        <td class="text-center"> ' . $reservation["id_room"] . '</td>
                        <td class="text-center"> ' . $reservation["id_location"] . '</td>
                        <td class="text-center"> ' . $reservation["id_customer"] . '</td>
                        <td> ' . $reservation["date_from"] . '</td>
                        <td> ' . $reservation["date_to"] . '</td>
                        <td class="text-center"> ' . $reservation["price"] . '</td>
                        <td class="tools_table class="text-center"">
                            <div class ="d-flex align-items-center">
                                <svg x//www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                                &nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" data-toggle="modal" data-target="#deleteModal">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
                        </td>
                    </tr>
                ';
        }
    }
    // -----BOOKING
    public function setCurrency(){
        if (isset($_POST['currency'])) {
            $_SESSION['currency'] = $_POST['currency'];
            if ($_SESSION['currency'] == 1) {
                $_SESSION['currencySign'] = "&dollar;";
            }else {
                $_SESSION['currencySign'] = "&#8363;";
            }
        }
        
    }

    public function moreRoom(){
        $this->RoomModel->setItemPage($_POST['number']);
        echo $this->sortRoom();
    }

    public function sortRoom(){   
        $element = 'id_room';
        $order = 'ASC';

        
        if (isset($_POST['element']) && isset($_POST['order'])) {
            $_SESSION['element'] = $_POST['element'];
            $_SESSION['order'] = $_POST['order'];
        }
        if (isset($_SESSION['element']) && isset($_SESSION['order'])) {
            $element = $_SESSION['element'];
            $order = $_SESSION['order'];
        }
        
        $rooms = $this->RoomModel->paginationRoom($element,$order);
        
        foreach ($rooms as $room) {
            echo '  <div class="listRoom-item d-flex">
                            <img class="img-fluid imgCardRoom" src="/Hotel/public/images/' . $room['image'] . '">
                            <div class="contentCardRoom">
                                <h1 class="titleCardRoom mb-0">' . $room['nameRoom'] . '</h1>
                                <div class="d-flex justify-content-between align-items-center">
                                    <ul class="starRates ps-0 d-inline-flex">';
            for ($i = 0; $i < $room['rating']; $i++) {
                echo '<li class="list-group-item">★</li>';
            }

            $statusRoom = $room['status'] == "1"?"disabled":"";
            $textStatusRoom = $room['status'] == "1"?"Unavailable":"Available";

            for ($i=0; $i < count($this->RoomModel->statusRoom); $i++) { 
                if ($room['id_room'] == $this->RoomModel->statusRoom[$i]) {
                    $statusRoom = "disabled";
                    $textStatusRoom = "Unavailable";
                }
            }

            echo        '</ul>
                                    <div class="numberPerson">' . $room['adult'] . ' Adults ' . $room['children'] . ' children</div>
                                </div>
                                <div class="kindRoom mb-4">
                                    <h5><i class="text-secondary">' . $room['kind'] . ' Room</i></h5>
                                </div>
                                <div class="d-flex justify-content-between">

                                    <div class="convenientRoom mb-4">
                                        <div class="convenientRoom1 d-flex align-items-center">
                                            <div class="convenientRoom_ic">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.2 6.42857V2.57143C16.2 1.15714 15.39 0 14.4 0H3.6C2.61 0 1.8 1.15714 1.8 2.57143V6.42857C0.81 6.42857 0 7.58571 0 9V15.4286H1.197L1.8 18H2.7L3.303 15.4286H14.706L15.3 18H16.2L16.803 15.4286H18V9C18 7.58571 17.19 6.42857 16.2 6.42857ZM8.1 6.42857H3.6V2.57143H8.1V6.42857ZM14.4 6.42857H9.9V2.57143H14.4V6.42857Z" fill="#DECE3F"/>
                                                </svg>
                                            </div>
                                            <span class="convenientRoom_content ml-2">x' . $room['bedroom'] . ' bedrooms</span>
                                        </div>
                                        <div class="convenientRoom2 d-flex align-items-center mt-3">
                                            <div class="convenientRoom_ic">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.49995 6.29995C5.49406 6.29995 6.29995 5.49406 6.29995 4.49995C6.29995 3.50584 5.49406 2.69995 4.49995 2.69995C3.50584 2.69995 2.69995 3.50584 2.69995 4.49995C2.69995 5.49406 3.50584 6.29995 4.49995 6.29995Z" fill="#2A396D"/>
                                                    <path d="M16.2 9.9V2.547C16.2 1.143 15.057 0 13.653 0C12.978 0 12.33 0.27 11.853 0.747L10.728 1.872C10.584 1.827 10.431 1.8 10.269 1.8C9.909 1.8 9.576 1.908 9.297 2.088L11.781 4.572C11.961 4.293 12.069 3.96 12.069 3.6C12.069 3.438 12.042 3.294 12.006 3.141L13.131 2.016C13.266 1.881 13.455 1.8 13.653 1.8C14.067 1.8 14.4 2.133 14.4 2.547V9.9H8.235C7.965 9.711 7.722 9.495 7.497 9.252L6.237 7.857C6.066 7.668 5.85 7.515 5.616 7.407C5.337 7.272 5.031 7.2 4.716 7.2C3.6 7.209 2.7 8.109 2.7 9.225V9.9H0V15.3C0 16.29 0.81 17.1 1.8 17.1C1.8 17.595 2.205 18 2.7 18H15.3C15.795 18 16.2 17.595 16.2 17.1C17.19 17.1 18 16.29 18 15.3V9.9H16.2Z" fill="#2A396D"/>
                                                </svg>
                                            </div>
                                            <span class="convenientRoom_content ml-2">x' . $room['bathroom'] . ' bathrooms</span>
                                        </div>
                                        <div class="convenientRoom3 d-flex align-items-center mt-3">
                                            <div class="convenientRoom_ic">
                                                <svg width="14" height="19" viewBox="0 0 14 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.49998 0.0198722C2.90642 0.0283221 0.00662387 2.85215 0.0148138 6.33514C0.0259241 11.0601 6.54231 18.0198 6.54231 18.0198C6.54231 18.0198 13.0259 11.0296 13.0148 6.30457C13.0066 2.82158 10.0935 0.0114223 6.49998 0.0198722ZM6.52009 8.56985C5.23866 8.57286 4.19629 7.56731 4.19337 6.32531C4.19045 5.08332 5.22808 4.07287 6.50951 4.06986C7.79093 4.06685 8.8333 5.0724 8.83622 6.3144C8.83914 7.55639 7.80151 8.56684 6.52009 8.56985Z" fill="#FF2C2C"/>
                                                </svg>
                                            </div>
                                            <span class="convenientRoom_content ml-2">' . $room['location'] . '</span>
                                        </div>
                                        <div class="convenientRoom4 d-flex align-items-center mt-3">
                                            <div class="convenientRoom_ic">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.4 0H1.6C0.72 0 0 0.8 0 1.77778V14.2222C0 15.2 0.72 16 1.6 16H14.4C15.28 16 16 15.2 16 14.2222V1.77778C16 0.8 15.28 0 14.4 0ZM6.4 12.4444H2.4V10.6667H6.4V12.4444ZM6.4 8.88889H2.4V7.11111H6.4V8.88889ZM6.4 5.33333H2.4V3.55556H6.4V5.33333ZM10.256 10.6667L8 8.14222L9.128 6.88889L10.256 8.15111L12.792 5.33333L13.928 6.59556L10.256 10.6667Z" fill="#77BEFF"/>
                                                </svg>

                                            </div>
                                            <span class="convenientRoom_content ml-2">' . $textStatusRoom . '</span>
                                        </div>

                                    </div>
                                    <div class="price">
                                        <div class="originPrice">' . $_SESSION['currencySign'].(round($room['price']*2*$_SESSION['currency'],3)) . '</div>
                                        <div class="discountPrice">' . $_SESSION['currencySign'].(round($room['price']*$_SESSION['currency'],3)) . '</div>
                                    </div>
                                </div>
                                <a class="btnMoreService" data-bs-toggle="collapse" href="#listServiceRoom" role="button">Show more <i class="fa fa-angle-down"></i></a>
                                <div class="collapse" id="listServiceRoom">
                                    <ul class="listServiceRoom ps-0 d-flex">
                                        <li class="list-group-item">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19.4843 0.747559H4.49471C3.50084 0.747559 2.54767 1.14237 1.8449 1.84515C1.14213 2.54792 0.747314 3.50108 0.747314 4.49495V19.4845C0.747314 20.4784 1.14213 21.4316 1.8449 22.1343C2.54767 22.8371 3.50084 23.2319 4.49471 23.2319H19.4843C20.4782 23.2319 21.4313 22.8371 22.1341 22.1343C22.8369 21.4316 23.2317 20.4784 23.2317 19.4845V4.49495C23.2317 3.50108 22.8369 2.54792 22.1341 1.84515C21.4313 1.14237 20.4782 0.747559 19.4843 0.747559ZM17.3608 9.00432L11.6522 16.4991C11.5359 16.6503 11.3864 16.7728 11.2154 16.8572C11.0443 16.9417 10.8562 16.9858 10.6654 16.9863C10.4757 16.9873 10.2882 16.9451 10.1172 16.8628C9.94624 16.7806 9.79624 16.6605 9.67861 16.5116L6.63073 12.6268C6.52984 12.4972 6.45547 12.349 6.41186 12.1907C6.36825 12.0324 6.35625 11.867 6.37655 11.704C6.39684 11.541 6.44904 11.3837 6.53016 11.2409C6.61128 11.0981 6.71973 10.9727 6.84932 10.8718C7.11104 10.668 7.44298 10.5766 7.77211 10.6176C7.93508 10.6379 8.09246 10.6901 8.23525 10.7712C8.37805 10.8523 8.50347 10.9608 8.60435 11.0904L10.6404 13.6886L15.3622 7.44291C15.4622 7.31167 15.5872 7.20144 15.7298 7.11849C15.8725 7.03554 16.0301 6.9815 16.1936 6.95947C16.3572 6.93743 16.5235 6.94782 16.683 6.99004C16.8425 7.03227 16.9922 7.10551 17.1234 7.20557C17.2547 7.30563 17.3649 7.43057 17.4478 7.57323C17.5308 7.7159 17.5848 7.87351 17.6069 8.03705C17.6289 8.2006 17.6185 8.36689 17.5763 8.52643C17.5341 8.68596 17.4608 8.83562 17.3608 8.96685V9.00432Z" fill="#12C039" />
                                                </svg>
                                            </span>
                                            Car parking
                                        </li>
                                        <li class="list-group-item">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19.4843 0.747559H4.49471C3.50084 0.747559 2.54767 1.14237 1.8449 1.84515C1.14213 2.54792 0.747314 3.50108 0.747314 4.49495V19.4845C0.747314 20.4784 1.14213 21.4316 1.8449 22.1343C2.54767 22.8371 3.50084 23.2319 4.49471 23.2319H19.4843C20.4782 23.2319 21.4313 22.8371 22.1341 22.1343C22.8369 21.4316 23.2317 20.4784 23.2317 19.4845V4.49495C23.2317 3.50108 22.8369 2.54792 22.1341 1.84515C21.4313 1.14237 20.4782 0.747559 19.4843 0.747559ZM17.3608 9.00432L11.6522 16.4991C11.5359 16.6503 11.3864 16.7728 11.2154 16.8572C11.0443 16.9417 10.8562 16.9858 10.6654 16.9863C10.4757 16.9873 10.2882 16.9451 10.1172 16.8628C9.94624 16.7806 9.79624 16.6605 9.67861 16.5116L6.63073 12.6268C6.52984 12.4972 6.45547 12.349 6.41186 12.1907C6.36825 12.0324 6.35625 11.867 6.37655 11.704C6.39684 11.541 6.44904 11.3837 6.53016 11.2409C6.61128 11.0981 6.71973 10.9727 6.84932 10.8718C7.11104 10.668 7.44298 10.5766 7.77211 10.6176C7.93508 10.6379 8.09246 10.6901 8.23525 10.7712C8.37805 10.8523 8.50347 10.9608 8.60435 11.0904L10.6404 13.6886L15.3622 7.44291C15.4622 7.31167 15.5872 7.20144 15.7298 7.11849C15.8725 7.03554 16.0301 6.9815 16.1936 6.95947C16.3572 6.93743 16.5235 6.94782 16.683 6.99004C16.8425 7.03227 16.9922 7.10551 17.1234 7.20557C17.2547 7.30563 17.3649 7.43057 17.4478 7.57323C17.5308 7.7159 17.5848 7.87351 17.6069 8.03705C17.6289 8.2006 17.6185 8.36689 17.5763 8.52643C17.5341 8.68596 17.4608 8.83562 17.3608 8.96685V9.00432Z" fill="#12C039" />
                                                </svg>
                                            </span>
                                            Free Wifi
                                        </li>
                                        <li class="list-group-item">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19.4843 0.747559H4.49471C3.50084 0.747559 2.54767 1.14237 1.8449 1.84515C1.14213 2.54792 0.747314 3.50108 0.747314 4.49495V19.4845C0.747314 20.4784 1.14213 21.4316 1.8449 22.1343C2.54767 22.8371 3.50084 23.2319 4.49471 23.2319H19.4843C20.4782 23.2319 21.4313 22.8371 22.1341 22.1343C22.8369 21.4316 23.2317 20.4784 23.2317 19.4845V4.49495C23.2317 3.50108 22.8369 2.54792 22.1341 1.84515C21.4313 1.14237 20.4782 0.747559 19.4843 0.747559ZM17.3608 9.00432L11.6522 16.4991C11.5359 16.6503 11.3864 16.7728 11.2154 16.8572C11.0443 16.9417 10.8562 16.9858 10.6654 16.9863C10.4757 16.9873 10.2882 16.9451 10.1172 16.8628C9.94624 16.7806 9.79624 16.6605 9.67861 16.5116L6.63073 12.6268C6.52984 12.4972 6.45547 12.349 6.41186 12.1907C6.36825 12.0324 6.35625 11.867 6.37655 11.704C6.39684 11.541 6.44904 11.3837 6.53016 11.2409C6.61128 11.0981 6.71973 10.9727 6.84932 10.8718C7.11104 10.668 7.44298 10.5766 7.77211 10.6176C7.93508 10.6379 8.09246 10.6901 8.23525 10.7712C8.37805 10.8523 8.50347 10.9608 8.60435 11.0904L10.6404 13.6886L15.3622 7.44291C15.4622 7.31167 15.5872 7.20144 15.7298 7.11849C15.8725 7.03554 16.0301 6.9815 16.1936 6.95947C16.3572 6.93743 16.5235 6.94782 16.683 6.99004C16.8425 7.03227 16.9922 7.10551 17.1234 7.20557C17.2547 7.30563 17.3649 7.43057 17.4478 7.57323C17.5308 7.7159 17.5848 7.87351 17.6069 8.03705C17.6289 8.2006 17.6185 8.36689 17.5763 8.52643C17.5341 8.68596 17.4608 8.83562 17.3608 8.96685V9.00432Z" fill="#12C039" />
                                                </svg>
                                            </span>
                                            Breakfast
                                        </li>

                                    </ul>

                                </div>
                                <div class="btnBookRoom mt-5">
                                    <div>
                                        <button class="btn ' . $statusRoom . '" onclick="detailRoom('.$room['id_room'].')">Book</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        ';
        }

    }

    public function loadSession(){
        if (isset($_POST['check'])) {
            unset($_SESSION['location']);
            unset($_SESSION['dateFrom']);
            unset($_SESSION['dateTo']);
            unset($_SESSION['element']);
            unset($_SESSION['order']);
            unset($_SESSION['adult']);
            unset($_SESSION['children']);
        }
    }

    public function searchRoom(){
        if (isset($_POST['search'])) {
            $location = $_POST['location'];
            $_SESSION['location'] = $location;
            $dateFrom = $_POST['dateFrom'];
            $_SESSION['dateFrom'] = $dateFrom;
            $dateTo = $_POST['dateTo'];
            $_SESSION['dateTo'] = $dateTo;
            $adult = $_POST['adult'];
            $_SESSION['adult'] = $adult;
            $children = $_POST['children'];   
            $_SESSION['children'] = $children;
            
            $quantify = $adult + $children;
            $_SESSION['quantify'] = $quantify;
            
            $rooms = $this->RoomModel->searchRoom($location,$dateFrom,$dateTo,$quantify);

            foreach ($rooms as $room) {
                echo '  <div class="listRoom-item d-flex">
                                <img class="img-fluid imgCardRoom" src="/Hotel/public/images/' . $room['image'] . '">
                                <div class="contentCardRoom">
                                    <h1 class="titleCardRoom mb-0">' . $room['nameRoom'] . '</h1>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <ul class="starRates ps-0 d-inline-flex">';
                for ($i = 0; $i < $room['rating']; $i++) {
                    echo '<li class="list-group-item">★</li>';
                }
                
                $statusRoom = $room['status'] == "1"?"disabled":"";
                $textStatusRoom = $room['status'] == "1"?"Unavailable":"Available";
                
                for ($i=0; $i < count($this->RoomModel->statusRoom); $i++) { 
                    if ($room['id_room'] == $this->RoomModel->statusRoom[$i]) {
                        $statusRoom = "disabled";
                        $textStatusRoom = "Unavailable";
                    }
                }

                echo        '</ul>
                                        <div class="numberPerson">' . $room['adult'] . ' Adults ' . $room['children'] . ' children</div>
                                    </div>
                                    <div class="kindRoom mb-4">
                                        <h5><i class="text-secondary">' . $room['kind'] . ' Room</i></h5>
                                    </div>
                                    <div class="d-flex justify-content-between">
    
                                        <div class="convenientRoom mb-4">
                                            <div class="convenientRoom1 d-flex align-items-center">
                                                <div class="convenientRoom_ic">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.2 6.42857V2.57143C16.2 1.15714 15.39 0 14.4 0H3.6C2.61 0 1.8 1.15714 1.8 2.57143V6.42857C0.81 6.42857 0 7.58571 0 9V15.4286H1.197L1.8 18H2.7L3.303 15.4286H14.706L15.3 18H16.2L16.803 15.4286H18V9C18 7.58571 17.19 6.42857 16.2 6.42857ZM8.1 6.42857H3.6V2.57143H8.1V6.42857ZM14.4 6.42857H9.9V2.57143H14.4V6.42857Z" fill="#DECE3F"/>
                                                    </svg>
                                                </div>
                                                <span class="convenientRoom_content ml-2">x' . $room['bedroom'] . ' bedrooms</span>
                                            </div>
                                            <div class="convenientRoom2 d-flex align-items-center mt-3">
                                                <div class="convenientRoom_ic">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.49995 6.29995C5.49406 6.29995 6.29995 5.49406 6.29995 4.49995C6.29995 3.50584 5.49406 2.69995 4.49995 2.69995C3.50584 2.69995 2.69995 3.50584 2.69995 4.49995C2.69995 5.49406 3.50584 6.29995 4.49995 6.29995Z" fill="#2A396D"/>
                                                        <path d="M16.2 9.9V2.547C16.2 1.143 15.057 0 13.653 0C12.978 0 12.33 0.27 11.853 0.747L10.728 1.872C10.584 1.827 10.431 1.8 10.269 1.8C9.909 1.8 9.576 1.908 9.297 2.088L11.781 4.572C11.961 4.293 12.069 3.96 12.069 3.6C12.069 3.438 12.042 3.294 12.006 3.141L13.131 2.016C13.266 1.881 13.455 1.8 13.653 1.8C14.067 1.8 14.4 2.133 14.4 2.547V9.9H8.235C7.965 9.711 7.722 9.495 7.497 9.252L6.237 7.857C6.066 7.668 5.85 7.515 5.616 7.407C5.337 7.272 5.031 7.2 4.716 7.2C3.6 7.209 2.7 8.109 2.7 9.225V9.9H0V15.3C0 16.29 0.81 17.1 1.8 17.1C1.8 17.595 2.205 18 2.7 18H15.3C15.795 18 16.2 17.595 16.2 17.1C17.19 17.1 18 16.29 18 15.3V9.9H16.2Z" fill="#2A396D"/>
                                                    </svg>
                                                </div>
                                                <span class="convenientRoom_content ml-2">x' . $room['bathroom'] . ' bathrooms</span>
                                            </div>
                                            <div class="convenientRoom3 d-flex align-items-center mt-3">
                                                <div class="convenientRoom_ic">
                                                    <svg width="14" height="19" viewBox="0 0 14 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.49998 0.0198722C2.90642 0.0283221 0.00662387 2.85215 0.0148138 6.33514C0.0259241 11.0601 6.54231 18.0198 6.54231 18.0198C6.54231 18.0198 13.0259 11.0296 13.0148 6.30457C13.0066 2.82158 10.0935 0.0114223 6.49998 0.0198722ZM6.52009 8.56985C5.23866 8.57286 4.19629 7.56731 4.19337 6.32531C4.19045 5.08332 5.22808 4.07287 6.50951 4.06986C7.79093 4.06685 8.8333 5.0724 8.83622 6.3144C8.83914 7.55639 7.80151 8.56684 6.52009 8.56985Z" fill="#FF2C2C"/>
                                                    </svg>
                                                </div>
                                                <span class="convenientRoom_content ml-2">' . $room['location'] . '</span>
                                            </div>
                                            <div class="convenientRoom4 d-flex align-items-center mt-3">
                                                <div class="convenientRoom_ic">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.4 0H1.6C0.72 0 0 0.8 0 1.77778V14.2222C0 15.2 0.72 16 1.6 16H14.4C15.28 16 16 15.2 16 14.2222V1.77778C16 0.8 15.28 0 14.4 0ZM6.4 12.4444H2.4V10.6667H6.4V12.4444ZM6.4 8.88889H2.4V7.11111H6.4V8.88889ZM6.4 5.33333H2.4V3.55556H6.4V5.33333ZM10.256 10.6667L8 8.14222L9.128 6.88889L10.256 8.15111L12.792 5.33333L13.928 6.59556L10.256 10.6667Z" fill="#77BEFF"/>
                                                    </svg>
    
                                                </div>
                                                <span class="convenientRoom_content ml-2">' . $textStatusRoom . '</span>
                                            </div>
    
                                        </div>
                                        <div class="price">
                                        <div class="originPrice">' . $_SESSION['currencySign'].(round($room['price']*2*$_SESSION['currency'],3)) . '</div>
                                        <div class="discountPrice">' . $_SESSION['currencySign'].(round($room['price']*$_SESSION['currency'],3)) . '</div>
                                        </div>
                                    </div>
                                    <a class="btnMoreService" data-bs-toggle="collapse" href="#listServiceRoom" role="button">Show more <i class="fa fa-angle-down"></i></a>
                                    <div class="collapse" id="listServiceRoom">
                                        <ul class="listServiceRoom ps-0 d-flex">
                                            <li class="list-group-item">
                                                <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M19.4843 0.747559H4.49471C3.50084 0.747559 2.54767 1.14237 1.8449 1.84515C1.14213 2.54792 0.747314 3.50108 0.747314 4.49495V19.4845C0.747314 20.4784 1.14213 21.4316 1.8449 22.1343C2.54767 22.8371 3.50084 23.2319 4.49471 23.2319H19.4843C20.4782 23.2319 21.4313 22.8371 22.1341 22.1343C22.8369 21.4316 23.2317 20.4784 23.2317 19.4845V4.49495C23.2317 3.50108 22.8369 2.54792 22.1341 1.84515C21.4313 1.14237 20.4782 0.747559 19.4843 0.747559ZM17.3608 9.00432L11.6522 16.4991C11.5359 16.6503 11.3864 16.7728 11.2154 16.8572C11.0443 16.9417 10.8562 16.9858 10.6654 16.9863C10.4757 16.9873 10.2882 16.9451 10.1172 16.8628C9.94624 16.7806 9.79624 16.6605 9.67861 16.5116L6.63073 12.6268C6.52984 12.4972 6.45547 12.349 6.41186 12.1907C6.36825 12.0324 6.35625 11.867 6.37655 11.704C6.39684 11.541 6.44904 11.3837 6.53016 11.2409C6.61128 11.0981 6.71973 10.9727 6.84932 10.8718C7.11104 10.668 7.44298 10.5766 7.77211 10.6176C7.93508 10.6379 8.09246 10.6901 8.23525 10.7712C8.37805 10.8523 8.50347 10.9608 8.60435 11.0904L10.6404 13.6886L15.3622 7.44291C15.4622 7.31167 15.5872 7.20144 15.7298 7.11849C15.8725 7.03554 16.0301 6.9815 16.1936 6.95947C16.3572 6.93743 16.5235 6.94782 16.683 6.99004C16.8425 7.03227 16.9922 7.10551 17.1234 7.20557C17.2547 7.30563 17.3649 7.43057 17.4478 7.57323C17.5308 7.7159 17.5848 7.87351 17.6069 8.03705C17.6289 8.2006 17.6185 8.36689 17.5763 8.52643C17.5341 8.68596 17.4608 8.83562 17.3608 8.96685V9.00432Z" fill="#12C039" />
                                                    </svg>
                                                </span>
                                                Car parking
                                            </li>
                                            <li class="list-group-item">
                                                <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M19.4843 0.747559H4.49471C3.50084 0.747559 2.54767 1.14237 1.8449 1.84515C1.14213 2.54792 0.747314 3.50108 0.747314 4.49495V19.4845C0.747314 20.4784 1.14213 21.4316 1.8449 22.1343C2.54767 22.8371 3.50084 23.2319 4.49471 23.2319H19.4843C20.4782 23.2319 21.4313 22.8371 22.1341 22.1343C22.8369 21.4316 23.2317 20.4784 23.2317 19.4845V4.49495C23.2317 3.50108 22.8369 2.54792 22.1341 1.84515C21.4313 1.14237 20.4782 0.747559 19.4843 0.747559ZM17.3608 9.00432L11.6522 16.4991C11.5359 16.6503 11.3864 16.7728 11.2154 16.8572C11.0443 16.9417 10.8562 16.9858 10.6654 16.9863C10.4757 16.9873 10.2882 16.9451 10.1172 16.8628C9.94624 16.7806 9.79624 16.6605 9.67861 16.5116L6.63073 12.6268C6.52984 12.4972 6.45547 12.349 6.41186 12.1907C6.36825 12.0324 6.35625 11.867 6.37655 11.704C6.39684 11.541 6.44904 11.3837 6.53016 11.2409C6.61128 11.0981 6.71973 10.9727 6.84932 10.8718C7.11104 10.668 7.44298 10.5766 7.77211 10.6176C7.93508 10.6379 8.09246 10.6901 8.23525 10.7712C8.37805 10.8523 8.50347 10.9608 8.60435 11.0904L10.6404 13.6886L15.3622 7.44291C15.4622 7.31167 15.5872 7.20144 15.7298 7.11849C15.8725 7.03554 16.0301 6.9815 16.1936 6.95947C16.3572 6.93743 16.5235 6.94782 16.683 6.99004C16.8425 7.03227 16.9922 7.10551 17.1234 7.20557C17.2547 7.30563 17.3649 7.43057 17.4478 7.57323C17.5308 7.7159 17.5848 7.87351 17.6069 8.03705C17.6289 8.2006 17.6185 8.36689 17.5763 8.52643C17.5341 8.68596 17.4608 8.83562 17.3608 8.96685V9.00432Z" fill="#12C039" />
                                                    </svg>
                                                </span>
                                                Free Wifi
                                            </li>
                                            <li class="list-group-item">
                                                <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M19.4843 0.747559H4.49471C3.50084 0.747559 2.54767 1.14237 1.8449 1.84515C1.14213 2.54792 0.747314 3.50108 0.747314 4.49495V19.4845C0.747314 20.4784 1.14213 21.4316 1.8449 22.1343C2.54767 22.8371 3.50084 23.2319 4.49471 23.2319H19.4843C20.4782 23.2319 21.4313 22.8371 22.1341 22.1343C22.8369 21.4316 23.2317 20.4784 23.2317 19.4845V4.49495C23.2317 3.50108 22.8369 2.54792 22.1341 1.84515C21.4313 1.14237 20.4782 0.747559 19.4843 0.747559ZM17.3608 9.00432L11.6522 16.4991C11.5359 16.6503 11.3864 16.7728 11.2154 16.8572C11.0443 16.9417 10.8562 16.9858 10.6654 16.9863C10.4757 16.9873 10.2882 16.9451 10.1172 16.8628C9.94624 16.7806 9.79624 16.6605 9.67861 16.5116L6.63073 12.6268C6.52984 12.4972 6.45547 12.349 6.41186 12.1907C6.36825 12.0324 6.35625 11.867 6.37655 11.704C6.39684 11.541 6.44904 11.3837 6.53016 11.2409C6.61128 11.0981 6.71973 10.9727 6.84932 10.8718C7.11104 10.668 7.44298 10.5766 7.77211 10.6176C7.93508 10.6379 8.09246 10.6901 8.23525 10.7712C8.37805 10.8523 8.50347 10.9608 8.60435 11.0904L10.6404 13.6886L15.3622 7.44291C15.4622 7.31167 15.5872 7.20144 15.7298 7.11849C15.8725 7.03554 16.0301 6.9815 16.1936 6.95947C16.3572 6.93743 16.5235 6.94782 16.683 6.99004C16.8425 7.03227 16.9922 7.10551 17.1234 7.20557C17.2547 7.30563 17.3649 7.43057 17.4478 7.57323C17.5308 7.7159 17.5848 7.87351 17.6069 8.03705C17.6289 8.2006 17.6185 8.36689 17.5763 8.52643C17.5341 8.68596 17.4608 8.83562 17.3608 8.96685V9.00432Z" fill="#12C039" />
                                                    </svg>
                                                </span>
                                                Breakfast
                                            </li>
    
                                        </ul>
    
                                    </div>
                                    <div class="btnBookRoom mt-5">
                                        <div>
                                            <button class="btn ' . $statusRoom . '" onclick="detailRoom('.$room['id_room'].')">Book</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            ';
            };
        }

    }

    // CUSTOMER
    public function actionSignIn(){   
        
        if (isset($_POST['signIn'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            echo $this->CustomerModel->checkCustomerSignIn($email, $password);
        }
           
    }

    public function updatePassword(){   
        if (isset($_POST['changePass'])) {
            $curPass = md5($_POST['curPassword']);
            $newPass = md5($_POST['newPassword']);
            echo $this->CustomerModel->updatePassword($curPass,$newPass);
        }
           
    }

    public function updateProfile(){   
        if (isset($_POST['changeProfile'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            echo $this->CustomerModel->updateProfile($name, $email, $phone);
        }
           
    }
    
    public function actionSignUp(){   

        if (isset($_POST['signUp'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $member = 1;
            
            echo $this->CustomerModel->addNewCustomer($name,$email,$phone,$password,$member);

        }
           
    }

    public function checkAvailableDate() {
        if (isset($_POST['send'])) {
            $room = $_POST['idRoom'];
            $dateFrom = $_POST['dateFrom'];
            $dateTo = $_POST['dateTo'];
            
            echo $this->RoomModel->checkAvailableDate($room,$dateFrom,$dateTo);
        }
        
    }

    public function getInfoBook(){
        if (isset($_POST['infoBook'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $dateFrom = $_POST['dateFrom'];
            $dateTo = $_POST['dateTo'];
            $adult = $_POST['adult'];
            $children = $_POST['children'];
            $extSer1 = $_POST['extSer1'];
            $extSer2 = $_POST['extSer2'];

            $_SESSION['infoBook'] = array();
            array_push($_SESSION['infoBook'], $name, $phone, $email, $dateFrom, $dateTo, $adult, $children,$extSer1,$extSer2);
        }
    }

    public function addReserved(){
        if (isset($_POST['send'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = '';
            $member = 0;
            $dateFrom = $_POST['dateFrom'];
            $dateTo = $_POST['dateTo'];
            $price = $_POST['price'];
            $idReservation = $this->RoomModel->getLenReservation()+1;

            if($this->CustomerModel->getIdCustomer($email) == 0){
                $this->CustomerModel->addNewCustomer($name,$email,$phone,$password,$member);
            };
            $idCustomer = $this->CustomerModel->getIdCustomer($email);
            $idRoom = $_SESSION['detailRoom'];
            $idLocation = $this->RoomModel->getIdLocation();
            
            $this->RoomModel->addReserved($idRoom, $idLocation, $idCustomer, $dateFrom, $dateTo, $price);
            
            $this->RoomModel->setHistory($idCustomer,$idReservation, $price);
        }
    }

    public function showHistory(){
        if (isset($_POST['send'])) {
            $email = $_POST['email'];

            $idCustomer = $this->CustomerModel->getIdCustomer($email);
            $history = $this->RoomModel->getHistory($idCustomer);
            foreach($history as $row) {
                if ($row['status'] == 1) {
                    $status = '<span class="statusHistory bg-success rounded text-light py-2 px-4">Finish</span>';
                } else {
                    $status = '<span class="statusHistory bg-danger rounded text-light py-2 px-4">Processing...</span>';
                }

                if ($row['payment'] == 1) {
                    $payment = 'Paid';
                } else {
                    $payment = 'Unpaid';
                }
                $price = (round($row['price']*$_SESSION['currency'],3));
                echo '
                    <tr class="">
                        <td scope="row">'.$row['date'].'</td>
                        <td>'.$status.'</td>
                        <td>'.$price.'</td>
                        <td>'.$payment.'</td>
                        <td><a href="#" onclick="viewDetail('.$row['id_reservation'].')" data-bs-toggle="modal" data-bs-target="#modalViewHistory">View detail</a></td>  
                    </tr>
                ';
            }
        }
    }

    public function showViewDetail(){
        if (isset($_POST['send'])) {
            $idReservation = $_POST['idReservation'];
            $viewDetail = $this->RoomModel->showViewDetail($idReservation);

            foreach($viewDetail as $row) {
                echo '
                    <div class="px-4 fs-2">
                        <h2 class="bg-info text-light pl-2 py-2"> YOUR INFORMATION</h2>
                        <div>
                            <span><b>Name:</b></span>
                            <span> '.$row['name'].'</span>
                        </div>
                        <div>
                            <span><b>Email:</b></span>
                            <span> '.$row['email'].'</span>
                        </div>
                        <div>
                            <span><b>Phone:</b></span>
                            <span>'.$row['phone'].'</span>
                        </div>
                        <hr></hr>
                        <h2 class="bg-info text-light pl-2 py-2"> YOUR ROOM</h2>
                        <div>
                            <span><b>Name Room:</b></span>
                            <span>'.$row['nameRoom'].'</span>
                        </div>
                        <div>
                            <span><b>Location:</b></span>
                            <span>'.$row['location'].'</span>
                        </div>
                        <div>
                            <span><b>Date:</b></span>
                            <span>'.$row['date_from'].'</span>
                            &nbsp;&rarr;&nbsp;
                            <span>'.$row['date_to'].'</span>
                        </div>
                        <div>
                            <span><b>Member: </b></span>
                            <span>'.$row['adult'].'</span> &nbsp;Adult,&nbsp;
                            <span>'.$row['adult'].'</span> &nbsp;Children
                        </div>
                        <hr></hr>
                        <h2 class="bg-info text-light pl-2 py-2"> YOUR BILL</h2>
                        <div class="d-flex justify-content-between">
                            <span><b>Total price:</b></span>
                            <span class="colorRed fs-1 pr-5 fw-bold">$'.$row['price'].'</span>
                        </div>
                    </div>
                ';
            }
        }

    }

}
