
/*----------------------------------------------------*/
/* MATERIALIZE
------------------------------------------------------ */
$(document).ready(function() {
    M.updateTextFields();

/*----------------------------------------------------*/
/* VERIFICATION DU FORMULAIRE
------------------------------------------------------ */

/*----------------------------------------------------*/
/* //FUNCTIONS
------------------------------------------------------ */
function gestion_style_erreur(variable1,variable2,texte){
    variable1.textContent=texte; 
    variable1.classList.add('erreur'); 
    variable2.classList.remove('success'); 
    variable2.classList.add('erreur_input');
}
function function_verification_password(variable1,variable2,texte){
    variable1.textContent = texte;
    variable1.classList.add('erreur');
    variable2.classList.add('erreur_input')
}
function gestion_erreur_password(variable1,variable2){
    variable1.classList.add('erreur'); 
    variable1.classList.remove('success_verif'); 
    variable2.classList.add('erreur_input') 
}
function gestion_success_password(variable1,variable2){
    variable1.classList.add('success_verif'); 
    variable1.classList.remove('erreur');
    variable2.classList.remove('erreur_input')
}
function success(variable1,variable2,texte){
    variable1.textContent=texte; 
    variable1.classList.remove('erreur');  
    variable2.classList.remove('erreur_input'); 
}
function gestion_erreur_mail(variable1,variable2,variable3,texte,class1,class2){
    variable1.classList.add(class1); 
    variable2.classList.add(class2); 
    variable3.textContent = texte; 
}


function OnBlurInputLogin(){

    var pseudo = login.value;
    if (pseudo != "")
    {

        $.ajax({
            url : 'php/formulaire_inscription.php',
            type : 'post',
            data : { pseudo: pseudo },
            
            success : function(data){

                if (data === "1") {
                    gestion_style_erreur(erreur_log,login,"Ce login existe déjà");
                    b_login = false;
                }
                else {
                    success(erreur_log,login,"")
                    login.classList.add('success'); 
                    b_login = true;
                    
                }
            }
        });
    }
    else {
        gestion_style_erreur(erreur_log,login,"Ce champ ne peut etre vide");
        b_login = false;
    }
    
}

function OnBlurVerification(){    
    //recuperation de la valeur de input
    var valeur_input_mail = mail.value; 
    if (valeur_input_mail != '') { 

    
        if (expressionReguliere.test(valeur_input_mail) == false){ 
            gestion_style_erreur(erreur_mail,mail,"L'adresse ne semble pas valide !")
            b_mail = false;
        }
        else {
            success(erreur_mail,mail,"")
            b_mail = true;
        }

    }else {
        gestion_style_erreur(erreur_mail,mail,"Ce champ ne peut pas etre vide")
        b_mail = false;
    }

    if (b_mail == true && b_mail2 == true) {
        console.log(valeur_input_mail)
        console.log(mail_verif.value)
        if (valeur_input_mail != mail_verif.value) {
           erreur_mail_verif.textContent = "Les adresses mail ne correspondent pas";
           erreur_mail_verif.classList.add('erreur');
           mail.classList.add('erreur_input');
           mail_verif.classList.add('erreur_input');
           b_verif_mail = false;
            
        }
        else {
            console.log('egale');
            erreur_mail_verif.textContent = "";
            erreur_mail_verif.classList.remove('erreur');
            mail.classList.remove('erreur_input');
            mail_verif.classList.remove('erreur_input');
            b_verif_mail = true;
        }
     

   }

}

function OnBlurVerification2() {    
    var valeur_input_mail2 = mail_verif.value; 

    if (valeur_input_mail2 != ""){
        if (expressionReguliere.test(valeur_input_mail2) == false){ 
            gestion_erreur_mail(erreur_mail_verif,mail_verif,erreur_mail_verif,"L'adresse ne semble pas valide !",'erreur','erreur_input')
            b_mail2 = false;
        }else {
            success(erreur_mail,mail_verif,"")
            b_mail2 = true;
        }
    }
    else {
        gestion_erreur_mail(erreur_mail_verif,mail_verif,erreur_mail_verif,"Ce champ ne peut pas etre vide",'erreur','erreur_input')
        b_mail2 = false;
    }

    if (b_mail == true && b_mail2 == true) {
         console.log(valeur_input_mail2)
         console.log(mail.value)
         if (valeur_input_mail2 != mail.value) {
            erreur_mail_verif.textContent = "Les adresses mail ne correspondent pas";
            erreur_mail_verif.classList.add('erreur');
            mail.classList.add('erreur_input');
            mail_verif.classList.add('erreur_input');
            b_verif_mail = false;
             
         }
         else {
             console.log('egale');
             erreur_mail_verif.textContent = "";
             erreur_mail_verif.classList.remove('erreur');
             mail.classList.remove('erreur_input');
             mail_verif.classList.remove('erreur_input');
             b_verif_mail = true;
         }
      

    }
}

function OnKeyUpVerificationPassword(){
    var motdepasse = password.value.length;
    var valeur_mdp = password.value;

    if (motdepasse != '') {

        if (motdepasse < 10 ) {
            gestion_erreur_password(verification_password,password)
            b_password = false;
        }
        else if (motdepasse >= 10){
            gestion_success_password(verification_password,password)
            b_password = true;
        }

        if (expressionChiffre.test(valeur_mdp) == false ) {
            gestion_erreur_password(verif_chiffre,password)
            b_password = false;
        }
        else {
            gestion_success_password(verif_chiffre,password)
            b_password = true;
        }

        
        if (expressionSpe.test(valeur_mdp) == false) {
            gestion_success_password(verif_special,password)
            b_password = true;
        }else {
            gestion_erreur_password(verif_special,password)
            b_password = false;
        }
    }
    
}

function OnOnKeyUpVerification_Password(){
   var password2 = password_verif.value;

   if ( password.value == "" || password2 == "" ) {
        function_verification_password(span_verif,password_verif,"Les mots de passe doivent etre remplis")
       b_password_verif = false;
   }
   else if (b_password == false) {
       function_verification_password(span_verif,password_verif,"Le format du mot de passe ne corresponds pas")
   }
   else if (password.value != password2 ) {
        function_verification_password(span_verif,password_verif,"Les mots de passe ne correspondent pas")
        b_password_verif = false;
   }
   else {
        success(span_verif,password_verif,"")
        b_password_verif = true;
   }
}
function OnclickBtn(e){
    if(login.value == '' || mail.value == '' || mail_verif.value == '' || password.value == '' || password_verif.value == '' ){
        e.preventDefault();
        div_erreur.textContent = "Les champs ne peuvent etre vide"
    }
    else if (b_login == false || b_mail == false || b_mail2 == false || b_password == false || b_password_verif == false) {
        e.preventDefault();
    }
   
}




/*----------------------------------------------------*/
/* //VARIABLES
------------------------------------------------------ */
var login = document.getElementById('login');
var erreur_log = document.getElementById('erreur_log');
var mail = document.getElementById('mail');
var erreur_mail = document.getElementById('erreur_mail');
var mail_verif = document.getElementById('mail2');
var erreur_mail_verif = document.getElementById('erreur_mail_verif');
var password = document.getElementById('password1');
var verification_password = document.getElementById('verif_caractere');
var verif_chiffre = document.getElementById('verif_chiffre');
var verif_special = document.getElementById('verif_special');
var password_verif = document.getElementById('password2');
var span_verif = document.getElementById('verif_pass');
var btn_valider = document.getElementById('valider');
var div_erreur = document.getElementById('erreur');

//initialisation des variables boolean
var b_login = false;
var b_mail = false;
var b_mail2 = false;
var b_password = false;
var b_password_verif = false;
var b_verif_mail = false;

//expression reguliere pour la verifaction du mail
var expressionReguliere = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

//regex Chiffre
var expressionChiffre = new RegExp ("^(?=.*[0-9])");

//regex caracteres spé
var expressionSpe = /^[^@&".;:/%*§!+=°,}{[()!_$*€£`+=\/;?#]+$/;


/*----------------------------------------------------*/
/* //GENERALE
------------------------------------------------------ */
login.addEventListener('blur',OnBlurInputLogin);
mail.addEventListener('blur',OnBlurVerification);

mail_verif.addEventListener('blur',OnBlurVerification2);

password.addEventListener('keyup',OnKeyUpVerificationPassword)
password_verif.addEventListener('blur',OnOnKeyUpVerification_Password)
btn_valider.addEventListener('click',OnclickBtn)



});