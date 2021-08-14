<?php

    // connect to database
    $insert1=false;
    
    include 'partials/dbconnect.php';
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(isset($_POST['regEdit'])){
      $name=$_POST['name'];
      $usn=$_POST['usn'];
      $email_id=$_POST['email'];
      $phone_number=$_POST['phno'];
      $title=$_POST['title'];
      $category=$_POST['category'];

    if($category=="Sports"){
      $sql="INSERT INTO `sports` (`eve_name`, `name`, `usn`, `email_id`, `phone_number`, `timestrap`) VALUES ('$title','$name', '$usn', '$email_id', '$phone_number',current_timestamp())";
    }
    
    if($category=="Cultural"){
        $sql="INSERT INTO `cultural` (`eve_name`, `name`, `usn`, `email_id`, `phone_number`, `timestrap`) VALUES ('$title','$name', '$usn', '$email_id', '$phone_number',current_timestamp())";
    }

    if($category=="Technical"){
        $sql="INSERT INTO `technical` (`eve_name`, `name`, `usn`, `email_id`, `phone_number`, `timestrap`) VALUES ('$title','$name', '$usn', '$email_id', '$phone_number',current_timestamp())";
    }

      $result=mysqli_query($conn,$sql);
      
      if($result){
        $insert1=true;
      }
      else{
        echo "<script type='text/javascript'>alert('Your registration has been denied because there is no account in Eve Cec with this usn.');</script>";  
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- jQuery -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Favicon -->
    <link rel="icon" href="Images/favicon.ico">
    <!-- Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Swiper -->
    <link rel="stylesheet" href="swiper.min.css">
    <!-- Link to CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--Register event  Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register to this event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="post" autocomplete="off">
                    <div class="modal-body">
                        <input type="hidden" name="regEdit" id="regEdit">
                        <div class="form-group">
                            <label for="name">Enter your Name</label> <span style="color:red;">*</span>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                                placeholder="ex : xyz" required>
                        </div>
                        <div class="form-group">
                            <label for="usn">Enter your USN</label> <span style="color:red;">*</span>
                            <input type="text" class="form-control" id="usn" name="usn" aria-describedby="emailHelp"
                                placeholder="ex : 4CBXXYYZZZ" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Enter your email-id</label> <span style="color:red;">*</span>
                            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                placeholder="ex : xyz123@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="phno">Enter your Phone number</label> <span style="color:red;">*</span>
                            <input type="text" class="form-control" id="phno" name="phno" aria-describedby="emailHelp"
                                placeholder="ex : XYXYXYXYXY" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Event Name</label> <span style="color:red;">*</span>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="category">Event category</label> <span style="color:red;">*</span>
                            <input type="text" class="form-control" id="category" name="category" aria-describedby="emailHelp"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Register</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <?php
    if($insert1){
        echo "<script type='text/javascript'>alert('Success! You have registered for this event.');</script>";
    }
  ?>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>