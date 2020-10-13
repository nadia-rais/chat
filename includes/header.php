<?php //if (isset($_POST["deco"])) {
    //$user->disconnect();
    //}
?>
<header>
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
                <li><a class="waves-effect waves-red btn black">SIGN UP</a></li>
            <?php } ?>
            <?php
                if(isset ($_SESSION['user']) && ($_SESSION['user']['droits'] == 1)){ ?>
                <li><a href="admin.php"><ion-icon name="construct-outline"></ion-icon></a></li>
                <li><form action="index.php" method="post">
                    <input id="dropdown-deco" name="deco" value="DECONNEXION" type="submit"/>
                    </form>
                </li>
            <?php
                }else if (isset($_SESSION['user']) && ($_SESSION['user']['droits'] == 0)){
            ?>
                <li>bonjour @ <?= $_SESSION['user']['login'] ?></li>
                <li><form action="index.php" method="post">
                    <input id="dropdown-deco" name="deco" value="DECONNEXION" type="submit"/>
                    </form>
                </li>
            </ul>
            <?php } ?>
        </div>
    </nav>

     <!-- RESPONSIVE BURGER -->
    <ul class="sidenav" id="mobile-demo">
        <li><a href="connexion.php">connexion</li>
        <li><a href="inscription.php">sign up</i></a></li>
    </ul>
</header>

