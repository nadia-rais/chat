<?php 

    require 'class/db.php';
    require 'class/channel_class.php';
   

    // session_start();
    $db = new DB();
    $channel = new Channel($db);

    if ($page_selected = 'admin'){
        require 'class/admin_class.php';
        $admin = new Admin($db);
    }

    $title_channel = $channel->channel();


?>

    <ul id="dropdown1" class="dropdown-content">
    <?php foreach ($title_channel as $channels){ ?>
        <li><a href="channel.php?id=<?= $channels['id_channel'] ?>"># <?= $channels['name_channel'] ?></a></li>
        <li class="divider"></li>
    <?php }; ?>
    </ul>
    <nav class="transparent z-depth-0">
        <div class="nav-wrapper lighten-5 ">
            <img src="img/chat-logo1.png" alt="logo-sayhi" width="60px" height="60px" style="margin-top:10px; margin-left:10px; margin-right:10px">
            <a href="index.php" class="brand-logo white-text">say Hi !</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons icon-black">menu</i></a>
            <ul class="right hide-on-med-and-down">
            <?php
                if(empty($_SESSION['user'])){
            ?>
                <li><a href="connexion.php"><i class="material-icons right">account_circle</i></a></li>
                <li><a href="inscription.php" class="waves-effect waves-red btn black">SIGN UP</a></li>
            <?php } ?>
            <?php
                if(isset ($_SESSION['user']) && ($_SESSION['user']['droits'] == 1)){ ?>
                <li><a href="admin.php"><ion-icon name="construct-outline"></ion-icon></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Channels<i class="material-icons right"></i></a></li>
                <li><a href="php/deconnexion.php">Déconnexion</a>
                </li>
            <?php
                }else if (isset($_SESSION['user']) && ($_SESSION['user']['droits'] != 1)){
            ?>
                <li><a href="profil.php">bonjour @ <?= $_SESSION['user']['login'] ?></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Channels<i class="material-icons right"></i></a></li>
                <li><a href="php/deconnexion.php">Déconnexion</a>
                </li>
            </ul>
            <?php } ?>
        </div>
    </nav>

     <!-- RESPONSIVE BURGER -->
    <ul class="sidenav" id="mobile-demo">
    <?php
        if(empty($_SESSION['user'])){
    ?>
        <li><a href="connexion.php"><i class="material-icons right">account_circle</i></a></li>
        <li><a href="inscription.php" class="waves-effect waves-red btn black">SIGN UP</a></li>
    <?php } ?>
    <?php
        if(isset ($_SESSION['user']) && ($_SESSION['user']['droits'] == 1)){ 
    ?>
        <li><a href="admin.php"><ion-icon name="construct-outline"></ion-icon></a></li>
        <?php foreach ($title_channel as $channels){ ?>
        <li><a href="channel.php?id=<?= $channels['id_channel'] ?>"># <?= $channels['name_channel'] ?></a></li>
        <li class="divider"></li>
        <?php }; ?>
        <li><a href="php/deconnexion.php">Déconnexion</a></li>
    <?php
        }else if (isset($_SESSION['user']) && ($_SESSION['user']['droits'] != 1)){
    ?>
        <li><a href="profil.php"></a>profil</li>
        <?php foreach ($title_channel as $channels){ ?>
        <li><a href="channel.php?id=<?= $channels['id_channel'] ?>"># <?= $channels['name_channel'] ?></a></li>
        <li class="divider"></li>
        <?php }; ?>
        <li><a href="php/deconnexion.php">Déconnexion</a></li>
            
    <?php }; ?>
    </ul>  



