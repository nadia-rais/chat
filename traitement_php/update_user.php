<?php
extract($_POST);
try
{

$connexion=new PDO("mysql:host=localhost;dbname=chat",'root','');
$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    if(!empty($id) && !empty($droits)){

        $update_us = "UPDATE utilisateurs SET droits=:droits WHERE id=:id ";
        $update_user= $connexion -> prepare($update_us);
        $update_user->bindParam(':id',$id, PDO::PARAM_INT);
        $update_user->bindParam(':droits',$droits, PDO::PARAM_INT);
        $update_user->execute(); 

        echo $droits;

    }else{
        "votre demande n'a pu aboutir";
    }
    
    
}

catch (PDOException $e)
        {
        echo "Erreur : " . $e->getMessage();
        }


?>
