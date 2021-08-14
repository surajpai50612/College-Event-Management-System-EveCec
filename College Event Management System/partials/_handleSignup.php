<?php
    $showError="false";
    $showAlert=false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include 'dbconnect.php';

        $username=$_POST['signupUsername'];
        $usn=$_POST['signupUSN'];
        $user_email=$_POST['signupEmail'];
        $user_password=$_POST['signuppassword'];
        $user_cpassword=$_POST['signupcpassword'];

        // check whether this email exists
        $exitSql="select * from `users` where email_id='$user_email' or usn='$usn'";
        $result=mysqli_query($conn,$exitSql);
        $numRows=mysqli_num_rows($result);

        if($numRows){
            $showError="Already an account with same mail or usn exists.";
        }
        else{
            if($user_password==$user_cpassword){
                // $hash=password_hash($user_password,PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` (`username`, `usn`, `email_id`, `password`, `timestrap`) VALUES ('$username', '$usn', '$user_email', '$user_password', current_timestamp());";
                $result=mysqli_query($conn,$sql);
                if($result){
                    $showAlert=true;
                    header("Location:/college event management system/index.php?signupsuccess=true");
                    exit();
                }
            }
            else{
                $showError="Password donot match";
            }
        }
        header("Location:/college event management system/index.php?signupsuccess=false&error=$showError");

    }
?>