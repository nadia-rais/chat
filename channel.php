<?php $page_selected = 'channel'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>chat - channel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="#">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-chat.css">
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
    $id_page = $_GET['id'];
    $last_mess = $channel->messages($id_page); // methode de la class channel pour récup tous les messages + channel + infos users 
    $chan_infos = $channel->channel_infos($id_page); // methode de la class channel pour récup tous les channel + messages associés
   ?>
    <nav>
        <div class="nav-wrapper chan-nav">
            <p class="brand-logo center">#<?=  $chan_infos['name_channel']; ?></p>
        </div>
    </nav>
</header>
<main data-id_page="<?= $id_page;?>" id="main-channel">
    <div class="row">
        <!-- Lateral nav pour afficher les infos de l'utilisateur connecté + la liste des channels -->
        <div class="col s3 profile-side">
            <ul>
                <li>
                    <div class="user-view">
                        <div class="background center user-pic">
                            <a href="#user_picture"><img class="circle" src="img/default_profile.png" width="70"></a>
                        </div>

                        <a href="login"><span class="white-text email"> vous êtes connecté @ <?= $_SESSION['user']['login']?></span></a></br>
                        <a href="profil.php">consulter mon profil</a>
                        
                    </div>
                </li>
                <li><div class="divider"></div></li>
                <li id="title-category"> # CHANNELS</li>
                <div class="collection">
                    <?php foreach ($title_channel as $channels){ ?>
                        <a class="collection-item transparent" href="channel.php?id=<?= $channels['id_channel'] ?>"># <?= $channels['name_channel'] ?></a>
                    <?php }; ?>
                </div>
                <li><div class="divider"></div></li>
                <li id="disconnect-channel">
                    <form action="index.php" method="post">
                        <input class="btn waves-effect waves-light black" name="deco" value="SE DECONNECTER" type="submit"/>
                    </form>
                </li>
            </ul>
        </div>

        <div class="col s9">
            <!-- AFFICHAGE DES MESSAGES + FORM POUR POSTER  -->
            <section id="messages">
                <?php //var_dump($last_mess); ?>
                <?php foreach ($last_mess as $mess){ ?>
                    <p class="text-messages" data-id_messages="<?= $mess['id_messages'] ?>"> <?= $mess['content'] ?></p>
                <?php } ?>
            </section>
            
            <p class="last_com"></p>
            <section class="user-input">
                <form id="chat" action="" method="POST">
                    <input type="hidden" name="id_page" id="id_page" value="<?= $id_page ?>">
                    <input type="text" name="content" id="content" placeholder="say-hi to your friends!" size="144" required>
                    <button id="send" type="submit" data-id_page="<?= $_GET['id'];?>" name="send"><i class="material-icons right button_send">near_me</i></button>
                </form> 
            </section>
            <p class="error" style="color:red"></p>
        </div>
    </div>
</main>
<script type="text/javascript" src="js/chat.js"></script>
<footer>
    <?php
    include("includes/footer.php") ?>
</footer>
</body>
</html>