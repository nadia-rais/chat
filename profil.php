<?php  require 'php/traitement_profil.php';?>

<!DOCTYPE html>
<html>
<head>
<title>chat - profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="#">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style-forms.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/fontello/css/fontello.css">
</head>
<body>
<header>
    <?php
    include("includes/header.php");
   ?>
</header>
<main class="main_form">
        <h1 class="h1_profil">My account</h1>
        
        <section class="section_profil">
            <img src="img/default_profile.png" alt="image profil">
            <div>
                <p class="profil_p"><span class="span_p">Login :</span> <?= $infos_user[0]['login'] ?></p>
                <p class="profil_p"><span class="span_p">Mail :</span> <?= $infos_user[0]['email'] ?></p>
                <hr class="hr_profil">
                <button class="btn_profil" id="modification_infos">Modifier Mes informations</button>
                <button class="btn_profil" id="modification_pass">Modifier mon mot de passe</button>
                <button class="btn_profil" id="supprimer_compte">Supprimer mon compte</button>
            </div>
        </section>
        <div class="row">
            <p id="erreur">
             
            </p>
        </div>
        <div class="row">            
        <form action="php/formulaire_profil.php" method="post" class="col s10 center offset-s1">
            <section class=" profil_infos">
                <div class="row " >
                    <div class="input-field  col l6 m10 s10 offset-m2 offset-l3">
                        <label for="login">Login :</label>
                        <input type="text" id="login" name="login" class="success" value=<?= $infos_user[0]['login'] ?> >
                        <span id="erreur_log" class="col s6"></span>
                    </div>
                </div>

                <div class="row ">
                    <div class="input-field  col l6 m10 s10 offset-m2 offset-l3">
                        <label for="mail">Adresse mail :</label>
                        <input type="email" id="mail" name="mail" value="<?= $infos_user[0]['email']?>" >
                        <span id="erreur_mail" class="col s6"></span>
                    </div>
                
                </div>
                <div class="row">
                    <input type="submit" name="valider" id="valider" class="btn_valider" >
                </div>
            </section>
            
        </form> 
        <form action="php/formulaire_profil.php" method="post" class="col s10 center offset-s1">  
            <div id ="profil_password" class="profil_password">  
                <div class="row">
                    <div class="input-field  col l6 m6 s10 offset-m3 offset-l3">
                        <label for="ancien_pass">Ancien mot de passe :</label>
                        <input type="password" id="ancien_pass" name="ancien_pass"  >
                        <span id="span_pass"></span>
                    </div>
                </div> 
                <div class="row">
                    <div class="input-field row col l6 m6 s10 offset-m3 offset-l3">
                        <label for="password1">Nouveau mot de passe :</label>
                        <input type="password" id="password1" name="password"  >
                        <span id="verif_caractere" class="span_inscrip">10 caracteres minimun</span>
                        <span id="verif_chiffre" class="span_inscrip">1 chiffre</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col col l6 m6 s10 offset-m3 offset-l3">
                        <label for="password2">Confirmer votre mot de passe :</label>
                        <input type="password" id="password2" name="password2"  >
                        <span  class="col s7" id="verif_pass"></span>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="valider1" id="valider2" class="btn_valider" >
                    <button id="btn_annuler"><i class="icon-cancel-outline"></i> </button>
                    
                </div>
            </div>

            
            
           
            
        
        </form>
    </div>
</main>
<footer>
    <?php
    include("includes/footer.php") ?>
</footer>

<?php unset($_SESSION['erreur_log'],$_SESSION['erreur_mail'],$_SESSION['erreur_pass'])?>
<script src="js/form_profil.js"></script>
</body>
</html>