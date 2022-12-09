<div class="background_frame background_frame_booking">
    <div class="booking_header">
        <div class="booking_header_title animate__animated animate__flipInX d-flex">
            <h1 class="booking_header_title"><i>Get your hotel now</i></h1>
            <img class="car_trip ml-5" src="/Hotel/public/images/car_trip.png" alt="" width="60">
        </div>
        <div class="basic_filter">
            <div class="basic_filter_item basic_filter1 mr-4 dropdown dropdown-toggle text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="basic_filter_location">
                    <span class="d-flex align-items-center">
                        <svg width="15" height="25" viewBox="0 0 20 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 0C4.47143 0 0 4.695 0 10.5C0 18.375 10 30 10 30C10 30 20 18.375 20 10.5C20 4.695 15.5286 0 10 0ZM10 14.25C8.02857 14.25 6.42857 12.57 6.42857 10.5C6.42857 8.43 8.02857 6.75 10 6.75C11.9714 6.75 13.5714 8.43 13.5714 10.5C13.5714 12.57 11.9714 14.25 10 14.25Z" fill="#030303" />
                        </svg>
                        <span class="ml-3 mt-2">
                            <input type="hidden" name="" value="0" id="id_location">
                            <input class="input_location" type="text" placeholder="Location" id="input_location" onkeyup="filter_location()" autocomplete="off">
                        </span>
                    </span>
                    <ul class="dropdown-menu location_dropdown" id="list_location">
                        <?php
                            $location = $data['listLocation'];
                            for ($i=0; $i < count($location); $i++) { 
                                echo '<li><span class="location_dropdown-item dropdown-item" data-val="'.$location[$i]['id_location'].'">'.$location[$i]['location'].'</span></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="basic_filter_item basic_filter2">
                <input class="date_from ml-3" type="date" name="dateFrom" id="dateFrom">
            </div>

            <div class="basic_filter_item basic_filter3 mr-4">
                <input class="date_to ml-3" type="date" name="dateTo" id="dateTo">
            </div>

            <div class="wrap_basic_filter4">
                <div class="basic_filter_item basic_filter4 mr-5">
                    <span class="text-dark ml-3" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Bottom popover">
                        <svg class="mr-3" width="20" height="50" viewBox="0 0 41 72" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="40.4156" height="71.85" rx="20" fill="url(#pattern0)" />
                            <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_23_32" transform="translate(0 0.21875) scale(0.0104167 0.00585938)" />
                                </pattern>
                                <image id="image0_23_32" width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAEnElEQVR4nO2c3WseRRSHn420IGr9QBNtvWga7Y1e2CoKNkX0Rr1qbWIEBaH4J9SCWvADEawVRLzWqyroVb22VarWolL1oppYbRWsX6VaTMSmgTRenF1M0747Z3ZnZ2dfzwMHQrI75/zOeXdmdmbegGEYhmEYhmEYhmEYhmEYhmEY/U7WdgAeZMB6YBOwEbgOuD7/20/Ab8CHwLvAF20E2K9kwATwLbCgtClgnG59wJJkBPgUfeKX2kFgOHrUfcIo8DvVk1/YSeCeyLF3nruBOeonv7AzwF1RFXSYYeAE4ZK/+Em4IaKOTpJRr8932SfYwFzKQzSX/MLGoqnpGBl+U82qNhlLUNe4jeaTX9i6SJqcDLQdwCI29amvUlIqwGhEXxsj+iqlagGWIwPmW8hr/9+5TeW/m8iv8WFlxViqsMrz+ib0VmYMOIq7n/0e2OLR7rSizVA2nYBeby4CXlYEstR2oXvSUitA03q9qRJMYTsV7ceYghammYo2rdeLsRrBFLbZ4eP9AD60ti8BvWqWI/1b3YCOUT5QPRfAh9aeTkCvmpDLAw+W+Fkf0I/LbklAL6AbLEK+tJS19SUyDjTNJPBVyd9j6VVzhHCfiCmHr/GAvnrZAwnpVRFyeuia/mXINmJTyf8Y93J0TL0qZgIG9JfC32qa25AZSU2vZgz4RXGNll8V1/yIDF5zAf3OIV3PUcW1UfVqCnAoQCAFnyuv249spJ8I4PMP4D7gI+X1begtZYJwj+S4p+9hZBuxTp+/ukN6L0ioF5PvgGUV/GfIm+mkh69vqL4w1rbeC7IlQEAh5sTrgGeRpYRJZMCcyX/eBzxD+UuWllT0nsOuGsG8GDqYCCSndwB4qUIwO0lr501Lsno3I/2bpg9MZu+1BknqXYbM1Xdzfl+8Gxn9gw1ACfB/02sYhmFEIPWTwlcDNwM3AmtzWwVcCawALsuvm0GWfk8Bx5EZyZHcvkZWQpMktQKsBDYgp+Q2INuUIWI8BhxA1oYOIEsVCwHa7QtuQpYXfNZ66toPwKvEPQ6ZFEPADuAw8ZLeyw7nsQw2qjgg1wKPAK8At3veuwZ4A5il/cQvtVngdfy/VXkHkouHkQ9WIwwCjyNr8/NIwHs87r8ceA35slzbiXbZGaR7WuGhb09+7zwyxmwDrvG4vye3Iqd/lyZuGv0jez/wM/ETWdeOA/cqNQ5y/l7yLPAmMpHwZi3wDnC2R3Das49P8d8T00WbB55Qau21cnoWeBuZSjsZQLqasj56Fl1f90JJG12z5xV6hyjvYk8jXVPPpeor0B2QfU8RzNbACUjBHlXo3qtoZy8yJp7DVcgOviaQbY4ghpA30rYTFtr+xD3ubVe29RnyNg/IFxh3ewRypyOIHQkkqyl70qF91KOtD5Dc85hnEGscQRxKIFFNmeucz4hne1vB/18DXOIIoh+7n8JOObRf6tnewQz4B7jY0fBiXItjCx5tdZGQ+k9nnjeEDqCLBNXfxeMifYUVoGWsAC1jBWgZK0DLWAFaxgrQMlaAlrECtIwVoGWsAC1jBTAMwzAMwzAMwzAMwzAMwzAMw2iYfwF6lMjIsIqIJwAAAABJRU5ErkJggg==" />
                            </defs>
                        </svg>
                        <span id="showAdult">0</span> Adults
                        <span id="showChildren">0</span> children
                    </span>

                </div>
                <div class="controller_person">
                    <div class="arrow-up"></div>
                    <div>
                        <button class="btn btn-success mr-3" id="" onclick="upQuantify('Adult')">+</button>
                        <input class="controller_person_input" type="text" name="" id="quantifyAdult" value="0" readonly>
                        <button class="btn btn-success mx-3" id="" onclick="downQuantify('Adult')">-</button>
                        <span class="text-dark">Adults</span>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-success mr-3" id="" onclick="upQuantify('Children')">+</button>
                        <input class="controller_person_input" type="text" name="" id="quantifyChildren" value="0" readonly>
                        <button class="btn btn-success mx-3" id="" onclick="downQuantify('Children')">-</button>
                        <span class="text-dark">Children</span>
                    </div>
                </div>
            </div>

            <div class="basic_filter_search" id="btnBasicSearch" onclick="searchRoom()">
                <svg width="30" height="30" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M37.4219 32.9312H35.0568L34.2186 32.1229C37.1524 28.7101 38.9187 24.2793 38.9187 19.4594C38.9187 8.71181 30.2069 0 19.4594 0C8.71181 0 0 8.71181 0 19.4594C0 30.2069 8.71181 38.9187 19.4594 38.9187C24.2793 38.9187 28.7101 37.1524 32.1229 34.2186L32.9312 35.0568V37.4219L47.9 52.3607L52.3607 47.9L37.4219 32.9312V32.9312ZM19.4594 32.9312C12.0049 32.9312 5.9875 26.9138 5.9875 19.4594C5.9875 12.0049 12.0049 5.9875 19.4594 5.9875C26.9138 5.9875 32.9312 12.0049 32.9312 19.4594C32.9312 26.9138 26.9138 32.9312 19.4594 32.9312Z" fill="black" />
                </svg>
            </div>
        </div>
    </div>
</div>
<div class="wrapper_booking mx-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 wrapper_content_booking1">
                <div class="subFilter">
                    <div class="subFilter-item subFilter-item1">
                        <label for="barPrice" class="form-label">Price:</label>
                        <input type="range" class="form-range" id="barPrice" value="0" min="0">
                        <div class="d-flex justify-content-between mt-3">
                            <p>Min: <br> <?=$_SESSION['currencySign']?><span id="minPrice" data-cur = "<?=$_SESSION['currencySign']?>"></span></p>
                            <p>Max: <br> <span><?=$_SESSION['currencySign']?><?=round(100*4.99*$_SESSION['currency'],3)?></span></p>
                        </div>
                    </div>
                    <div class="greyLine"></div>
                    <div class="subFilter-item subFilter-item2">
                        <p>Star rating:</p>
                        <div class="form-check">
                            <input class="form-check-input" name="numberStar" type="checkbox" value="5" id="numberStar5">
                            <label class="form-check-label colorStar" for="numberStar5">
                                ★★★★★
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="numberStar" type="checkbox" value="4" id="numberStar4">
                            <label class="form-check-label colorStar" for="numberStar4">
                                ★★★★
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="numberStar" type="checkbox" value="3" id="numberStar3">
                            <label class="form-check-label colorStar" for="numberStar3">
                                ★★★
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="numberStar" type="checkbox" value="2" id="numberStar2">
                            <label class="form-check-label colorStar" for="numberStar2">
                                ★★
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="numberStar" type="checkbox" value="1" id="numberStar1">
                            <label class="form-check-label colorStar" for="numberStar1">
                                ★
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="numberStar" type="checkbox" value="" id="numberStar0">
                            <label class="form-check-label" for="numberStar0">
                                No rate
                            </label>
                        </div>
                    </div>
                    <div class="greyLine"></div>
                    <div class="subFilter-item subFilter-item3">
                        <p>Kind room:</p>
                        <div class="form-check">
                            <input class="form-check-input" name="serviceRoom" type="checkbox" value="1" id="serviceRoom1">
                            <label class="form-check-label " for="serviceRoom1">
                                Normal
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="serviceRoom" type="checkbox" value="2" id="serviceRoom2">
                            <label class="form-check-label " for="serviceRoom2">
                                Standard
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="serviceRoom" type="checkbox" value="3" id="serviceRoom3">
                            <label class="form-check-label " for="serviceRoom3">
                                Deluxe
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="serviceRoom" type="checkbox" value="4" id="serviceRoom4">
                            <label class="form-check-label " for="serviceRoom4">
                                Superior
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="serviceRoom" type="checkbox" value="5" id="serviceRoom5">
                            <label class="form-check-label " for="serviceRoom5">
                                Suite
                            </label>
                        </div>
                    </div>
                    <div class="greyLine"></div>
                    <div class="subFilter-item subFilter-item4">
                        <p>Status:</p>
                        <div class="form-check">
                            <input class="form-check-input" name="distance" type="checkbox" value="1" id="distance1">
                            <label class="form-check-label " for="distance1">
                                Available
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="distance" type="checkbox" value="2" id="distance2">
                            <label class="form-check-label " for="distance2">
                                Unavailable
                            </label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-8 px-0 wrapper_content_booking2">
                <div class="listSort">
                    <!-- Horizontal under breakpoint -->
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item sortActive" id="id_room" onclick="sortRoom('id_room','ASC')">
                            All
                        </li>
                        <li class="list-group-item" id="bestMatch">
                            Best match
                        </li>
                        <li class="list-group-item" id="rating" onclick="sortRoom('rating','DESC')">
                            Top review
                        </li>
                        <li class="list-group-item " id="highPrice" onclick="sortRoom('price','DESC')">
                            High price
                        </li>
                        <li class="list-group-item" id="lowPrice" onclick="sortRoom('price','ASC')">
                            Low price
                        </li>
                        <li class="list-group-item" data-bs-toggle="modal" data-bs-target="#currency">
                            Currency
                        </li>
                    </ul>
                </div>
                
                <div class="wrap_listRoom">
                    <div class="loaderContent" id="loaderContent">
                        <img id="gif" class="" src="/Hotel/public/images/loadingInside.gif" alt="loading" width="200">
                    </div>
                    <!-- LIST ROOM -->
                    <div class="listRoom text-dark" id="listRoom">
                    </div>
                </div>
                <div class="d-flex justify-content-center text-dark mt-5" id="moreRoom">
                    <div class="btn btn-lg border border-1" onclick="moreRoom()">More Room &#9660</div>
                </div>
            </div>
        </div>
    </div>
</div>
<button class="moveToTop" id="moveToTop">&#9650;</button>

<div class="modal fade" id="currency" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="modalTitleId">Choose your currency:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body my-5">
                <div class="container-fluid text-dark d-flex mx-5 ">
                    <button class="mx-5 btn btn-light fs-2" data-bs-dismiss="modal" onclick="setCurrency(24.519)">
                        <img src="/Hotel/public/images/vietnam.png" alt="" width="30">&nbsp VND
                    </button>
                    <button class="ml-5 btn btn-light fs-2" data-bs-dismiss="modal" onclick="setCurrency(1)">
                        <img src="/Hotel/public/images/united-states.png" alt="" width="30">&nbsp USD
                    </button>
                </div>
            </div>
            <div class="modal-footer mb-2"></div>
        </div>
    </div>
</div>