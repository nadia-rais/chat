<?php
session_start();

require "../class/Connexion.php";
require "../class/User.php";

$bdd = new Connexion("localhost","root","chat","");
$user = new User($bdd);

$user->disconnect();
header('location: ../index.php');


?>