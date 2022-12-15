<?php
    $detail = $data['detailRoom'];
    $path = $detail['image'];
    $path = explode(".",$path);
    unset($path[1]);
    $path = implode("",$path);
    

    $name = "";
    $email = "";
    $phone = "";

    if (isset($_SESSION['signedIn'])) {
        $name = $_SESSION['nameCus'];
        $email = $_SESSION['emailCus'];
        $phone = $_SESSION['phoneCus'];
    }

    $dateFrom = "";
    $dateTo = "";
    if (isset($_SESSION['dateFrom']) && isset($_SESSION['dateTo'])) {
        $dateFrom = $_SESSION['dateFrom'];
        $dateTo = $_SESSION['dateTo'];
    }

    $adult = 0;
    $children = 0;
    if (isset($_SESSION['adult'])) {
        $adult = $_SESSION['adult'];
    }
    if (isset($_SESSION['children'])) {
        $children = $_SESSION['children'];
    }

?>

<div class="wrapper_detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 mb-5 wrapContent1">
                <!-- Carousel -->
                <div id="detailCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/Hotel/public/images/<?=$path?>.jpg" class="d-block w-100" width="600" height="400">
                        </div>
                        <div class="carousel-item">
                            <img src="/Hotel/public/images/<?=$path?>_2.jpg" class="d-block w-100" width="600" height="400">
                        </div>
                        <div class="carousel-item">
                            <img src="/Hotel/public/images/<?=$path?>_3.jpg" class="d-block w-100" width="600" height="400">
                        </div>
                        
                    </div>

                    <!-------->
                    <div class="subCarousel">
                        <button class="carousel-control-prev" type="button" data-bs-target="#detailCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#detailCarousel" data-bs-slide-to="0" class="active">
                                <img src="/Hotel/public/images/<?=$path?>.jpg" class="d-block w-100" width="80" height="70">
                            </button>
                            <button type="button" data-bs-target="#detailCarousel" data-bs-slide-to="1">
                                <img src="/Hotel/public/images/<?=$path?>_2.jpg" class="d-block w-100" width="80" height="70">
                            </button>
                            <button type="button" data-bs-target="#detailCarousel" data-bs-slide-to="2">
                                <img src="/Hotel/public/images/<?=$path?>_3.jpg" class="d-block w-100" width="80" height="70">
                            </button>
                        </div>

                        <button class="carousel-control-next" type="button" data-bs-target="#detailCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>

                </div>

            </div>
            <div class="col-lg-5 mt-md-5 mt-lg-0 wrapContent2">
                <h1 class="detail_TitleRoom"><?=$detail['nameRoom']?></h1>
                <input type="hidden" id="idRoomVal" value="<?=$detail['id_room']?>">
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="starRates ps-0 d-inline-flex">
                        <li class="list-group-item">★</li>
                        <li class="list-group-item">★</li>
                        <li class="list-group-item">★</li>
                        <li class="list-group-item">★</li>
                        <li class="list-group-item">★</li>
                    </ul>
                    <div class="numberPerson"><?=$detail['adult']?> Adults <?=$detail['children']?> children</div>
                </div>
                <div class="kindRoom mb-4">
                    <h5><i class="text-secondary"><?=$detail['kind']?> Room</i></h5>
                </div>
                <p class="descriptionRoom ">
                    <?=$detail['description']?>
                </p>
                <hr>
                <div class="d-flex justify-content-between">
                    <div class="convenientRoom mb-4">
                        <div class="convenientRoom1 d-flex align-items-center">
                            <div class="convenientRoom_ic">
                                <svg width="18" height="18" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23.4 9.28571V3.71429C23.4 1.67143 22.23 0 20.8 0H5.2C3.77 0 2.6 1.67143 2.6 3.71429V9.28571C1.17 9.28571 0 10.9571 0 13V22.2857H1.729L2.6 26H3.9L4.771 22.2857H21.242L22.1 26H23.4L24.271 22.2857H26V13C26 10.9571 24.83 9.28571 23.4 9.28571ZM11.7 9.28571H5.2V3.71429H11.7V9.28571ZM20.8 9.28571H14.3V3.71429H20.8V9.28571Z" fill="black" />
                                </svg>

                            </div>
                            <span class="convenientRoom_content ml-2">x<?=$detail['bedroom']?> bedrooms</span>
                        </div>
                        <div class="convenientRoom2 d-flex align-items-center mt-3">
                            <div class="convenientRoom_ic">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.49995 6.29995C5.49406 6.29995 6.29995 5.49406 6.29995 4.49995C6.29995 3.50584 5.49406 2.69995 4.49995 2.69995C3.50584 2.69995 2.69995 3.50584 2.69995 4.49995C2.69995 5.49406 3.50584 6.29995 4.49995 6.29995Z" fill="black" />
                                    <path d="M16.2 9.9V2.547C16.2 1.143 15.057 0 13.653 0C12.978 0 12.33 0.27 11.853 0.747L10.728 1.872C10.584 1.827 10.431 1.8 10.269 1.8C9.909 1.8 9.576 1.908 9.297 2.088L11.781 4.572C11.961 4.293 12.069 3.96 12.069 3.6C12.069 3.438 12.042 3.294 12.006 3.141L13.131 2.016C13.266 1.881 13.455 1.8 13.653 1.8C14.067 1.8 14.4 2.133 14.4 2.547V9.9H8.235C7.965 9.711 7.722 9.495 7.497 9.252L6.237 7.857C6.066 7.668 5.85 7.515 5.616 7.407C5.337 7.272 5.031 7.2 4.716 7.2C3.6 7.209 2.7 8.109 2.7 9.225V9.9H0V15.3C0 16.29 0.81 17.1 1.8 17.1C1.8 17.595 2.205 18 2.7 18H15.3C15.795 18 16.2 17.595 16.2 17.1C17.19 17.1 18 16.29 18 15.3V9.9H16.2Z" fill="black" />
                                </svg>

                            </div>
                            <span class="convenientRoom_content ml-2">x<?=$detail['bathroom']?> bathrooms</span>
                        </div>
                        <div class="convenientRoom3 d-flex align-items-center mt-3">
                            <div class="convenientRoom_ic">
                                <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.49998 0.0175208C3.35356 0.0272707 0.00735986 3.16515 0.0164598 7.03514C0.0288046 12.2851 7.54701 20.0175 7.54701 20.0175C7.54701 20.0175 15.0288 12.2499 15.0164 6.99987C15.0073 3.12988 11.6464 0.00777092 7.49998 0.0175208ZM7.52232 9.51749C6.04375 9.52097 4.84112 8.4038 4.83787 7.0238C4.83463 5.6438 6.03199 4.52099 7.51056 4.51751C8.98913 4.51403 10.1918 5.63121 10.195 7.0112C10.1982 8.3912 9.00089 9.51402 7.52232 9.51749Z" fill="#030303" />
                                </svg>
                            </div>
                            <input type="hidden" id="locationVal" value="<?=$detail['location']?>">
                            <span class="convenientRoom_content ml-2"><?=$detail['location']?></span>
                        </div>
                        <div class="convenientRoom4 d-flex align-items-center mt-3">
                            <div class="convenientRoom_ic">
                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.6667 0.333252H2.33341C1.40841 0.333252 0.675081 1.07492 0.675081 1.99992L0.666748 11.9999C0.666748 12.9249 1.40841 13.6666 2.33341 13.6666H15.6667C16.5917 13.6666 17.3334 12.9249 17.3334 11.9999V1.99992C17.3334 1.07492 16.5917 0.333252 15.6667 0.333252ZM15.6667 11.9999H2.33341V6.99992H15.6667V11.9999ZM15.6667 3.66658H2.33341V1.99992H15.6667V3.66658Z" fill="black" />
                                </svg>
                            </div>
                            <span class="convenientRoom_content ml-2">Book without a credit card</span>
                        </div>

                    </div>
                </div>
                <hr>
                <ul class="listServiceRoom ps-0 mt-2 d-flex justify-content-between">
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
        </div>
        <!-- --------------------------------- -->

        <div class="py-5 alert alert-info text-center sloganBook">
            <h1> Let's reserve room now! </h1>
        </div>

        <div class="process-wrap text-center">
            <div class="process-main row">
                <div class="col-4 ">
                    <div class="process-step-cont">
                        <div>
                            <div class="process-step step-1 activeProcessStep">1</div>
                            <span class="process-label">Step 1</span>
                        </div>
                    </div>
                    <div class="process-bar "></div>
                </div>
                <div class="col-4 ">
                    <div class="process-step-cont">
                        <div>
                            <div class="process-step step-2 ">2</div>
                            <span class="process-label">Step 2</span>
                        </div>
                    </div>
                    <div class="process-bar"></div>
                </div>
                <div class="col-4">
                    <div class="process-step-cont">
                        <div>
                            <div class="process-step step-3">3</div>
                            <span class="process-label">Step 3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <h1 class="text-center my-5">FILLING THE FORM BELOW</h1>
        <div class="col-lg-6 wrapContent3">
            <h2 class="mb-5 text-center">YOUR INFORMATION</h2>
            <div class="guestInfo">
                <div class="mb-5 d-flex align-items-center">
                  <label for="" class="form-label">Full name:</label>
                  <input type="text" id="nameVal" value="<?=$name?>" class="form-control ml-3" >
                </div>
                <div class="mb-5 d-flex align-items-center">
                  <label for="" class="form-label">Email:</label>
                  <input type="text" id="emailVal" value="<?=$email?>" class="form-control ml-3" >
                </div>
                <div class="mb-5 d-flex align-items-center">
                  <label for="" class="form-label">Phone:</label>
                  <input type="text" id="phoneVal" value="<?=$phone?>" class="form-control ml-3" >
                </div>
                <div class="form-check form-check">
                    <input class="form-check-input" type="checkbox" id="" value="option1">
                    <label class="form-check-label" for="">Notify me about offers.</label>
                  </div>
                  <div class="form-check form-check">
                    <input class="form-check-input" type="checkbox" id="chkPolicy" value="option2">
                    <label class="form-check-label" for="">I have read and agree to the 
                        <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>
                    </label>
                    <span><i class="fs-4 colorRed" id="noticePolicy"></i></span>
                  </div>
                  
            </div>     
        </div>

        <div class="col-lg-6 wrapContent4">
            <div class="tempBill">
                <div class="price detail_price">
                    <div class="h1 colorRed">
                        <span>
                            <?=$_SESSION['currencySign']?>
                            <?=(round($detail['price']*$_SESSION['currency'],3))?>
                        </span> 
                        <span class="text-dark fs-4"> /night</span>
                    </div>
                </div>
                <div class="d-flex tempBill_date">
                    <div class="d-flex">
                        From:<input class="date_from ml-3" id="dateFromVal" type="date" value="<?=$dateFrom?>">
                    </div>
                    <div class="d-flex">
                        To:<input class="date_to ml-3" id="dateToVal" type="date" value="<?=$dateTo?>">
                    </div>
                </div>
                <div class="d-flex tempBill_member">
                    <div class="">
                        Adult:
                        <input class="text-center" type="number" id="adultVal" min="0" value="<?=$adult?>">
                    </div>
                    <div class="">
                        Children:
                        <input class="text-center" type="number" id="childrenVal" min="0" value="<?=$children?>">
                    </div>
                </div>
                <div class="extraService">
                    <h4 class="extraServiceTitle">Extra service</h4>
                    <div class="contentExtraService">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="extSer1" name="extraService">
                            <label class="form-check-label" for="extSer1">
                                I'm interested in requesting an airport shuttle
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="extSer2" name="extraService">
                            <label class="form-check-label" for="extSer2">
                                Preparing the breakfast
                            </label>
                        </div>
                    </div>
                </div>
                <div class="w-100 mt-5" onclick="bookRoom()">
                    <button class="btnBookStep1 btn">BOOK NOW</button>
                </div>

            </div>
        </div>
    </div>

    <div class="wrapComment">
        <h1>Reviews</h1>
        <div class="mainComment row">
            <div class="col-lg-6">
                <div class="comment">
                    <div class="d-flex">
                        <div class="avatarComment">
                            <img src="https://a0.muscache.com/im/pictures/user/2331c421-177a-4048-b53a-c993e8ca091d.jpg?im_w=240" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="nameComment">Johnathan</div>
                            <div class="dateComment">Nov 2022</div>
                        </div>
                    </div>
                    <div class="contentComment">
                        <p>
                            The pictures don't do any justice to how beautiful the villa is.
                            Jen welcomed us with such warm hands even though we were late.
                        </p>
                    </div>
                </div>
                <div class="comment">
                    <div class="d-flex">
                        <div class="avatarComment">
                            <img src="https://a0.muscache.com/im/pictures/user/ac91004d-e402-4e0a-b4cc-61a840f11e2f.jpg?im_w=240" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="nameComment">Kelly</div>
                            <div class="dateComment">Nov 2022</div>
                        </div>
                    </div>
                    <div class="contentComment">
                        <p>
                            Beautiful place, tranquil and Jenny is a great host. Really enjoyed our group stay.
                        </p>
                    </div>
                </div>
                <div class="comment">
                    <div class="d-flex">
                        <div class="avatarComment">
                            <img src="https://a0.muscache.com/im/users/1831581/profile_pic/1330536058/original.jpg?im_w=240" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="nameComment">Craig</div>
                            <div class="dateComment">Nov 2022</div>
                        </div>
                    </div>
                    <div class="contentComment">
                        <p>
                            Greta value, great spot, well kept and great value for money. The VIEW is INCREDIBLE - !
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="comment">
                    <div class="d-flex">
                        <div class="avatarComment">
                            <img src="https://a0.muscache.com/im/pictures/user/484ef852-39a3-425f-985d-357743e7c674.jpg?im_w=240" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="nameComment">Sees</div>
                            <div class="dateComment">Nov 2022</div>
                        </div>
                    </div>
                    <div class="contentComment">
                        <p>
                            We had a wonderful stay in this beautiful house.
                            A real gem with a wonderful view.
                        </p>
                    </div>
                </div>
                <div class="comment">
                    <div class="d-flex">
                        <div class="avatarComment">
                            <img src="https://a0.muscache.com/im/pictures/user/0ed9e733-b0a6-4c27-857c-c2b23f29a1c0.jpg?im_w=240" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="nameComment">Lena</div>
                            <div class="dateComment">Nov 2022</div>
                        </div>
                    </div>
                    <div class="contentComment">
                        <p>
                            The host is friendly and quickly send us plunger when the toilet was clogged. The place is comfortable, clean and provided everything we needed. The toilet were clean and they even provided comfortable great scents of shower gels, hair products. Hot tub was heating before we used it. Nothing to complain at all! Highly recommend to book with them :)
                        </p>
                    </div>
                </div>
                <div class="comment">
                    <div class="d-flex">
                        <div class="avatarComment">
                            <img src="https://a0.muscache.com/im/pictures/user/bbe24aeb-838c-41b2-ba33-77213e1a9336.jpg?im_w=240" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="nameComment">Lee</div>
                            <div class="dateComment">Nov 2022</div>
                        </div>
                    </div>
                    <div class="contentComment">
                        <p>
                            What an amazing place!! Very cozy has everything you need for a large family. Amazing scenery very relaxing environment. The first day a Family of deer came right through the property it was an awesome experience. The house was very clean. The kitchen was stocked with everything needed to cook amazing breakfasts and dinners for our family of nine.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<button class="moveToTop" id="moveToTop">&#9650;</button>
<div class="notify animate__animated animate__fadeInRight"></div>
