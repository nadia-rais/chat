<?php session_start();
$page_selected = 'inscription'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>chat - inscription</title>
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
    <script src="js/form_inscription.js"></script>
    
</head>
<body>
<header>
    <?php 
    include("includes/header.php");
   ?>
</header>
<main class="main_form">

    <h1 class="h1_profil">Sign Up</h1>

    <!-- GESTION DES ERREURS -->
    <div id="erreur">
    
        <?php  if (isset($_SESSION['erreur_log'])) {
                    echo htmlspecialchars($_SESSION['erreur_log'])."<br>";
                }
                else if (isset($_SESSION['erreur_mail'])) {
                    echo htmlspecialchars($_SESSION['erreur_mail'])."<br>";
                }
                else if (isset($_SESSION['erreur_pass'])) {
                    echo htmlspecialchars($_SESSION['erreur_pass'])."<br>";
                }
                else if (isset($_SESSION['erreur_format_mail'])) {
                    echo htmlspecialchars($_SESSION['erreur_format_mail'])."<br>";
                }
                else if (isset($_SESSION['erreur_pass_format'])) {
                    echo htmlspecialchars($_SESSION['erreur_pass_format'])."<br>";
                }
                else if (isset($_SESSION['erreur'])) {
                    echo htmlspecialchars($_SESSION['erreur'])."<br>";
                }
        
        ?>

    </div>
    <!-- -->
    <div class="row">            
        <form action="php/formulaire_inscription.php" method="post" class="col s10 center offset-s1">

            <div class="row">
                <div class="input-field col s12">
                    <label for="login">Login :</label>
                    <input type="text" id="login" name="login" class="success" required>
                    <span id="erreur_log" class="col s4"></span>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <label for="mail">Adresse mail :</label>
                    <input type="email" id="mail" name="mail" required >
                    <span id="erreur_mail" class="col s6"></span>
                </div>
                <div class="input-field col s6">
                    <label for="mail2">Confirmer votre adresse mail :</label>
                    <input type="email" id="mail2" name="mail2"  >
                    <span id="erreur_mail_verif" class="col s9"></span>
                </div>
            </div>
            
            <div class="row">   
                <div class="input-field col s6">
                    <label for="password1">Mot de passe :</label>
                    <input type="password" id="password1" name="password" required >
                    <span id="verif_caractere" class="span_inscrip">10 caracteres minimun</span>
                    <span id="verif_chiffre" class="span_inscrip">1 chiffre</span>
                   
                </div>
                <div class="input-field col s6">
                    <label for="password2">Confirmer votre mot de passe :</label>
                    <input type="password" id="password2" name="password2" required >
                    <span class="span_inscrip" id="verif_pass"></span>
                </div>
            </div>

            
            

            <input type="submit" name="valider" id="valider" class=" btn_valider_co">
        
        </form>
    </div>
</main>
<footer>
    <?php
    include("includes/footer.php") ?>
</footer>
</body>
</html>
<?php unset($_SESSION['erreur_log'],$_SESSION['erreur_mail'],$_SESSION['erreur_pass'],$_SESSION['erreur_format_mail'],$_SESSION['erreur_pass_format'],$_SESSION['erreur']) ?>