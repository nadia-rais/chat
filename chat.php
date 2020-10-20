<?php $page_selected = 'chat'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>chat - chat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="#">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-chat.css">
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
    session_start();
    include("includes/header.php");
    $title_channel = $channel->channel();
    
    //var_dump($title_channel);
   ?>
   <nav>
        <div class="nav-wrapper chan-nav">
            <p class="brand-logo center chat-logo">BIENVENUE @ <?= $_SESSION['user']['login']; ?></p>
        </div>
    </nav>
</header>
<main data-id_page="<?= $id_page;?>" id="main-channel">
    <?php if(isset ($_SESSION['user'])){ ?>
    <div class="row row-chat">
        <!-- Lateral nav pour afficher les infos de l'utilisateur connecté + la liste des channels -->
        <div class="col l3 s12 profile-side">
            <ul>
                <li>
                    <div class="user-view">
                        <div class="background center user-pic">
                            <a href="#user_picture"><img class="circle" src="img/default_profile.png" width="70"></a>
                        </div>

                        <a href="login" class="center-align"><span class="white-text email"> vous êtes connecté @ <?= $_SESSION['user']['login']?></span></a></br>
                        <a href="profil.php">consulter mon profil</a>
                        
                    </div>
                </li>
                
                <li id="title-category"> # CHANNELS</li>
                <li><div class="divider"></div></li>
                <div class="collection">
                    <?php foreach ($title_channel as $channels){ ?>
                        <a class="collection-item transparent" href="channel.php?id=<?= $channels['id_channel'] ?>"># <?= $channels['name_channel'] ?></a>
                    <?php }; ?>
                </div>
                <li><div class="divider"></div></li>
            </ul>
        </div>

        <div class="col l9 s12">
            <!-- AFFICHAGE DES MESSAGES + FORM POUR POSTER  -->
            <section id="messages-chat">
                <h1 id="title-chat">rejoins un channel et discute avec tes proches dès maintenant ...</h1>
            </section>
        </div>
    </div>
    <?php } else {?>
        <div class="container">
            <div class="row">
                <p class="center-align white-text" >connectez vous pour accèder à cette cette page </p>
            </div>
        </div>
    <?php }; ?>
</main>
<footer>
    <?php
    include("includes/footer.php") ?>
</footer>
</body>
</html>