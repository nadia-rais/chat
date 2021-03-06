<?php
extract($_POST);
try
{

$connexion=new PDO("mysql:host=localhost;dbname=chat",'root','');
$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    if(isset($name_channel) && !empty($name_channel)){

        $q = $connexion->prepare("INSERT INTO canaux (name_channel) VALUES(:name_channel)");
        $q->bindParam(':name_channel', $name_channel, PDO::PARAM_STR);
        $q->execute();
        $id_channel = $connexion->lastInsertId();
        $content = 'nouveau-channel';
        $content1 = 'bienvenue à toutes et tous';

        // requete après la création du channel pour insérer un message automatique dans le channel et pouvoir lancer le rechargement
        $q2 = $connexion->prepare ("INSERT INTO messages (id_utilisateur, id_channel, content, created_in) VALUES (1,:id_channel,:content,NOW())");
        $q2->bindParam(':id_channel', $id_channel, PDO::PARAM_INT);
        $q2->bindParam(':content', $content, PDO::PARAM_STR);
        $q2->execute();

        $q3 = $connexion->prepare ("INSERT INTO messages (id_utilisateur, id_channel, content, created_in) VALUES (1,:id_channel,:content,NOW())");
        $q3->bindParam(':id_channel', $id_channel, PDO::PARAM_INT);
        $q3->bindParam(':content', $content1, PDO::PARAM_STR);
        $q3->execute();

        echo "<tr id='chan".$id_channel."'>
                <td>".$id_channel."</td>
                <td id='name_channel".$id_channel."'>".$name_channel."</td>
                <td>
                    <form class='rename' action='' method='POST'>
                        <input type='hidden' name='".$id_channel."' id='".$id_channel."' value='".$id_channel."'>
                        <input type='text' id='rename_channel".$id_channel."' name='rename_channel' placeholder='renommer' size='30'>
                        <button type='submit' id='rename_button' name='rename' value='".$id_channel."'></button> 
                    </form>                           
                </td>
                <td>
                    <form class='delete_form' method='post' action =''>
                        <input class='deletebutton' id='".$id_channel."' type='submit' value='".$id_channel."' name='delete1'/>
                    </form>
                </td>  
            </tr>";

    }else{

        echo "il semblerait que votre demande n'ait pu aboutir !";   
    }
}

catch (PDOException $e)
        {
        echo "Erreur : " . $e->getMessage();
        }


?>
