<?php

    // connect to database
    $insert=false;
    $update=false;
    $delete=false;
    
    include 'partials/dbconnect.php';

    if(isset($_GET['delete'])){
      $sno=$_GET['delete'];
      $delete=true;
      $sql="DELETE FROM `winner` WHERE `winner`.`si` = $sno";
      $result=mysqli_query($conn,$sql);
    }
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(isset($_POST['snoEdit'])){
        // Update the record
        $sno=$_POST['snoEdit'];
        $image_id=$_POST['image_idEdit'];
        $stud_name=$_POST['stud_nameEdit'];
        $usn=$_POST['usnEdit'];
        $title=$_POST['titleEdit'];
        $category=$_POST['categoryEdit'];
        $sql="UPDATE `winner` SET `image_id` = '$image_id', `stud_name` = '$stud_name', `usn` = '$usn', `eve_name` = '$title', `category` = '$category' WHERE `winner`.`si` = $sno;";
        $result=mysqli_query($conn,$sql);

      if($result){
        $update=true;
      }
      }
      else{
      $title=$_POST['title'];
      $stud_name=$_POST['stud_name'];
      $usn=$_POST['usn'];
      $image_id=$_POST['image_id'];
      $category=$_POST['category'];

      $sql="INSERT INTO `winner` (`image_id`, `stud_name`, `usn`, `eve_name`, `category`, `timestrap`) VALUES ('$image_id', '$stud_name', '$usn', '$title', '$category', current_timestamp());";
      $result=mysqli_query($conn,$sql);
      
      if($result){
        $insert=true;
      }
      else{
        echo "<script type='text/javascript'>alert('The record has not been inserted because there is no account in Eve Cec with this usn.');</script>";  
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

<body style="background-color: #c70808;">

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit this winner information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/college event management system/winner.php?update=true" method="post" autocomplete="off">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="image_id">Image ID</label>
                            <input type="text" class="form-control" id="image_idEdit" name="image_idEdit"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="stud_name">Winner Name</label>
                            <input type="text" class="form-control" id="stud_nameEdit" name="stud_nameEdit"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="usn">Winner USN</label>
                            <input type="text" class="form-control" id="usnEdit" name="usnEdit"
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
        echo "<script type='text/javascript'>alert('Success! Winner information has been inserted.');</script>";
    }
  ?>
    <?php
    if($delete){
        echo "<script type='text/javascript'>alert('Success! Winner information has been deleted.');</script>";
    }
  ?>
    <?php
    if($update){
        echo "<script type='text/javascript'>alert('Success! Winner information has been updated.');</script>";
    }
  ?>

    <?php
        if($_SESSION['uname']=="admin"){
            echo '<div class="container" style="padding-top:80px;color:#34ebe5;">
            <h2 class="text-center" style="font-weight:bold;">Add a Winner</h2>
            <form action="/college event management system/winner.php" method="post">
                <div class="form-group my-4">
                    <label for="image_id">
                        <h4>Add Winner Image ID</h4>
                    </label>
                    <input type="text" class="form-control" style="border: 3px solid #e834eb;background-color: #E6E6FA;" id="image_id" name="image_id" aria-describedby="emailHelp">
                </div>
                <div class="form-group my-4">
                    <label for="stud_name">
                        <h4>Add Winner Name</h4>
                    </label>
                    <input type="text" class="form-control" style="border: 3px solid #e834eb;background-color: #E6E6FA;" id="stud_name" name="stud_name" aria-describedby="emailHelp">
                </div>
                <div class="form-group my-4">
                    <label for="usn">
                        <h4>Add Winner USN</h4>
                    </label>
                    <input type="text" class="form-control" style="border: 3px solid #e834eb;background-color: #E6E6FA;" id="usn" name="usn" aria-describedby="emailHelp">
                </div>
                <div class="form-group my-4">
                    <label for="title">
                        <h4>Add event Name</h4>
                    </label>
                    <input type="text" class="form-control" style="border: 3px solid #e834eb;background-color: #E6E6FA;" id="title" name="title" aria-describedby="emailHelp">
                </div>
                <div class="form-group my-4">
                    <label for="category">
                        <h4>Add event Category</h4>
                    </label>
                    <input type="text" class="form-control" style="border: 3px solid #e834eb;background-color: #E6E6FA;" id="category" name="category" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-success">Add Winner</button>
            </form>
        </div>';
        }
    ?>
    

    <h2 class="text-center" style="padding:80px 0 0 30px;color:#34ebe5;font-weight:bold;">Congradulations!!... Winners</h2>
    <div class="container my-4" style="background-color:#E6E6FA;padding:30px;border:5px solid black;">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">SI No.</th>
                    <th scope="col">Image</th>
                    <th scope="col">Winner Name</th>
                    <th scope="col">USN</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Category</th>
                    <?php
                    if($_SESSION['uname']=="admin"){
                        echo '<th scope="col">Actions</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
        $sql="SELECT * FROM `winner`";
        $result=mysqli_query($conn,$sql);
        $sno=0;
        while($row=mysqli_fetch_assoc($result)){
          $sno+=1;
          echo "<tr>
            <th scope='row'>".$sno."</th>
            <td><img src='Images/Winners/winner-".$row['image_id'].".jpg' alt='image' style='width:100px;height:100px;border-radius:50%;'></td>
            <td>".$row['stud_name']."</td>
            <td>".$row['usn']."</td>
            <td>".$row['eve_name']."</td>
            <td>".$row['category']."</td>";
            if($_SESSION['uname']=="admin"){
                echo "<td><button class='edit btn btn-sm btn-success' id=".$row['si'].">Edit</button> <button class='delete btn btn-sm btn-success' id=d".$row['si'].">Delete</button>";
            }
            
            echo "</td>
            </tr>";
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
            stud_name = tr.getElementsByTagName("td")[1].innerText;
            usn = tr.getElementsByTagName("td")[2].innerText;
            title = tr.getElementsByTagName("td")[3].innerText;
            category = tr.getElementsByTagName("td")[4].innerText;
            console.log(image_id,stud_name,title,category);
            image_idEdit.value = image_id;
            stud_nameEdit.value = stud_name;
            usnEdit.value = usn;
            titleEdit.value = title;
            categoryEdit.value = category;
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

            if (confirm("Are you sure you want to delete this winner information")) {
                console.log("Yes");
                window.location = `/college event management system/winner.php?delete=${sno}`;
            } else {
                console.log("No");
            }
        })
    })
    </script>
</body>

</html>