<?php
    $showError="false";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include 'dbconnect.php';

        $email=$_POST['loginEmail'];
        $pass=$_POST['loginPass'];
        $uname=$_POST['uname'];
        // check whether this email exists
        $sql="select * from `users` where email_id='$email'";
        $result=mysqli_query($conn,$sql);
        $numRows=mysqli_num_rows($result);
        if($numRows==1){
                $row=mysqli_fetch_assoc($result);
                if($pass==$row["password"]){
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['si']=$row['si'];
                    $_SESSION['uname']=$uname;
                    header("Location:/college event management system/index.php?loginsuccess=true");
                }
                else{
                    header("Location:/college event management system/index.php?loginsuccess=false");
                }
        }
        else{
            header("Location:/college event management system/index.php?loginsuccess=false");
        }
    }
?>