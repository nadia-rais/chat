<?php
session_start();
require 'class/Connexion.php';
require 'class/User.php';

$page_selected = 'profil';
$bdd = new Connexion ("localhost","root","chat","");
$user = new User($bdd);

if (!isset($_SESSION['user'])) {
    $_SESSION['erreur_co'] = "Vous devez etre connecté pour acceder à cette page";
    header('location: connexion.php');
}

$id_user = $_SESSION['user']['id_user'];


$infos_user = $user->getUser($id_user);








?>