<?php
$detail = $data['detailRoom'];

$name = $_SESSION['infoBook'][0];
$phone = $_SESSION['infoBook'][1];
$email = $_SESSION['infoBook'][2];
$dateFrom = $_SESSION['infoBook'][3];
$dateTo = $_SESSION['infoBook'][4];
$adult = $_SESSION['infoBook'][5];
$children = $_SESSION['infoBook'][6];
$extSer1 = $_SESSION['infoBook'][7];
$extSer2 = $_SESSION['infoBook'][8];
$countSer = 0;
if ($extSer1 == 0 || $extSer2 == 0) {
    $countSer = 1;
} else {
    $countSer = 2;
}

$dateFrom = date('d-m-Y', strtotime($dateFrom));
$dateTo = date('d-m-Y', strtotime($dateTo));
$numNights = (int)$dateTo - (int)$dateFrom;

$subTotal = (round($detail['price'] * $_SESSION['currency'] * $numNights, 3));
$taxes = (round($detail['price'] * $_SESSION['currency'] * 0.1, 3));
$feeCleaning = (round(10 * $_SESSION['currency'], 3));
$extra = (round(($extSer1 + $extSer2) * $_SESSION['currency'], 3));

$totalPrice = (int)$subTotal + (int)$taxes + (int)$feeCleaning + (int)$extra;
?>

<div class="wrapper_detail">
    <div class="process-wrap text-center">
        <div class="process-main row">
            <div class="col-4 ">
                <div class="process-step-cont">
                    <div>
                        <div class="process-step step-1 activeProcessStep">1</div>
                        <span class="process-label">Step 1</span>
                    </div>
                </div>
                <div class="process-bar activeProcessStep"></div>
            </div>
            <div class="col-4 ">
                <div class="process-step-cont">
                    <div>
                        <div class="process-step step-2 activeProcessStep">2</div>
                        <span class="process-label">Step 2</span>
                    </div>
                </div>
                <div class="process-bar activeProcessStep"></div>
            </div>
            <div class="col-4">
                <div class="process-step-cont">
                    <div>
                        <div class="process-step step-3 activeProcessStep">3</div>
                        <span class="process-label">Step 3</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center my-5">
        <img src="/Hotel/public/images/check.png" alt="" width="150">
    </div>
    <div class="py-5 alert alert-info text-center sloganBook mt-0">
        <h1> Congratulations, successful reservation !</h1>
        <h5 class="fs-3"><i>Enjoy your life and have a good trip.</i></h5>
    </div>
    <p class="text-center">
        <a class="fs-1 btn btn-lg btn-secondary" data-bs-toggle="collapse" href="#contentId" aria-expanded="false" aria-controls="contentId">
            Show your reservation
        </a>
    </p>
    <div class="collapse" id="contentId">
    <div class="guestInformation">
        <div class="guestInfo">
            <h2 class="mb-5 pl-3 bg-info py-3 text-light rounded">Your information</h2>
            <div class="mb-5 d-flex align-items-center">
                <label for="" class="form-label">Full name:</label>
                <span><i><?=$name?></i></span>
            </div>
            <div class="mb-5 d-flex align-items-center">
                <label for="" class="form-label">Email: </label>
                <span><i><?=$email?></i></span>
                <input type="hidden" value="<?=$email?>" class="form-control ml-3">
            </div>
            <div class="mb-5 d-flex align-items-center">
                <label for="" class="form-label">Phone: </label>
                <span><i><?=$phone?></i></span>
                <input type="hidden" value="<?=$phone?>" class="form-control ml-3">
            </div>

        </div>
    </div>
    <div class="roomInformation">
        <h2 class="mb-5 pl-3 bg-info py-3 text-light rounded">Your room information </h2>
        <div class="mb-5 d-flex align-items-center">
            <label for="" class="form-label">Name's room:</label>
            <span><i><?=$detail['nameRoom']?></i></span>
        </div>
        <div class="mb-5 d-flex align-items-center">
            <label for="" class="form-label">Location:</label>
            <span><i><?=$detail['location']?></i></span>
        </div>
        <div class="mb-5 d-flex align-items-center">
            <label for="" class="form-label">Date:</label>
            <span><i><?=$dateFrom?></i></span>
            &nbsp;&rarr;&nbsp;
            <span><i><?=$dateTo?></i></span>
            &nbsp;
            <span class="fs-5"><i>(Total length of stay: <b><?=$numNights?> nights</b> )</i></span>
        </div>
        <div class="mb-5 d-flex align-items-center">
            <label for="" class="form-label">Member:</label>
            <span><i><?=$adult?> Adults</i></span>
            ,&nbsp;
            <span><i><?=$children?> Children</i></span>
        </div>
    </div>
        <div class="bill">
            <h2 class="mb-5 pl-3 bg-info py-3 text-light rounded">Your Bill</h2>
            
            <hr>
            <div class="row">
                <div class="col-6 fs-4">
                    <h4>Sub total <span><i class="fs-5 fw-normal">(<?=$numNights?> nights)</i></span></h4>
                </div>
                <div class="col-6 d-flex flex-row-reverse">
                    <span>
                        <?= $_SESSION['currencySign'] ?>
                        <?= $subTotal ?>
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6 fs-4">
                    <i>Taxes <span class="fs-5">(10%)</span> </i>
                </div>
                <div class="col-6 d-flex flex-row-reverse">
                    <span>
                        <?= $_SESSION['currencySign'] ?>
                        <?= $taxes ?>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-6 fs-4">
                    <i>Fee cleaning</i>
                </div>
                <div class="col-6 d-flex flex-row-reverse">
                    <?= $_SESSION['currencySign'] ?>
                    <?= $feeCleaning ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6 fs-4">
                    <i>Extra service <span><i class="fs-5">(<?= $countSer ?> services)</i></span></i>
                </div>
                <div class="col-6 d-flex flex-row-reverse">
                    <span>
                        <?= $_SESSION['currencySign'] ?>
                        <?= $extra ?>
                        
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h4>Total</h4>
                </div>
                <div class="col-6 d-flex flex-row-reverse colorRed fs-1">
                    <span>
                        <?= $_SESSION['currencySign'] ?>
                        <span><?= $totalPrice ?></span>
                    </span>


                </div>
            </div>
        </div>
    </div>

</div>
<button class="moveToTop" id="moveToTop">&#9650;</button>