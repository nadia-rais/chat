<?php

Class Connexion {

    private $user;
    private $password;
    private $name;
    private $host;
    private $bdd;

    public function __construct($host,$user,$name,$password){
        $this->host = $host;
        $this->user = $user;
        $this->name = $name;
        $this->password = $password;
    }

    public function connect() {
        try {
            $this->bdd = new PDO("mysql:host=$this->host;dbname=$this->name", $this->user, $this->password);
            return $this->bdd;
        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
        
        }
    }

   
}

?>