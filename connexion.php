<?php $page_selected = 'connexion';
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<header>
    <?php
    include("includes/header.php");
   ?>
</header>
<main>
    <h1>Connexion</h1>

    <span id="erreur">
        <?php 
            if (isset($_SESSION['erreur_log'])) { echo htmlspecialchars($_SESSION['erreur_log']) ; }
        ?>
    </span>

    <div class="row">            
        <form action="php/formulaire_connexion.php" method="post" class="col s10 center offset-s1">

            <div class="row">
                <div class="input-field col s6 offset-s3">
                    <i class="tiny material-icons prefix left ">account_circle</i>
                    <label for="login"> Login :</label>
                    <input type="text" id="login" name="login" required >
                    <span id="erreur_login" class="col s7"></span>
                </div>
            </div>
            
            <div class="row">   
                <div class="input-field col s6 offset-s3">
                    <i class="tiny material-icons prefix left ">vpn_key</i>
                    <label for="password1">Mot de passe :</label>
                    <input type="password" id="password1" name="password" required >
                    <span id="erreur_password" class="col s7"></span>
                </div>
               
            </div>

            <div class="row">
                <a href="inscription.php" class="col s4 offset-s6">Create account</a>
            </div>
            
            <button class="btn waves-effect waves-light" type="submit" id="valider" name="valider">Submit
                <i class="material-icons right">send</i>
            </button>

           
        
        </form>
    </div>
    
    

      
</main>
<footer>
    <?php
    include("includes/footer.php");
    unset($_SESSION['erreur_log']); ?>
</footer>

<script src="js/form_connexion.js"></script>
</body>
</html>