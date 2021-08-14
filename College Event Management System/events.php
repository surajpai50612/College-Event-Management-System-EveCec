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
    <!-- Title -->
    <title>Events</title>
    <style>
        .events{
            min-height: 93vh;
        }
    </style>
</head>

<body>
    <!-- Connecting database -->
    <?php include 'partials/dbconnect.php'  ?>
    <!-- Navigation bar -->
    <?php include 'partials/header.php'  ?>

    <!-- Events container -->
    <div class="events" style="background-color:#7c2387;min-height:93vh;">
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
            echo '<div style="padding-top:40px;">';
            include "events_table.php"; 
            echo '</div>';
        }
        else{
            echo '<div class="text-center" style="color: white;padding-top:300px;">
            <h1>OOPS!</h1>
            <h2 class="lead">You are not logged in, Please login to be able to register for the events</h2>
            </div>';
        }
        ?>
        
    </div>
    
    <!-- Footer -->
    <?php include 'partials/footer.php'  ?>

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
    $(window).scroll(function() {
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 200);
    });
    </script>

    <script src="swiper.min.js"></script>
    <script>
    var swiper = new Swiper('.swiper-container', {
        speed: 1000,
        direction: 'horizontal',
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 100,
            modifier: 5,
            slideShadows: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },

        zoom: true,
        autoplay: {
            delay: 2000,
        },
        loop: true,
    });
    </script>

</body>

</html>