<?php

    // connect to database
    $insert=false;
    $update=false;
    $delete=false;
    
    include 'partials/dbconnect.php';
    include 'register.php';

    if(isset($_GET['delete'])){
      $sno=$_GET['delete'];
      $delete=true;
      $sql="DELETE FROM `events` WHERE `events`.`si` = $sno";
      $result=mysqli_query($conn,$sql);
    }
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(isset($_POST['snoEdit'])){
        // Update the record
        $sno=$_POST['snoEdit'];
        $img=$_POST['image_idEdit'];
        $title=$_POST['titleEdit'];
        $category=$_POST['categoryEdit'];
        $description=$_POST['descriptionEdit'];
        $venue=$_POST['venueEdit'];
        $d_t=$_POST['d_tEdit'];
        $sql="UPDATE `events` SET `image_id` = '$img', `name` = '$title', `category` = '$category', `description` = '$description', `venue` = '$venue', `d&t` = '$d_t' WHERE `events`.`si` = $sno;";
        $result=mysqli_query($conn,$sql);

      if($result){
        $update=true;
      }
      }
      else if(!isset($_POST['regEdit'])){
      $title=$_POST['title'];
      $description=$_POST['description'];
      $img=$_POST['image_id'];
      $category=$_POST['category'];
      $venue=$_POST['venue'];
      $d_t=$_POST['d_t'];

      $sql="INSERT INTO `events` (`image_id`, `name`, `category`, `description`, `venue`, `d&t`, `timestramp`) VALUES ('$img', '$title', '$category', '$description', '$venue', '$d_t', current_timestamp());";
    //   $sql="INSERT INTO `notes` ( `title`, `description`) VALUES ('$title', '$description')";
      $result=mysqli_query($conn,$sql);
      
      if($result){
        $insert=true;
      }
      else{
            echo "<script type='text/javascript'>alert('Error! Your event has not been inserted because image_id is already exists.');</script>";
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

<body style="background-color:#7c2387;">

    <!--Edit event  Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit this event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="/college event management system/events.php?update=true" method="post" autocomplete="off">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="image_id">Image ID</label>
                            <input type="text" class="form-control" id="image_idEdit" name="image_idEdit"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="title">Event Name</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="category">Event Category</label>
                            <input type="text" class="form-control" id="categoryEdit" name="categoryEdit"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="description">Event Description</label>
                            <textarea class="form-control" name="descriptionEdit" id="descriptionEdit"
                                rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="venue">Event Venue</label>
                            <input type="text" class="form-control" id="venueEdit" name="venueEdit"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="d_t">Event Date & Time</label>
                            <input type="text" class="form-control" id="d_tEdit" name="d_tEdit"
                                aria-describedby="emailHelp">
                        </div>

                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <?php
    if($insert){
        echo "<script type='text/javascript'>alert('Success! Your event has been inserted.');</script>";
    }
  ?>
    <?php
    if($delete){
        echo "<script type='text/javascript'>alert('Success! Your event has been deleted.');</script>";
    }
  ?>
    <?php
    if($update){
        echo "<script type='text/javascript'>alert('Success! Your event has been updated.');</script>";
    }
  ?>
                <?php    
                    if($_SESSION['uname']=="admin"){
                        echo '
                        <div class="container" style="padding-top:80px;color:#6bfc03;">
                        <a class="btn btn-success nav-link" href="getDetail.php">Today`s Registers</a>
        <h2 class="text-center" style="padding-top:20px;font-weight:bold;">Add an event to Eve Cec</h2>
        <form action="/college event management system/events.php" method="post">
            <div class="form-group my-4">
                <label for="image_id">
                    <h4>Add Image ID</h4>
                </label>
                <input type="text" class="form-control" style="border: 3px solid red;background-color: #E6E6FA;" id="image_id" name="image_id" aria-describedby="emailHelp">
            </div>
            <div class="form-group my-4">
                <label for="title">
                    <h4>Add event Name</h4>
                </label>
                <input type="text" class="form-control" style="border: 3px solid red;background-color: #E6E6FA;" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="form-group my-4">
                <label for="category">
                    <h4>Add event Category</h4>
                </label>
                <input type="text" class="form-control" style="border: 3px solid red;background-color: #E6E6FA;" id="category" name="category" aria-describedby="emailHelp">
            </div>
            <div class="form-group my-4">
                <label for="description">
                    <h4>Add event Description</h4>
                </label>
                <textarea class="form-control" style="border: 3px solid red;background-color: #E6E6FA;" name="description" id="description" rows="3"></textarea>
            </div>
            <div class="form-group my-4">
                <label for="venue">
                    <h4>Add event Venue</h4>
                </label>
                <textarea class="form-control" style="border: 3px solid red;background-color: #E6E6FA;" name="venue" id="venue" rows="3"></textarea>
            </div>
            <div class="form-group my-4">
                <label for="d_t">
                    <h4>Add event Date and Time</h4>
                </label>
                <input type="text" class="form-control" style="border: 3px solid red;background-color: #E6E6FA;" id="d_t" name="d_t" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-success">Add Event</button>
        </form>
    </div>';
    }
    ?>

    <h2 class="text-center" style="padding:80px 0 0 30px;color:#6bfc03;font-weight:bold;">Events</h2>
    <div class="container my-4" style="background-color:#E6E6FA;padding:30px;border:5px solid black;">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">SI No.</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Venue</th>
                    <th scope="col">Date & Time</th>
                    <?php
                        if($_SESSION['uname']=="admin"){
                            echo '<th scope="col">Actions</th>';
                        }
                        if($_SESSION['uname']!="admin"){
                            echo '<th scope="col">Register</th>';
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
        $sql="SELECT * FROM `events`";
        $result=mysqli_query($conn,$sql);
        $sno=0;
        while($row=mysqli_fetch_assoc($result)){
          $sno+=1;
          echo "<tr>
            <th scope='row'>".$sno."</th>
            <td><img src='Images/Events/event-".$row['image_id'].".jpg' alt='image' style='width:100px;height:100px;border-radius:50%;'></td>
            <td>".$row['name']."</td>
            <td>".$row['category']."</td>
            <td>".$row['description']."</td>
            <td>".$row['venue']."</td>
            <td>".$row['d&t']."</td>";
            
            if($_SESSION['uname']=="admin"){
               echo "<td><button class='edit btn btn-sm btn-success' id=".$row['si'].">Edit</button> <button class='delete btn btn-sm btn-success' id=d".$row['si'].">Delete</button>
            </td>";
            }
            if($_SESSION['uname']!="admin"){
            echo "<td><button class='register btn btn-sm btn-danger' data-toggle='modal' data-target='#registerModal' id=".$row['si'].">Register</button>
            </td></tr>";
            }
        }
      ?>
            </tbody>
        </table>
    </div>
    <hr>
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
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();

    });
    </script>
    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            tr = e.target.parentNode.parentNode;
            image_id = tr.getElementsByTagName("td")[0].innerText;
            title = tr.getElementsByTagName("td")[1].innerText;
            category = tr.getElementsByTagName("td")[2].innerText;
            description = tr.getElementsByTagName("td")[3].innerText;
            venue = tr.getElementsByTagName("td")[4].innerText;
            d_t = tr.getElementsByTagName("td")[5].innerText;
            console.log(image_id,title, category,description,venue,d_t);
            image_idEdit.value = image_id;
            titleEdit.value = title;
            categoryEdit.value = category;
            descriptionEdit.value = description;
            venueEdit.value = venue;
            d_tEdit.value = d_t;
            console.log(e.target.id);
            snoEdit.value = e.target.id;
            $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");

            sno = e.target.id.substr(1, );

            if (confirm("Are you sure you want to delete this event")) {
                console.log("Yes");
                window.location = `/college event management system/events.php?delete=${sno}`;

                // TODO: create a form and use post request to submit a form
            } else {
                console.log("No");
            }
        })
    })
    </script>
</body>

</html>