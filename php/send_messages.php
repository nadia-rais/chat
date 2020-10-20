<?php

//print_r($_POST);
extract($_POST);
try
{

$connexion=new PDO("mysql:host=localhost;dbname=chat",'root','');
$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        if(isset($content) && !empty($content) && !empty($id_utilisateur)){

                $q = $connexion->prepare("INSERT INTO messages (id_utilisateur, id_channel, content, created_in) VALUES (:id_utilisateur,:id_channel,:content,NOW())");
                $q->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
                $q->bindParam(':id_channel', $id_channel, PDO::PARAM_INT);
                $q->bindParam(':content', $content, PDO::PARAM_STR);
                
                $q->execute();

                echo "sent";
        

        }else{
                echo "oups...il semblerait que votre message n'ait pas été posté !";   
        }
		 
}

catch (PDOException $e){

        echo "Erreur : " . $e->getMessage();
}
?>
