<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="icon" href="Images/favicon.ico">
    <!-- Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Swiper -->
    <link rel="stylesheet" href="swiper.min.css">
    <!-- Link to CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <!-- Title -->
    <title>Eve CEC</title>
</head>

<body>
    <div id="home">
    <!-- Connecting to database -->
    <?php include 'partials/dbconnect.php'  ?>  
    <!-- Navigation bar -->
    <?php include 'partials/header.php'  ?>

    <!-- Carousel -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" data-pause="true">
        <div class="carousel-inner">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="animate__animated animate__zoomIn" id="ico"><img class="logo" src="Images/logo.png" alt="logo"></h5>
                <p class="animate__animated animate__bounceInRight" id="des">An online platform for providing
                    opportunities to students and identifying young talents.
                </p>
            </div>
            <div class="carousel-item active" data-interval="3000">
                <img src="Images/car-03.jpg" class="d-block w-100" alt="Image">
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="Images/car-02.jpg"
                    class="d-block w-100" alt="Image">
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="Images/car-01.jpg"
                    class="d-block w-100" alt="Image">
            </div>
        </div>
    </div>
    
    <!-- About -->
    <section id="about">
        <div class="container wow fadeInUp">
            <h2 class="text-center ab">About</h2>
            <p style="text-align: justify;" class="ab"></p>
            <div class="text-center row">
                <div class="col">
                    <p class="pa" style="text-align:justify;padding-top:20px;">This platform provides an opportunity for the students of the college to participate in the various events in and out of the college.
                    All the informations related to the events will be provided and the students can register to the events directly using this website.</p>
                </div>
                <div class="col">
                    <img src='https://www.canaraengineering.in/assets/images/logo.png' alt="cec_img" id="canlogo" style="padding-top:20px;"/>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery section (Swiper) -->
    <div class="gal">
        <h3 class="text-center hea">Gallery</h3>
        <div class="swiper-container" id="gallery">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(Images/swiper-01.jpeg)">
                </div>
                <div class="swiper-slide" style="background-image:url(Images/swiper-02.jpeg)">
                </div>
                <div class="swiper-slide" style="background-image:url(Images/swiper-03.jpeg)">
                </div>
                <div class="swiper-slide" style="background-image:url(Images/swiper-04.jpeg)">
                </div>
                <div class="swiper-slide" style="background-image:url(Images/swiper-05.jpeg)">
                </div>
                <div class="swiper-slide" style="background-image:url(Images/swiper-06.jpeg)">
                </div>
                <div class="swiper-slide" style="background-image:url(Images/swiper-07.jpeg)">
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'partials/footer.php'  ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

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