<?php
if (!isset($_SESSION['signedIn'])) {
    echo '<a class="nav-link" href="/Hotel/SignIn">
            <span class="signIn">Sign in</span>
        </a>';
}
else 
{
    echo '<a class="nav-link p-0" href="#">
            <div class="dropdown user_dropdown">
                    <span class="signIn signed-in" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </span>
                <div class="dropdown-content">
                    <ul class="p-0">
                        <li>
                            Hello, '.$_SESSION['nameCus'].'
                        </li>
                        <hr>
                        <li>
                            <a href="/Hotel/Profile">Profile</a>
                        </li>
                        <li>
                            <a href="#">History</a>
                        </li>
                        <li>
                        <hr>
                            <a href="#" class="btnSignOut" id="signOut">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    </svg>
                                </span>
                            &nbsp; Sign out
                            </a>
                        </li>
                    <u/>
                </div>
            </div>
        </a>
        
        ';
}
?>