<?php

try
{

$connexion=new PDO("mysql:host=localhost;dbname=chat",'root','');
$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    if(!empty($_GET['id_messages'])){

        $messages = $connexion->prepare ("SELECT *
                                        FROM messages as M
                                        INNER JOIN canaux as C ON M.id_channel = C.id_channel
                                        INNER JOIN utilisateurs as U ON M.id_utilisateur = U.id
                                        WHERE M.id_channel = '".$_GET['id_channel']."' 
                                        AND M.id_messages > '".$_GET['id_messages']."' 
                                        ORDER BY  M.id_messages DESC
                                        LIMIT 10");
        $messages->execute();
        $message = $messages->fetchAll();

        asort($message);
        $output = '';

            foreach($message as $chat){

            $output .='
            <section class="box-chat">

                <div class="profile_pic_chat">
                    <img class="mini-pic" src="'.$chat['avatar'].'" alt="profile-pic"width="20">
                </div>

                <div class="infos-chat">
                    <p class="name-chat"> '.$chat['login'].'</p>
                    <p class="content" data-id_messages="'.$chat['id_messages'].'"> '.$chat['content'].'</p>
                </div>

                <aside class="date-chat"> le ' .(new DateTime($chat['created_in']))->format('d-m-Y'). ' à ' .(new DateTime($chat['created_in']))->format('H:i:s').'</aside>
         
            </section>';
           
            }


            echo $output;
    
    }
    
   
}

catch (PDOException $e)
        {
        echo "Erreur : " . $e->getMessage();
        }


?>
