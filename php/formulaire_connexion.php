<?php
session_start();
require "../class/Connexion.php";
require "../class/User.php";
$bdd = new Connexion("localhost","root","chat","");
$user = new User($bdd);

if (isset($_POST['valider'])) {
    
    if (!empty($_POST['login']) && !empty($_POST['password'])){

        

        $login = $_POST['login'];
        $password = $_POST['password']; 

        $user->User_connexion($password,$login);
    }
    
   
}

$user->recuperationUser($_POST['pseudo'],$_POST['motdepasse']) ;



?>