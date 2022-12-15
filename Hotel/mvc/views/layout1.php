<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Hotel/style.css">
    <title>XAMMP-Hotel</title>
</head>
<body>
    <header>
        <div class="navigation">
            <nav class="navbar navbar-expand-md row d-sm-flex p-0">
                <a class="banner col-lg-5 col-md-2 col-sm-2 col-4 text-decoration-none" href="/Hotel/Home">
                    <div class="logo ml-lg-5">
                        <div class="contentLogo">
                            <span class="logoText">S E R E N A</span><br>
                            <span class="logoText subLogoText">H o t e l s</span>
                        </div>
                    </div>
                </a>
                <div class="navbar-toggler mr-5 navbarToggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <img class="btnToggle" src="./public/images/menu.png" alt="" width="32">
                </div>
                <div class="collapse navbar-collapse  navbarCollapse col-lg-7 col-md-10 col-sm-12 col-12 justify-content-end" id="navbarSupportedContent">
                    <ul class="nav text-light d-inline-block d-md-flex backgroundColorToggle">
                        <li class="nav-item">
                            <a class="nav-link" href="/Hotel">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Facilities</a>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Booking</div>
                            <ul class="dropdown-menu fs-3 px-4">
                                <li class="py-2"><a class="dropdown-item" href="http://localhost/Hotel/Booking">Booking</a></li>
                                <li class="py-2"><a class="dropdown-item" href="http://localhost/Hotel/History">History</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact-us</a>
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link" href="/Hotel/Signin"><span class="signIn">Sign in</span></a> -->
                            <?php require_once "./mvc/views/blocks/controlSignIn.php" ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div id="content">
        <?php require_once "./mvc/views/pages/".$data["page"].".php" ?>
    </div>
    <footer class="footer">
            <div class="row">
                <div class="footerElement col-12 col-sm-6 col-md-3 mt-md-0">
                    <div class="footerLogo">
                        <h4 class="footerLogo_logoText">S E R E N A</h4>
                        <h5 class="footerLogo_subLogoText">H o t e l s</h5>
                    </div>
                    <div class="contact">
                        <div class="address">abcd road, abcd city, abcd</div>
                        <div class="numberPhone">+91 1234567890</div>
                        <div class="gmail">serena@gmail.com</div>
                    </div>
                </div>
                <div class="footerElement col-12 col-sm-6 col-md-3 mt-5 mt-md-0">
                    <ul>
                        <li>About us</li>
                        <li>Contact</li>
                        <li>Term&Conditions</li>
                    </ul>
                </div>
                <div class="footerElement col-12 col-sm-6 col-md-3 mt-5 mt-md-0">
                    <ul>
                        <li>
                            <span class="fa fa-facebook"></span>Facebook
                        </li>
                        <li>
                            <span class="fa fa-twitter"></span>Twitter
                        </li>
                        <li>
                            <span class="fa fa-instagram"></span>Instagram
                        </li>
                    </ul>
                </div>
                <div class="footerElement col-12 col-sm-6 col-md-3 mt-5 mt-md-0">
                    <div class="d-block">
                        <div class="footerInputLabel">Subscribe to our newsletter</div>
                        <div class="inputEmail d-inline-flex mt-5">
                            <input class="footerInput" type="text" name="" id="" placeholder="Email Address">
                            <div class="btnInputEmail">OK</div>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="/Hotel/main.js"></script>
</body>
</html>