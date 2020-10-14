<?php $page_selected = 'index'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>chat - index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="#">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<header>
    <?php
    include("includes/header.php");
   ?>
</header>
<main>
    <span id="splash-overlay" class="splash"></span>
    <span id="welcome"></span>
    
    <div class="container" style="padding-top:5%;padding-bottom:5%;width:100%">
        <div class="row center">
            <div class="col l3">
                <h1 class="reveal-text">
	                welcome to say Hi ! 
                </h1>
                <p>l'appli pour te connecter à tes proches où que tu sois.</p>
            </div>
        </div>
    </div>

    <div class="waveWrapper waveAnimation">
        <div class="waveWrapperInner bgTop">
            <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
        </div>
        <div class="waveWrapperInner bgMiddle">
            <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
        </div>
        <div class="waveWrapperInner bgBottom">
            <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
        </div>
    </div>

    <a href="inscription.php" class="waves-effect waves-red btn black test">SIGN UP</a>

    <section class="about_us">
        <div class="about_description">
            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</h2>
            <hr class="about_border">
            <p class="about_text">Lorem ipsum dolor sit amet, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
        <div>
            <figure class="about_img">
                <img class="responsive-img about_img-content" src="img/device.jpeg" alt="phone_device" width=600 />
                <figcaption>connecte-toi à tes proches où que tu sois !</figcaption>
            </figure>
        </div>
    </section>

    <section class="services">
        <div class="row nomargin center">
            <h2 class="section_title">Nos services</h2>
        </div>
        <div class="row row4">
            <div class="col l3">
                <h3 class="services-slogan">
                    "La confidentialité de vos échanges est notre priorité, 
                    <span class="highlight">discuter, partager<span>
                    en toute sécurité"
                </h3>
            </div>
            <div class="col l3 services-description">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
            <div class="col l3 services-description">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
            <div class="col l3 services-description">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
        </div>
    </section>  
</main>
<footer>
    <?php
    include("includes/footer.php") ?>
</footer>
</body>
</html>