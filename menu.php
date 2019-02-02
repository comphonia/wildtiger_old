<?php
include_once('admin/includes/php/sqlInterface.php');

$sqlInterface = new sqlInterface();

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--    <link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/slideout.css">

    <title>Menu | Wild Thai Restaurant &amp; Bar </title>
</head>



<body>
    <nav id="menu">
        <header class="">
            <div class="my-3">
                <i class="fas fa-home"></i> <span class="mx-3">Home</span>
            </div>
            <a href="admin/index.php">
                <i class="fas fa-toolbox"></i> <span class="mx-3">Admin<span class="f07"> (Demo Only)</span></span>
            </a>
        </header>
    </nav>

    <div class="container-fluid" id="panel">
        <div class="header px-4  position-sticky row justify-content-between">
            <div class="fas fa-bars toggle-button my-auto col"></div>
            <div class="text-center col">Menu</div>
            <div class="col"> </div>
        </div>

        <div class="row">
            <div class="col text-center logo-area ">
                <div class="logo-underlay"></div>
                <img class="img-fluid logo" src="assets/Images/tiger_and_words.png" width="300">
            </div>
        </div>

        <div class="row" id="sub-NavbarWrapper">
            <subnav class="sub-header px-4 col" id="sub-Navbar">
                <div class="container p-0 sub-nav ">
                    <span class="menu-items"> <span class="nav-item"><a class="nav-active" href="#appetizers">Appetizers</a></span>
                        <span class="nav-item"><a href="#soup" class="">Soup</a></span>
                        <span class="nav-item"><a href="#salad" class="">Salad</a></span></span>

                    <span class="btn-group float-right mr-4">
                        <button class="btn btn-light " type="button">
                            <a href="#drinks" class="bar font-weight-bold">Drinks <i class="fas fa-wine-bottle f1-5"></i></a>
                        </button>
                        <button type="button" class="btn  dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Stir-Fried</a>
                            <a class="dropdown-item" href="#">Noodles</a>
                            <a class="dropdown-item" href="#">Noodle Soup</a>
                        </div>
                    </span>

                </div>
            </subnav>
        </div>

        <!--Menu Items-->
        <div class="container">
            <!--Section-->
            <?php  $sqlInterface->getCategories(); ?>

            <!--Menu End-->

        </div>

        <!--Footer-->
        <div class="footer" style="height: 600px;">
        </div>
    </div>

    <div class="modal-overlay closed" id="modal-overlay"></div>
    <div class="modal closed" id="modal">

        <div class="modal-guts">
            <div class="modal-head">
                <div class="close-button float-right f1" id="close-button"><i class="fas fa-times"></i></div>
                <div class="h4 font-weight-bold">Crispy Egg Rolls</div>
                <hr>
            </div>
            <div class="modal-image"><img class="img-fit" src="assets/Images/Middle-page-1.jpg" alt="Card image cap"></div>
            <p class="card-header-text my-3">Price: <span class="text-muted float-right">$4.50</span></p>
            <p class="card-header-text my-2">Description</p>
            <p class="card-text text-muted">Silver noodle, taro, cabbage and carrot served with sweet &amp; sour plum sauce.</p>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slideout/1.0.1/slideout.min.js"></script>
    <script src="assets/js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@14.0/dist/smooth-scroll.polyfills.min.js"></script>


    <script>
        //Init Slideout
        var slideout = new Slideout({
            'panel': document.getElementById('panel'),
            'menu': document.getElementById('menu'),
            'padding': 256,
            'tolerance': 70
        });

        // Toggle button
        document.querySelector('.toggle-button').addEventListener('click', function() {
            slideout.toggle();
        });

        //Init smooth scroll
        var scroll = new SmoothScroll('a[href*="#"]');

    </script>
</body>

</html>
