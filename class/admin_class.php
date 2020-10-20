<?php

class Admin{

public $db;

public function __construct($db)
	{
	$this->db = $db;
	}

// AJOUT CHANNEL
public function add_channel($name_channel)
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("INSERT INTO canaux (name_channel) VALUES (:name_channel)");
        $q->bindParam(':name_channel', $name_channel, PDO::PARAM_STR);
        $q->execute();
    }
    
// RENAME CHANNEL
public function rename_channel($id_channel, $name_channel)
    {
        $connexion = $this->db->connectDb();
        $update_chan = "UPDATE canaux SET name_channel=:name_channel WHERE id_channel = $id_channel ";
        $update_channel= $connexion -> prepare($update_chan);
        $update_channel->bindParam(':name_channel',$name_channel, PDO::PARAM_STR);
        $update_channel->execute();       
    }
    
// STATUS CHANNEL
public function status_channel($id_channel)
    {
        $connexion = $this->db->connectDb();
        $update_stat = "UPDATE canaux SET statut=:status WHERE id_channel = $id_channel ";
        $update_status= $connexion -> prepare($update_stat);
        $update_status->bindParam(':statut',$status, PDO::PARAM_INT);
        $update_status->execute();       
	}


// DELETE CHANNEL
public function delete_channel($id_channel)
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("DELETE FROM canaux WHERE id_channel = $id_channel");
        $q->execute();
		    
    }

// SELECT UTILISATEURS
public function all_users()
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM utilisateurs");
        $q->execute();
		$users = $q->fetchAll();
		
		return $users;       
}
    
// UPDATE USER
public function status_user($id_user,$status)
    {
        $connexion = $this->db->connectDb();
        $update_us = "UPDATE utilisateurs SET droits=:droits WHERE id = $id_user ";
        $update_user= $connexion -> prepare($update_us);
        $update_user->bindParam(':droits',$status, PDO::PARAM_INT);
        $update_user->execute();        
    }


// DELETE USER
public function delete_user($id_user)
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("DELETE FROM utilisateurs WHERE id = $id_user");
        $q->execute();
		           
    }


}
?>

