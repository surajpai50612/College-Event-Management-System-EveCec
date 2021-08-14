<?php
    // connect to database
    include 'partials/dbconnect.php';
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
    <style>
        .get{
            min-height: 93vh;
        }
    </style>
</head>

<body style="background-color:#7c2387;">

    <?php include 'partials/header.php'; ?>

    <div class="get">
    <h2 class="text-center" style="padding:100px 0 0 30px;color:#6bfc03;font-weight:bold;">Today`s Registers</h2>
    <div class="container my-4" style="background-color:#E6E6FA;padding:30px;border:5px solid black;">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">SI No.</th>
                    <th scope="col">Event name</th>
                    <th scope="col">Student name</th>
                    <th scope="col">USN</th>
                    <th scope="col">Email id</th>
                    <th scope="col">Phone number</th>
                </tr>
            </thead>
            <tbody>
                <?php
        // Calling Stored Procedure
        $sql="CALL `getDetail`();";
        $result=mysqli_query($conn,$sql);
        $sno=0;
        while($row=mysqli_fetch_assoc($result)){
          $sno+=1;
          echo "<tr>
            <th scope='row'>".$sno."</th>
            <td>".$row['eve_name']."</td>
            <td>".$row['name']."</td>
            <td>".$row['usn']."</td>
            <td>".$row['email_id']."</td>
            <td>".$row['phone_number']."</td>";
        }
      ?>
            </tbody>
        </table>
    </div>
    </div>
    
    <hr>
    <?php include 'partials/footer.php'; ?>
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