<?php session_start();





    require '../class/Connexion.php';
    require '../class/User.php';

    $bdd = new Connexion("localhost","root","chat","");
    $user = new User($bdd);
    $id = $_SESSION['user']['id_user'];
    $session_log = $_SESSION['user']['login'];
    $session_mail = $_SESSION['user']['mail'];

    // $login = $_POST['login'];
    // $mail = $_POST['mail'];
    // $ancien_pass = $_POST['ancien_pass'];
    // $password = $_POST['password'];
    // $password2 = $_POST['password2'];

    if (isset($_POST['valider'])  ){

        $login = $_POST['login'];
        $mail = $_POST['mail'];
        $ancien_pass = '';
        $password = '';
        $password2 = '';
     

        $user->updateUser($id,$login,$session_log,$mail,$session_mail,$ancien_pass,$password,$password2);
     
        
    }
    if (isset($_POST['valider1'])){

        $login = NULL;
        $mail = NULL;
        $ancien_pass = $_POST['ancien_pass'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        

        $toto = $user->updateUser($id,$login,$session_log,$mail,$session_mail,$ancien_pass,$password,$password2);
        echo $toto;
        
        
    }
    // else {
    //     echo 'no';
    // }

    
    if (isset($_POST['ajax_login'])){

        if ($_SESSION['user']['login'] != $_POST['ajax_login']) {

            if ( isset($_POST['ajax_login']) ) {
    
                 $resultat = $user->getlogin($_POST['ajax_login']);
        
                if ($resultat == 1){
                    echo "false";
                }
                else {
                    echo "true";
                }
            }
            
        }
    }

    if (isset($_POST['reponse'])){
        if ($_POST['reponse'] == true ){
            $reponse = $user->DeleteUser($_SESSION['user']['id_user']);
           
        }
    }


    
   
    





?>