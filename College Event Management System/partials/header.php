<?php
    session_start();
    
    echo'
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top scr">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="Images/icon.png" alt="brand" style="width:200px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="winner.php">Winners</a>
                    </li>';
                    
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                        echo '
                        <p class="text-light my-2 mx-4">Welcome '.$_SESSION['uname'].'</p>
                        <a href="partials/logout.php" class="btn btn-outline-success b1" data-target="#signupModal">Logout</a>
                        </form>';
                    }
                    else{
                          echo '<button class="btn btn-outline-success mx-4 b1" data-toggle="modal" data-target="#loginModal">Login</button>
                          <button class="btn btn-outline-success b1"  data-toggle="modal" data-target="#signupModal">Signup</button>';
                    }
                    echo '</li>
                </ul>
            </div>
        </div>
    </nav>';
    // Login Modal
    include 'partials/loginModal.php';
    // Signup Modal
    include 'partials/signupModal.php';

    // Displaying message signup
    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
        echo "<script type='text/javascript'>alert('Success! Your account is created');</script>";
    }
    elseif(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false" && $_GET['error']=="Already an account with same mail or usn exists."){
        echo "<script type='text/javascript'>alert('Already an account with same mail or usn exists.');</script>";
    }
    elseif(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false" && $_GET['error']=="Password donot match"){
        echo "<script type='text/javascript'>alert('Password donot match');</script>";
    }

    // Displaying message login
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
        echo "<script type='text/javascript'>alert('Success! You are logged in');</script>";
    }
    elseif(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
        echo "<script type='text/javascript'>alert('Invalid credentials');</script>";
    }
?>