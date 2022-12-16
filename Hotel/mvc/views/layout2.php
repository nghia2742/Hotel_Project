<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="/Hotel/style.css">
    <title>Admin Management</title>
</head>
<body class="text-dark">
    <header>
        <div class="nav_layout2" >
           <a class="text-center text-decoration-none" href="/Hotel/Home">
                <span class="logoText">S E R E N A</span><br>
                <span class="logoText subLogoText">H o t e l s</span>
           </a>
        </div>
    </header>
    <div class="wrapper_management">
        <div class="row g-0 m-0">
            <div class="rounded" id="btnMenuAdmin" data-bs-toggle="collapse" data-bs-target="#menuAdmin">
                <label for="check">
                    <input type="checkbox" id="check"/> 
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                    <span class="bar3"></span>
                </label>
            </div>
            <div class="col-3 sidebar animate__animated animate__fadeInLeft management_body1 p-0 collapse" id="menuAdmin">
                <ul class="list-group text-light table-group pt-5">
                    <a class="mt-4" href="/Hotel/Admin/dashboard">
                        <li class="list-group-item">
                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 11.1111H8.88889V0H0V11.1111ZM0 20H8.88889V13.3333H0V20ZM11.1111 20H20V8.88889H11.1111V20ZM11.1111 0V6.66667H20V0H11.1111Z" fill="white"/>
                            </svg>
                            <span class="table_item_text ml-4">Dashboard</span>
                        </li>
                    </a>
                    <a href="/Hotel/Admin/Customers">
                        <li class="list-group-item">
                            <svg width="18" height="16" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0945 11.4128C18.589 12.5753 19.6363 14.1503 19.6363 16.2503V20.0002H23.9999V16.2503C23.9999 13.5253 20.1054 11.9128 17.0945 11.4128Z" fill="white"/>
                            <path d="M8.72741 9.99987C11.1374 9.99987 13.091 7.76132 13.091 4.99993C13.091 2.23855 11.1374 0 8.72741 0C6.31744 0 4.36377 2.23855 4.36377 4.99993C4.36377 7.76132 6.31744 9.99987 8.72741 9.99987Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2727 9.99987C17.6836 9.99987 19.6363 7.7624 19.6363 4.99993C19.6363 2.23747 17.6836 0 15.2727 0C14.76 0 14.28 0.124998 13.8218 0.299996C14.7272 1.58748 15.2727 3.22496 15.2727 4.99993C15.2727 6.77491 14.7272 8.41239 13.8218 9.69987C14.28 9.87487 14.76 9.99987 15.2727 9.99987Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.72727 11.2498C5.81455 11.2498 0 12.9247 0 16.2497V19.9996H17.4545V16.2497C17.4545 12.9247 11.64 11.2498 8.72727 11.2498Z" fill="white"/>
                            </svg>
                            <span class="table_item_text ml-4">Customers</span>
                        </li>
                    </a>
                    <a href="#">
                        <li class="list-group-item">
                            <svg width="22" height="22" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="28" height="28" fill="url(#pattern0)"/>
                            <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_239_378" transform="scale(0.0104167)"/>
                            </pattern>
                            <image id="image0_239_378" width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAE70lEQVR4nO2cS4gdRRSGvzIaDM6MWQQMxHdcGEd0kSAuXESTMBjDzF4iBh9jXLsXly6EICpR0JiFgugqBBVDjAaEwGhAcZLgSslE3Qh5zPiIM5PfRbeQ9HTfvn27uqvuveeDu+nuU3Wq/lunHt1VYBiGYQwrLrQDVZC0AZgCdgF3Abelt+aAn4HDwCHn3G9hPBxQJK2T9KqkyypnUdI7ktaH9nsgkPS4pAtdVHyW85ImQvvf10h6QdJSD5X/P0uSpkOXoy+RNJGGk7osSXoidHn6Cknr1VvYKeK8pFtClyuP60I7UMArwM0e01sLvOwxPW9ENwxVMtT8Bbjec9KLwB3Oud89p1uLGFvAFOWVPwtMAqPpbxI4VWJzQ5q20QlJn5bE8x8ljebYjUqaLbE9HKJMfYWkn0oqcVcH28kS2zNtlqUbYuwDLpGElSJGnXMLBbZjwMUOtvPOubE6/vkmxj6gjOj+NHWIUYCyUcrWDvceLbG1RboyJH1SEsdnCzrhMUmnSmw/DlGmTsTYAr4ouT8OnEg73NH0NwWcAO6rmXbrlMZTSfcDzwHbgTuBm5p2qs/5k2QieRR41zk32+nhQgEkrQb2AXuJs6X0A8vAfuAl59y/eQ/kCpBW/ufAY835NlR8CezME6Hon70Pq3yfbANey7uxogWkMf97YFXDTg0by8CDzrlr1qzyWsDzWOU3wSrg2ezFPAG2N+/L0LIjeyEvBM0DI624M3ysWIvKE0Dt+TN8OOeuqXMb3wfGBAiMCRAYEyAwJkBgTIDAmACBCSHADPAicC/JhG8E2JRe+zaAP0FpcyK2AEwDHznncvOQ5IAngbcZ0Nl4diLWlgALwFbn3MluHpa0GTjOAL59CzUTnu628gHSZ/c26E80tNECZoCHi8JOEWk4mgG21Mk8+4/zTdX6CtECDlStfIDU5v0G/ImKNgT4uobtMW9eREobApwLZNsXtCFAnRg8UN+B5tGGABtq2N7qzYtIaUOAOp+3bPPmRaS0IcCedEhZidTm6Qb8iQrfG+HyeIhkeeHDina7qTkHgPjfcdtSRMuEWooYAY5L2t0pHElykp5iQCs/jxCfpXxHMsP9CjibXrudZHfLM8DmhvMPSqjVUCPFvguKDBMgMCZAYNqYB1wGvgFOAmeA08AfwAWS4Skko6S1wDqSjXabSOYAjwCr62Qe2/uALE11wleAQ8BB4FjRzvYyJI2QLEfsITmQo3KLjU2AUn9K9tmWcUXSAUl31ypVvl8bJR1M8+ga337k+FUJ7wlexZykFRsQGijwhKRfvRW4vj+V8J5gypykjU0X9iof75F0zkuB6/tSiay9jz7gb2CLc+50r4XoBUnjJLPqGzs9F3sf4GMY+lbblQ+Q7jbc33a+vvEhQNVlZp98EDBvL/gIQWucc/948qcSktYAf4XIu1e8L8Y1HWPLaKOj9YktxkWGCRCY2mtB/RYCYsNaQGBMgMCYAIExAQJjAgTGBAiMCRCYPAHmW/dieLiUvZAnwFwLjgwrZ7MX8gQ40oIjw8qKo5PzVkPHgR+wkxN9sww8kH15taIFDMqbpgh5M+/NYaejiz9jCLYItcRRkqOLF7M3coeh6RnHO4E3SJqO0RtLwOsUVD50d3z9OMmJrztIjq8fyFNMPLJAcnz9EeC9EB8sGIZhGIZhGIZhGIZhGHHyH08iOLKjW1G1AAAAAElFTkSuQmCC"/>
                            </defs>
                            </svg>
                            <span class="table_item_text ml-4">Staffs</span>
                        </li>
                    </a>
                    <a href="/Hotel/Admin/History">
                        <li class="list-group-item">
                            <svg width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_246_278)">
                            <path d="M20.5833 5.41667V20.5833H5.41667V5.41667H20.5833ZM21.775 3.25H4.225C3.68333 3.25 3.25 3.68333 3.25 4.225V21.775C3.25 22.2083 3.68333 22.75 4.225 22.75H21.775C22.2083 22.75 22.75 22.2083 22.75 21.775V4.225C22.75 3.68333 22.2083 3.25 21.775 3.25V3.25ZM11.9167 7.58333H18.4167V9.75H11.9167V7.58333ZM11.9167 11.9167H18.4167V14.0833H11.9167V11.9167ZM11.9167 16.25H18.4167V18.4167H11.9167V16.25ZM7.58333 7.58333H9.75V9.75H7.58333V7.58333ZM7.58333 11.9167H9.75V14.0833H7.58333V11.9167ZM7.58333 16.25H9.75V18.4167H7.58333V16.25Z" fill="white"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_246_278">
                            <rect width="26" height="26" fill="white"/>
                            </clipPath>
                            </defs>
                            </svg>
                            <span class="table_item_text ml-4">History</span>
                        </li>
                    </a>
                    <a href="/Hotel/Admin/Rooms">
                        <li class="list-group-item">
                            <svg width="18" height="18" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.4 9.28571V3.71429C23.4 1.67143 22.23 0 20.8 0H5.2C3.77 0 2.6 1.67143 2.6 3.71429V9.28571C1.17 9.28571 0 10.9571 0 13V22.2857H1.729L2.6 26H3.9L4.771 22.2857H21.242L22.1 26H23.4L24.271 22.2857H26V13C26 10.9571 24.83 9.28571 23.4 9.28571ZM11.7 9.28571H5.2V3.71429H11.7V9.28571ZM20.8 9.28571H14.3V3.71429H20.8V9.28571Z" fill="white"/>
                            </svg>
                            <span class="table_item_text ml-4">Rooms</span>
                        </li>
                    </a>
                    <a href="/Hotel/Admin/Reservation">
                        <li class="list-group-item">
                            <svg width="20" height="14" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.6 5.71429H0V8.57143H15.6V5.71429ZM15.6 0H0V2.85714H15.6V0ZM20.8 11.4286V5.71429H18.2V11.4286H13V14.2857H18.2V20H20.8V14.2857H26V11.4286H20.8ZM0 14.2857H10.4V11.4286H0V14.2857Z" fill="white"/>
                            </svg>
                            <span class="table_item_text ml-4">Reservation</span>
                        </li>
                    </a>
                    <a href="#">
                        <li class="list-group-item">
                            <svg width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_246_286)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.6666 3.25H4.33329C3.14163 3.25 2.16663 4.225 2.16663 5.41667V20.5833C2.16663 21.775 3.14163 22.75 4.33329 22.75H21.6666C22.8583 22.75 23.8333 21.775 23.8333 20.5833V5.41667C23.8333 4.225 22.8583 3.25 21.6666 3.25ZM10.8333 18.4167H5.41663V16.25H10.8333V18.4167ZM10.8333 14.0833H5.41663V11.9167H10.8333V14.0833ZM10.8333 9.75H5.41663V7.58333H10.8333V9.75ZM16.055 16.25L13 13.1733L14.5275 11.6458L16.055 13.1842L19.4891 9.75L21.0275 11.2883L16.055 16.25Z" fill="white"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_246_286">
                            <rect width="26" height="26" fill="white"/>
                            </clipPath>
                            </defs>
                            </svg>
                            <span class="table_item_text ml-4">Bills</span>
                        </li>
                    </a>
                    <a href="#">
                        <li class="list-group-item">
                            <svg width="16" height="16" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.8333 0H2.16667C0.975 0 0.0108336 0.975 0.0108336 2.16667L0 19.5C0 20.6917 0.964166 21.6667 2.15583 21.6667H15.1667C16.3583 21.6667 17.3333 20.6917 17.3333 19.5V6.5L10.8333 0ZM13 17.3333H4.33333V15.1667H13V17.3333ZM13 13H4.33333V10.8333H13V13ZM9.75 7.58333V1.625L15.7083 7.58333H9.75Z" fill="white"/>
                            </svg>
                            <span class="table_item_text ml-4">Statics</span>
                        </li>
                    </a>
                    <a href="#">
                        <li class="list-group-item">
                            <svg width="22" height="22" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_239_361)">
                            <path d="M22.33 15.0967C22.3767 14.7467 22.4 14.385 22.4 14C22.4 13.6267 22.3767 13.2534 22.3184 12.9034L24.6867 11.06C24.8967 10.8967 24.955 10.5817 24.8267 10.3484L22.5867 6.47505C22.4467 6.21838 22.155 6.13672 21.8984 6.21838L19.11 7.33838C18.5267 6.89505 17.9084 6.52172 17.22 6.24172L16.8 3.27838C16.7534 2.99838 16.52 2.80005 16.24 2.80005H11.76C11.48 2.80005 11.2584 2.99838 11.2117 3.27838L10.7917 6.24172C10.1034 6.52172 9.47338 6.90672 8.90171 7.33838L6.11338 6.21838C5.85671 6.12505 5.56505 6.21838 5.42505 6.47505L3.19671 10.3484C3.05671 10.5934 3.10338 10.8967 3.33671 11.06L5.70505 12.9034C5.64671 13.2534 5.60005 13.6384 5.60005 14C5.60005 14.3617 5.62338 14.7467 5.68171 15.0967L3.31338 16.9401C3.10338 17.1034 3.04505 17.4184 3.17338 17.6517L5.41338 21.5251C5.55338 21.7817 5.84505 21.8634 6.10171 21.7817L8.89005 20.6617C9.47338 21.105 10.0917 21.4784 10.78 21.7584L11.2 24.7217C11.2584 25.0017 11.48 25.2001 11.76 25.2001H16.24C16.52 25.2001 16.7534 25.0017 16.7884 24.7217L17.2084 21.7584C17.8967 21.4784 18.5267 21.105 19.0984 20.6617L21.8867 21.7817C22.1434 21.8751 22.435 21.7817 22.575 21.5251L24.815 17.6517C24.955 17.395 24.8967 17.1034 24.675 16.9401L22.33 15.0967ZM14 18.2001C11.69 18.2001 9.80005 16.3101 9.80005 14C9.80005 11.6901 11.69 9.80005 14 9.80005C16.31 9.80005 18.2 11.6901 18.2 14C18.2 16.3101 16.31 18.2001 14 18.2001Z" fill="white"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_239_361">
                            <rect width="28" height="28" fill="white"/>
                            </clipPath>
                            </defs>
                            </svg>

                            <span class="table_item_text ml-4">Settings</span>
                        </li>
                    </a>
                    <a href="/Hotel/SignOut">
                        <li class="list-group-item">
                            <svg width="22" height="22" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_239_373)">
                            <path d="M19.8334 8.16667L18.1884 9.81167L21.1984 12.8333H9.33337V15.1667H21.1984L18.1884 18.1767L19.8334 19.8333L25.6667 14L19.8334 8.16667ZM4.66671 5.83333H14V3.5H4.66671C3.38337 3.5 2.33337 4.55 2.33337 5.83333V22.1667C2.33337 23.45 3.38337 24.5 4.66671 24.5H14V22.1667H4.66671V5.83333Z" fill="white"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_239_373">
                            <rect width="28" height="28" fill="white"/>
                            </clipPath>
                            </defs>
                            </svg>

                            <span class="table_item_text ml-4">Sign out</span>
                        </li>
                    </a>
                </ul>
            </div>
            <div class="col management_body2 p-0" id="content">
                <?php require_once "./mvc/views/pages/".$data["page"].".php" ?>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/Hotel/main.js"></script>
</body>
</html>