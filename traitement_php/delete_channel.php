<?php
extract($_POST);
try
{

$connexion=new PDO("mysql:host=localhost;dbname=chat",'root','');
$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    $q = $connexion->prepare("DELETE FROM canaux WHERE id_channel = $id_channel");
    $q->execute();

    echo 'delete';

}

catch (PDOException $e)
        {
        echo "Erreur : " . $e->getMessage();
    }


?>
