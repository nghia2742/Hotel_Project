<div class="frame_profile">
    <?php // echo $data['profile']?>
    <div class="container-fluid">
        <div class="row g-0 p-0">
            <div class="col-5">
                <div class="d-flex justify-content-center">
                    <div class="wrap_avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="#" class="text-light fs-3"><i>Change your avatar</i></a>
                </div>
            </div>
            <div class="col-7">
                <h1 class="title_profile">GENERAL PROFILE</h1>
                <div class="profile_customer">
                    <div class="mb-3">
                      <label for="nameCus" class="form-label">Full name</label>
                      <input type="text" id="nameCus" class="form-control" value="<?php if (isset($_SESSION['signedIn'])){echo $_SESSION['nameCus'];} ?>">
                    </div>
                    
                    <div class="mb-3">
                      <label for="phoneCus" class="form-label">Phone</label>
                      <input type="text" id="phoneCus" class="form-control" value="<?php if (isset($_SESSION['signedIn'])){echo $_SESSION['phoneCus'];} ?>">
                    </div>

                    <div class="mb-3">
                      <label for="emailCus" class="form-label">Email</label>
                      <input type="text" id="emailCus" class="form-control" value="<?php if (isset($_SESSION['signedIn'])){echo $_SESSION['emailCus'];} ?>" readonly>
                    </div>

                    <div class="d-flex justify-content-around">
                        <button type="button" class="btn btn-info text-light" id="saveProfile">SAVE PROFILE</button>
                        <button type="button" class="btn btnUpdatePass" data-bs-toggle="collapse" data-bs-target="#changePassword" aria-pressed="false" autocomplete="off">CHANGE YOUR PASSWORD</button>
                    </div>

                    <div class="collapse mt-3" id="changePassword">
                        <div class="card card-body p-5">
                            <div class="mb-3">
                                <label for="curPassword" class="form-label">Current password</label>
                                <input type="password" id="curPassword" class="form-control password">
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New password</label>
                                <input type="password" id="newPassword" class="form-control password">
                            </div>
                            <div class="mb-3">
                                <label for="newPassword2nd" class="form-label">Confirm password</label>
                                <input type="password" id="newPassword2nd" class="form-control password">
                            </div>
                            <div class="form-check mt-3 ml-3">
                                <input class="form-check-input" type="checkbox" id="showPass">
                                <label class="form-check-label text-dark" for="showPass">
                                    Show password
                                </label>
                            </div>
                            <div class="btn btn-lg btnUpdatePass mt-3" id="btnUpdatePass">Update</div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
<div class="notify animate__animated animate__fadeInRight"></div>
