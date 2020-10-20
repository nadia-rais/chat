<?php
extract($_POST);
try
{

$connexion=new PDO("mysql:host=localhost;dbname=chat",'root','');
$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    if(!empty($id_channel) && !empty($name_channel)){

        $update_chan = "UPDATE canaux SET name_channel=:name_channel WHERE id_channel=:id_channel ";
        $update_channel= $connexion -> prepare($update_chan);
        $update_channel->bindParam(':id_channel',$id_channel, PDO::PARAM_INT);
        $update_channel->bindParam(':name_channel',$name_channel, PDO::PARAM_STR);
        $update_channel->execute(); 

        echo $name_channel;

    }else{
        "votre demande n'a pu aboutir";
    }
    
    
}

catch (PDOException $e)
        {
        echo "Erreur : " . $e->getMessage();
        }


?>
