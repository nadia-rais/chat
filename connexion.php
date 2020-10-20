<?php session_start();

$page_selected = 'connexion';

if (isset($_SESSION['user'])) {
    header('location: profil.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>chat - connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="#">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/style-forms.css">
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
<main class="main_form">
    <h1 class="h1_profil">Connexion</h1>

    
    
    <?php if (isset($_SESSION['erreur_log'])) :?>
        <span id="erreur" class="erreur2">
            <?= htmlspecialchars($_SESSION['erreur_log']) ?>
        </span>
    <?php elseif (isset($_SESSION['erreur_co'])) :?>
        <span id="erreur" class="erreur2">
            <?= htmlspecialchars($_SESSION['erreur_co']) ?>
        </span>
    <?php else :?>
        <span id="erreur"></span>
    <?php endif ;?>


    <div class="row">            
        <form action="php/formulaire_connexion.php" method="post" class="col s10 center offset-s1">

            <div class="row">
                <div class="input-field col l6 m6 s10 offset-m3 offset-l3">
                    <i class="tiny material-icons prefix left  blue-text">account_circle</i>
                    <label for="login"> Login :</label>
                    <input type="text" id="login" name="login" required >
                    <span id="erreur_login" class="col s7"></span>
                </div>
            </div>
            
            <div class="row">   
                <div class="input-field col l6 m6 s10 offset-m3 offset-l3 ">
                    <i class="tiny material-icons prefix left blue-text">vpn_key</i>
                    <label for="password1">Mot de passe :</label>
                    <input type="password" id="password1" name="password" required >
                    <span id="erreur_password" class="col s7"></span>
                </div>
               
            </div>

            <div class="row">
                <a href="inscription.php" class="col s4 offset-s6">Create account</a>
            </div>
            
            <button class=" btn_valider_co" type="submit" id="valider" name="valider">Submit
                <i class="material-icons right ">send</i>
            </button>

           
        
        </form>
    </div>
    
    

      
</main>
<footer>
    <?php
    include("includes/footer.php");
    unset($_SESSION['erreur_log'],$_SESSION['erreur_co']); ?>
</footer>

<script src="js/form_connexion.js"></script>
</body>
</html>