<div class="wrapper_detail">
    <div class="py-5 alert alert-info text-center sloganBook mt-0">
        <h1> Check your reservation once more </h1>
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
                <div class="process-bar activeProcessStep"></div>
            </div>
            <div class="col-4 ">
                <div class="process-step-cont">
                    <div>
                        <div class="process-step step-2 activeProcessStep">2</div>
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
    <div class="guestInformation">
        <div class="guestInfo">
            <h2 class="mb-5 pl-3 bg-info py-3 text-light rounded">Your information</h2>
            <div class="mb-5 d-flex align-items-center">
                <label for="" class="form-label">Full name:</label>
                <input type="text" name="" id="" class="form-control ml-3">
            </div>
            <div class="mb-5 d-flex align-items-center">
                <label for="" class="form-label">Address:</label>
                <input type="text" name="" id="" class="form-control ml-3">
            </div>
            <div class="mb-5 d-flex align-items-center">
                <label for="" class="form-label">Email:</label>
                <input type="text" name="" id="" class="form-control ml-3">
            </div>
            <div class="mb-5 d-flex align-items-center">
                <label for="" class="form-label">Phone:</label>
                <input type="text" name="" id="" class="form-control ml-3">
            </div>

        </div>
    </div>
    <div class="roomInformation">
        <h2 class="mb-5 pl-3 bg-info py-3 text-light rounded">Your room information </h2>
        <div class="mb-5 d-flex align-items-center">
            <label for="" class="form-label">Name's room:</label>
            <span><i>Standard Marvelous Beach</i></span>
            <input type="hidden" name="" id="" class="form-control ml-3">
        </div>
        <div class="mb-5 d-flex align-items-center">
            <label for="" class="form-label">Location:</label>
            <span><i>Nha Trang</i></span>
            <input type="hidden" name="" id="" class="form-control ml-3">
        </div>
        <div class="mb-5 d-flex align-items-center">
            <label for="" class="form-label">Date:</label>
            <span><i>26/11/2022</i></span>
            <input type="hidden" name="" id="" class="form-control ml-3">
            &nbsp;&rarr;&nbsp;
            <span><i>28/11/2022</i></span>
            <input type="hidden" name="" id="" class="form-control ml-3">
            &nbsp;
            <span class="fs-5"><i>(Total length of stay: <b>2 nights</b> )</i></span>
        </div>
        <div class="mb-5 d-flex align-items-center">
            <label for="" class="form-label">Member:</label>
            <span><i>2 Adults</i></span>
            <input type="hidden" name="" id="" class="form-control ml-3">
            ,&nbsp;
            <span><i>0 Children</i></span>
            <input type="hidden" name="" id="" class="form-control ml-3">
        </div>
    </div>
    <div class="bill">
        <h2 class="mb-5 pl-3 bg-info py-3 text-light rounded">Your Bill</h2>
        <div>
            <div>Choose your payment method:</div>
            <div class="my-3 px-5 d-flex justify-content-around">
                <div>
                    <input type="radio" name="paymentMethod" id="payLater">
                    <label for="payLater">Pay later</label>
                </div>
                <div>
                    <input type="radio" name="paymentMethod" id="visaCard" data-bs-toggle="collapse" data-bs-target="#formVISA" aria-expanded="false" aria-controls="formVISA">
                    <label for="visaCard">VISA card</label>
                </div>
            </div>
            <div class="collapse" id="formVISA">
            <div class="card card-body">
                <form action="" class="formVISA">
                    <div class="mb-3">
                      <input type="text" name="" id="" class="form-control" placeholder="Name on Card">
                    </div>
                    <div class="mb-3">
                      <input type="text" name="" id="" class="form-control" placeholder="Card Number">
                    </div>
                    <div class="mb-3">
                      <input type="year" pattern="[0-9]{4}-[0-9]{2}" name="" id="" class="form-control" placeholder="MM/YY">
                    </div>
                </form>
            </div>
            </div>
        </div>    
        <hr>
            <div class="row">
                <div class="col-6 fs-4">
                <h4>Sub total</h4>
                </div>
                <div class="col-6 d-flex flex-row-reverse">
                    $39.99
                </div>
            </div>
        <hr>
            <div class="row">
                <div class="col-6 fs-4">
                    <i>Taxes</i>
                </div>
                <div class="col-6 d-flex flex-row-reverse">
                    $9.99
                </div>
            </div>
            <div class="row">
                <div class="col-6 fs-4">
                    <i>Fee cleaning</i>
                </div>
                <div class="col-6 d-flex flex-row-reverse">
                    $6
                </div>
            </div>
            <div class="row">
                <div class="col-6 fs-4">
                    <i>Extra service</i>
                </div>
                <div class="col-6 d-flex flex-row-reverse">
                    $0
                </div>
            </div>
        <hr>
            <div class="row">
                <div class="col-6"><h4>Total</h4></div>
                <div class="col-6 d-flex flex-row-reverse colorRed fs-1">
                    $55.98
                </div>
            </div>
    </div>

    <div class="list-group-inline btnConfirmation">
        <a id="" class="btn btn-lg p-3 px-5 fs-3 btn-secondary" href="http://localhost/Hotel/Detail" target="_parent">Previous page</a>
        <a id="" class="btn btn-lg p-3 px-5 fs-3 btn-primary ml-5" href="http://localhost/Hotel/Detail/Result">Alright, confirm the form</a>
    </div>
</div>
<button class="moveToTop" id="moveToTop">&#9650;</button>
