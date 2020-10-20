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
        <div class="row center banner-index">
            <div class="col l6 banner-part1">
                <h1 class=index_h1>
                    <span class="title">Welcome to</span>
                    <span class="title">Say-hi!</span>
                </h1>
                <div class="habit habit4">
                    <div class="icon communicate-collaborate">
                        <svg version="1.1" id="communicate-collaborate" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	                        x="0px" y="0px" viewBox="0 0 75 75" enable-background="new 0 0 75 75" xml:space="preserve">
                            <path id="orange-chat" fill-rule="evenodd" clip-rule="evenodd" fill="#98CDF1" d="M59.77,17H29.23C27.45,17,26,18.45,26,20.23
	                        v18.53c0,1.79,1.45,3.23,3.23,3.23h19.5l5.38,6.23c0.65,0.76,1.89,0.29,1.89-0.7V42h3.77c1.79,0,3.23-1.45,3.23-3.23V20.23
	                        C63,18.45,61.55,17,59.77,17z"/>
                            <g id="yellow-chat">
	                        <path id="yellow" fill-rule="evenodd" clip-rule="evenodd" fill="#286FE8" d="M46.77,26H16.23C14.45,26,13,27.45,13,29.23v18.53
		                    c0,1.79,1.45,3.23,3.23,3.23H21v5.58c0,0.98,1.21,1.45,1.87,0.73L28.66,51h18.1c1.79,0,3.23-1.45,3.23-3.23V29.23
		                    C50,27.45,48.55,26,46.77,26z"/>
	                        <g id="circles">
		                    <circle id="circ1" opacity="0" fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" cx="23" cy="38.65" r="2.74"/>
		                    <circle id="circ2" opacity="0" fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" cx="31.5" cy="38.65" r="2.74"/>
		                    <circle id="circ3" opacity="0" fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" cx="40" cy="38.65" r="2.74"/>
	                        </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col l6 center-align banner-part2">
                <p class="intro-text">l'appli la plus cool pour te connecter à tes proches où que tu sois !</p>
                <a class="button_connect" href="connexion.php">connecte-toi maintenant !</a> 
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