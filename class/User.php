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
                header('location: ../connexion.php');
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


    function User_connexion($password,$login){
        $requete = $this->connect->prepare('SELECT * FROM `utilisateurs` WHERE login =  ?');
        $requete->execute([$login]);
        $resultat = $requete->fetchall();

       
        
        if (count($resultat) == 0){
            $_SESSION['erreur_log'] = "Le mot de passe ou login ne semble pas correct";
            header('location: ../connexion.php');
            
           
        }
        elseif (password_verify( $password , $resultat[0]['password'] ) == false) {
            $_SESSION['erreur_log'] = "Le mot de passe ou login ne semble pas correct";
            header('location: ../connexion.php');
            
            
        }
        else {
           
            $_SESSION['user']['id_user'] = $resultat[0]['id'];
            $_SESSION['user']['login'] = $resultat[0]['login'];
            $_SESSION['user']['mail'] = $resultat[0]['email'];
            $_SESSION['user']['droits'] = $resultat[0]['droits'];

            header('location: ../chat.php');
           

        }
    }

    function recuperationUser($login,$pass){
        $requete = $this->connect->prepare('SELECT * FROM `utilisateurs` WHERE login =  ?');
        $requete->execute([$login]);
        $resultat = $requete->fetchall();
        $nbr = count($resultat);
       
        if( $nbr == 0){
            echo "false";
        }
        elseif(password_verify($pass,$resultat[0]['password']) == false){
            echo "false";
        }
        else {
            
            echo "true";
            $_SESSION['user']['id_user'] = $resultat[0]['id'];
            $_SESSION['user']['login'] = $resultat[0]['login'];
            $_SESSION['user']['mail'] = $resultat[0]['email'];
            $_SESSION['user']['droits'] = $resultat[0]['droits'];
        }
  
    }

    function getUser($id_user){
        $requete = $this->connect->prepare('SELECT * FROM utilisateurs WHERE id = ?');
        $requete->execute([$id_user]);
        $resultat = $requete->fetchall();
        return $resultat;
    }

    function updateUser($id,$login,$session_log,$mail,$session_mail,$ancien_pass,$password,$password2){

        if ( isset($login) &&  $login != $session_log){
          
          //verification du login

          if ($this->getlogin($login) != 0 ){
               $_SESSION['erreur_log'] = "Login déjà pris !"; 
               $erreur =  "Login déjà pris !"; 
               return json_encode(["erreur" => $erreur ]);
           }
           else {
               $requete_log = $this->connect->prepare('UPDATE `utilisateurs` SET `login`=? WHERE id = ?');
               $requete_log->execute([$login,$id]);
               $_SESSION['user']['login'] = $login;
               header('location: ../profil.php');
               return true;
               
               //mettre un succes
           }

           
        }
       

        if (isset($mail) && $mail != $session_mail ){
            if (filter_var($mail, FILTER_VALIDATE_EMAIL) ) {
                $requete_mail = $this->connect->prepare("UPDATE `utilisateurs` SET `email`=? WHERE id = ?");
                $requete_mail->execute([$mail,$id]);
                $_SESSION['user']['mail'] = $mail;
                //mettre un success
                header('location: ../profil.php');
                return true;
            }
            else {
                $_SESSION['erreur_mail'] = "Le format du mail n'est pas valide";
                $erreur = "Le format du mail n'est pas valide";
                return json_encode(["erreur" => $erreur ]);
            }
        }


       if (!empty($ancien_pass) ) {
            $user = $this->getUser($id);
        
            $pass_hash = password_hash ( $_POST['ancien_pass'] , PASSWORD_DEFAULT  );
        

            if (password_verify ( $_POST['ancien_pass'], $user[0]['password'] ) ){
            

                if (!empty($password) || !empty($password2)){
                 
                         if ($password == $password2){
                            $new_pass = password_hash ( $password , PASSWORD_DEFAULT ) ;
                            $requete_mail = $this->connect->prepare("UPDATE `utilisateurs` SET `password`=? WHERE id = ?");
                            $requete_mail->execute([$new_pass,$id]);
                            $success = "ok";
                            return json_encode(["success" => $success]);
                        
                
                        }
                        else {
                            $_SESSION['erreur_pass'] = "Les mots de passe ne correspondent pas";
                            $erreur = "Les mots de passe ne correspondent pas";
                            return json_encode(["erreur2" => $erreur]);
                        }
                   
                }
                else {
                    $_SESSION['erreur_pass'] = "Tout les champs doivent etre remplis";
                    $vide = "Tout les champs doivent etre remplis";
                    return json_encode(["vide" => $vide]);
                    
                }
        }
        else {
            $_SESSION['erreur_pass'] = "Ancien mot de passe incorrect";
            $erreur = "Ancien mot de passe invalide";
            return json_encode(["erreur1" =>$erreur]);
        }

        header('location: ../profil.php');
        
    
    
    
    }

   
}
function DeleteUser($id_user){
    $requete = $this->connect->prepare("DELETE FROM `utilisateurs` WHERE id = ?");
    $requete->execute([$id_user]);
    unset($_SESSION['user']);
    destroy($_SESSION['user']);
    header('location: index.php');


}

function disconnect(){
    unset($_SESSION['user']);
    session_destroy($_SESSION['user']);
}

}
?>