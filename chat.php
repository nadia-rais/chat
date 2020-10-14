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
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
<header>
    <?php
    include("includes/header.php");
    $title_channel = $channel->channel();
    //var_dump($title_channel);
    $list_messages = $channel->messages(1);
    //var_dump($list_messages);
   ?>
</header>
<main>
    <!-- Page Layout here -->
    <div class="row">
        <!-- Lateral nav pour afficher les infos de l'utilisateur connecté + la liste des channels -->
        <div class="col s3 teal lighten-2">
            <ul>
                <li>
                    <div class="user-view">
                        <div class="background center">
                            <a href="#user_picture"><img class="circle" src="img/default_profile.png" width="70"></a>
                        </div>
                        <a href="#user_name"><span class="white-text name">John Doe</span></a>
                        <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                    </div>
                </li>
                <li><a href="#!"><i class="material-icons">cloud</i>CHANNELS</a></li>
                <?php  var_dump($title_channel); ?>
                <li><a href="#!">Second Link</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Subheader</a></li>
                <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
            </ul>
        </div>

        <div class="col s9">
            <!-- AFFICHAGE DES MESSAGES + FORM POUR POSTER  -->
            <form id="chat" action="traitement_php/message.php" method="POST">
                <input type="text" name="message" placeholder="say-hi!" size="144" required>
                <button type="submit"><i class="material-icons right">near_me</i></button>
            </form>
        </div>

    </div>
</main>
<footer>
    <?php
    include("includes/footer.php") ?>
</footer>
</body>
</html>