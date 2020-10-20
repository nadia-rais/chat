<?php

try
{

$connexion=new PDO("mysql:host=localhost;dbname=chat",'root','');
$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    
    $messages = $connexion->prepare("SELECT *
						            FROM messages as M
						            INNER JOIN canaux as C ON M.id_channel = C.id_channel
						            INNER JOIN utilisateurs as U ON M.id_utilisateur = U.id
						            WHERE M.id_channel = '".$_GET['id_channel']."' 
                                    ORDER BY  M.id_messages DESC LIMIT 1
                                    LIMIT 5");
    $messages->execute();
    $message = $messages->fetchAll();
 
    asort($message);
    $output = '';
    foreach($message as $chat){

    $output .='
            <p> '.$chat['id_messages'].'</p>
            <p data-id_messages="'.$chat['id_messages'].'"> '.$chat['content'].'</p>';
        //var_dump($chat);
    }
    
    if(empty($chat['content'])){
        echo '<section id="chat">
                <p>aucun message présent dans ce channel</p>
              </section>';
    }else{
        $output .='';
    }

    echo $output;
}

catch (PDOException $e)
        {
        echo "Erreur : " . $e->getMessage();
        }


?>
