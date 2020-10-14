<?php 
// si formulaire vide faire une erreur

Class User {

    private $bdd;
    private $connect;

    public function __construct($bdd){
        $this->bdd = $bdd;
        $this->connect = $this->bdd->connect();
    }

    public function getlogin($login){
        $requete = $this->connect->prepare("SELECT * FROM `utilisateurs` WHERE login = ?");
        $requete->execute([$login]);
        return count($requete->fetchAll());
    
    }

    public function inscription($mail,$mail2,$login,$password1,$password2){
        if (!empty($login) && !empty($mail) && !empty($mail2) && !empty($password1) && !empty($password2)) {

          
            $this->getlogin($login);

            if ($this->getlogin($login) != 0 ){
                $_SESSION['erreur_log'] = "Login déjà pris !";  
            }
            //verification du format mail
            else if (filter_var($mail, FILTER_VALIDATE_EMAIL) == false) {
                $_SESSION['erreur_format_mail'] = "Adresse mail invalide";
            }
            elseif ($mail != $mail2 ) {
                $_SESSION['erreur_mail'] = "Les adresses mail ne correspondent pas !";
            }
           
            elseif ($password1 != $password2) {
                $_SESSION['erreur_pass'] = "Les mots de passe semblent different";
            }
            else {
                $nouveau_password = password_hash($password1,PASSWORD_DEFAULT);
                $requete = $this->connect->prepare("INSERT INTO `utilisateurs`( `login`, `password`, `email`) VALUES (?,?,?)");
                $requete->execute([$login,$nouveau_password,$mail]);
                header('location: connexion.php');
            }

            //si une erreur est rencontrée , on redirectionne avec le message en session
            if (isset($_SESSION['erreur_log']) || isset($_SESSION['erreur_mail']) || isset($_SESSION['erreur_pass']) || isset($_SESSION['erreur_format_mail']) || $_SESSION['erreur_pass_format']) {
                header('location: ../inscription.php');
            }
            
        }
        else {
            $_SESSION['erreur'] = "Les champs ne peuvent etre vide";
            header('location: ../inscription.php');
            
        }
    }
}


?>