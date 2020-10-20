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

		foreach ($channel as $channels){
			$name_chan = $channels["name_channel"];
			$id_chan = $channels["id_channel"];
			//echo '<a href="channel.php?id='.$id_chan.'">' .$name_chan.'</a>';
			};
		
		return $channel;       
	}


// SELECT CHAN + TOUS LES MESSAGES ASSOCIÉS AU CHANNEL // cf admin
public function chat_channel($id_chan, $id_chat)
    {
        $connexion = $this->db->connectDb();
        $q1 = $connexion->prepare("SELECT * FROM canaux INNER JOIN messages ON canaux.id = messages.id ");
        $q1->execute();
		$chat_by_channel = $q1->fetchAll();

		foreach ($chat_by_channel as $chat_by_channels){
			$name_channel = $chat_by_channels['name_channel'];
			$id_channel = $chat_by_channels["id_channel"];
			$id_message = $chat_by_channels["id_messages"];
			$content_message = $chat_by_channels["content"];
			echo '<li><a href="channel.php?id='.$id_channel.'&channel_name='.$name_channel.'/messages">'.$name_channel.'</a></li>';
		}

		return chat_channel;       
	}


// SELECT LES MESSAGES + CHANNEL + L'UTILISATEUR ASSOCIÉ AU MESSAGE 
public function messages($id_chan) // on passe en paramètre l'id du channel
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * 
								  FROM messages as M
								  INNER JOIN canaux as C ON M.id_channel = C.id_channel
								  INNER JOIN utilisateurs as U ON M.id_utilisateur = U.id
								  WHERE M.id_channel = $id_chan order by M.created_in DESC");
        $q->execute();
		$messages = $q->fetchAll();
		
		return $messages;       
	}
}
?>