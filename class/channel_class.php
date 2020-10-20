<?php

class Channel{

public $db;

public function __construct($db)
	{
	$this->db = $db;
	}

// test méthode pour récupérer la liste des channel cf admin
public function channel()
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM canaux");
        $q->execute();
		$channel = $q->fetchAll();
		
		return $channel;       
	}

// méthode pour récupérer les infos du channel en fonction de l'id de la page
public function channel_infos($id_channel)
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM canaux WHERE canaux.id_channel = $id_channel");
        $q->execute();
		$channel_infos = $q->fetch();
		
		return $channel_infos;       
	}


// SELECT CHAN + TOUS LES MESSAGES ASSOCIÉS AU CHANNEL // cf admin
public function chat_channel($id_chan, $id_chat)
    {
        $connexion = $this->db->connectDb();
        $q1 = $connexion->prepare("SELECT * FROM canaux INNER JOIN messages ON canaux.id_channel = messages.id_channel ");
        $q1->execute();
		$chat_by_channel = $q1->fetchAll();

		// pour afficher dans le html
		/*foreach ($chat_by_channel as $chat_by_channels){
			$name_channel = $chat_by_channels['name_channel'];
			$id_channel = $chat_by_channels["id_channel"];
			$id_message = $chat_by_channels["id_messages"];
			$content_message = $chat_by_channels["content"];
			echo '<li><a href="channel.php?id='.$id_channel.'&channel_name='.$name_channel.'/messages">'.$name_channel.'</a></li>';
		}*/

		return $chat_channel;       
	}


// SELECT LES MESSAGES + CHANNEL + L'UTILISATEUR ASSOCIÉ AU MESSAGE 
public function messages($id_chan) // on passe en paramètre l'id du channel
    {
        $connexion = $this->db->connectDb();
        $q2 = $connexion->prepare("SELECT * 
								  FROM messages as M
								  INNER JOIN canaux as C ON M.id_channel = C.id_channel
								  INNER JOIN utilisateurs as U ON M.id_utilisateur = U.id
								  WHERE M.id_channel = $id_chan 
								  order by M.id_messages DESC LIMIT 10");
        $q2->execute();
		$messages = $q2->fetchAll();

		return $messages;       
	}




}
?>


