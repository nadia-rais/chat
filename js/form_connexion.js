////////////////////////////////
// Fonctions
///////////////////////////////

function OnBlurLogin(){
    
    var valeur_login = login.value;

    if (valeur_login == ""){
        erreur_log.textContent = "Ce champs ne peut pas etre vide";
        erreur_log.classList.add('erreur');
        login.classList.add('erreur_input');
        b_login = false;
    }
    else {
        erreur_log.textContent = "";
        erreur_log.classList.remove('erreur');
        login.classList.remove('erreur_input');
        b_login = true;
    }
}

function OnBlurPassword(){

    var valeur_password = password.value;

    if (valeur_password == ""){
        erreur_password.textContent = "Ce champs ne peut pas etre vide";
        erreur_password.classList.add('erreur');
        password.classList.add('erreur_input');
        b_password = false;
    }
    else {
        erreur_password.textContent = "";
        erreur_password.classList.remove('erreur');
        password.classList.remove('erreur_input');
        b_password = true;
    }
}

function OnclickBtn(e){
    e.preventDefault();
    var motdepasse = password.value;
    var pseudo = login.value;
    
    if (motdepasse != "" && pseudo != "") {
     
        $.ajax({
            url: 'php/formulaire_connexion.php',
            type: 'post',
            data: {pseudo: pseudo , motdepasse: motdepasse},

            success: function(data){
                
                if (data === "false"){
                   login.classList.add('erreur_input');
                   password.classList.add('erreur_input');
                   erreur.textContent = "Le login et/ou le mot incorrect";
                   erreur.classList.add('erreur2');
                }
                else {
                    window.location.href = 'chat.php'; 
                }
            }
        })
    }
     
}


////////////////////////////////
// Variables
///////////////////////////////
var login = document.getElementById('login');
var erreur_log = document.getElementById('erreur_login');
var password = document.getElementById('password1');
var erreur_password = document.getElementById('erreur_password');
var btn = document.getElementById('valider');
var erreur = document.getElementById('erreur');

//initialisation variables boolean
var b_login = false; 
var b_password = false;

////////////////////////////////
// Code générale
///////////////////////////////
login.addEventListener("blur",OnBlurLogin);
password.addEventListener("blur", OnBlurPassword);
btn.addEventListener("click", OnclickBtn);