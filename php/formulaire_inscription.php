<?php
// session_start();

require '../class/Connexion.php';
require '../class/User.php';

$bdd = new Connexion("localhost","root","chat","");

$user = new User($bdd);


//ENREGISTREMENT BDD
if (isset($_POST['valider'])) {
    
    $login = $_POST['login'];
    $password1 = $_POST['password'];
    $password2 = $_POST['password2'];
    $mail = $_POST['mail'];
    $mail2 = $_POST['mail2'];
    

    $user->inscription($mail,$mail2,$login,$password1,$password2);
}


//VERIFICATION LOGIN AVEC AJAX
if (isset($_POST['pseudo'])) {
    $resultat = $user->getlogin($_POST['pseudo']);

    if ($resultat > 0){
        echo "1";
    }
    else {
        echo "0";
    } 
}


?>