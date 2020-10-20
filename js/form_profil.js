/////////////////////
// FUNCTION
////////////////////
function gestion_style_erreur(variable1,variable2,texte){
    variable1.textContent=texte; 
    variable1.classList.add('erreur'); 
    variable2.classList.remove('success'); 
    variable2.classList.add('erreur_input');
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

function gestion_erreur_password(variable1,variable2){
    variable1.classList.add('erreur'); 
    variable1.classList.remove('success_verif'); 
    variable2.classList.add('erreur_input') 
}

function function_verification_password(variable1,variable2,texte){
    variable1.textContent = texte;
    variable1.classList.add('erreur');
    variable2.classList.add('erreur_input')
}

function success(variable1,variable2,texte){
    variable1.textContent=texte; 
    variable1.classList.remove('erreur');  
    variable2.classList.remove('erreur_input'); 
}
function OnBlurLogin(){
    var valeur_login = login.value;
    if (valeur_login != "")
    {
        erreur_log.textContent = "";
        $.ajax({
            url: 'php/formulaire_profil.php',
            type: 'POST',
            data: {ajax_login: valeur_login},
    
            success: function(data){
                
                if (data == "false"){
                    erreur_log.textContent = "Ce login est déja pris";
                    b_login = false;
                }
                else {
                    b_login = true;  
                }
            }
        })
    }
    else {
        erreur_log.textContent = "Le champs ne peut pas etre vide";
        erreur_log.classList.add('erreur')
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
}

function Onclick_Btn_Modif_infos(){
    profil_infos.classList.remove('profil_infos')
    profil_password.classList.add('profil_password');
    btn_valider.classList.remove();
  
}


function OnClick_Btn_Modif_Pass(){
    profil_infos.classList.add('profil_infos')
     profil_password.classList.remove('profil_password');
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

function OnclikBtn1(e) {

    if (login.value == '' || mail.value == ''){
        console.log(b_login)
        console.log(b_mail)
        e.preventDefault();
        div_erreur.textContent = "Les champs ne peuvent etre vide";
        div_erreur.classList.add('erreur');
        div_erreur.classList.add('erreur2');
    }
    else if (b_login == false || b_mail == false){
        console.log(b_login)
        console.log(b_mail)
        e.preventDefault();
    }
}

function OnClickBtn2(e){
    e.preventDefault();
    let ancien_pass =$("#ancien_pass").val();
    let password = $("#password1").val();
    var password2 = $('#password2').val();
    var valider1 = btn_valider2.value;
    

    if (ancien_pass != ""){ 
       $.ajax({

        url: "php/formulaire_profil.php",
        type: "POST",
        data: {
            ancien_pass: ancien_pass,
            password: password,
            password2: password2,
            valider1: valider1,
        },

        success: function (data){
            let j_data = JSON.parse(data)
          
            if (j_data.vide) {
                console.log(j_data.vide)
                span_verif.textContent = j_data.vide;
                span_verif.classList.add('erreur');
            }
            else if (j_data.erreur2) {
                span_verif.textContent = j_data.erreur2;
                span_verif.classList.add('erreur');
                password_verif.classList.add('erreur_input');
            }
            else {
                delete j_data.erreur2;
                span_verif.textContent = "";
                password_verif.classList.remove('erreur_input');
            }

            if (j_data.erreur1){
                span_pass.textContent = j_data.erreur1;
                span_pass.classList.add('erreur');
                ancien_pass1.classList.add('erreur_input')
            }
            else {
                delete j_data.erreur1;
                span_pass.textContent = "";
                ancien_pass1.classList.remove('erreur_input')
            }

            if (j_data.success) {
                window.location = "profil.php";   
            }
        }

        })
    }
    // else{
    //     window.location= "profil.php";
    // }
 
    
}

function Onclick_btn_Supp(){
    console.log('ok')

    let reponse = confirm("Voulez-vous vraiment supprimer votre compte?");

    if (reponse == true){
        $.ajax({
            url: 'php/formulaire_profil.php',
            type: 'POST',
            data: {reponse: reponse},

            success: function(data){
                window.location = "index.php";  
            }

        })
    }
}

function OnClick(e){
    e.preventDefault();
    profil_password.classList.add('profil_password');
}




/////////////////////
// VARIABLES
////////////////////
var b_login = true;
var b_mail = true;
var b_password = true;

var login = document.getElementById('login');
var mail = document.getElementById('mail');
var erreur_log = document.getElementById('erreur_log');
var btn_valider = document.getElementById('valider');
var btn_modif_infos = document.getElementById('modification_infos');
var btn_modif_pass = document.getElementById('modification_pass');
var password = document.getElementById('password1');
var verification_password = document.getElementById('verif_caractere');
var verif_chiffre = document.getElementById('verif_chiffre');
var password_verif = document.getElementById('password2');
var ancien_pass1 = document.getElementById('ancien_pass');
var span_verif = document.getElementById('verif_pass');
var btn_valider = document.getElementById('valider');
var btn_valider2 = document.getElementById('valider2');
var div_erreur = document.getElementById('erreur');
var profil_infos = document.querySelector('.profil_infos');
var profil_password = document.getElementById('profil_password');
var span_pass = document.getElementById('span_pass');
var btn_supprimer_compte = document.getElementById('supprimer_compte');
var btn_annuler = document.getElementById('btn_annuler');


//expression reguliere pour la verifaction du mail
var expressionReguliere = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

//regex Chiffre
var expressionChiffre = new RegExp ("^(?=.*[0-9])");

/////////////////////
// GENERALE
////////////////////
login.addEventListener('blur',OnBlurLogin);
mail.addEventListener('blur',OnBlurVerification);
btn_modif_infos.addEventListener('click',Onclick_Btn_Modif_infos);
btn_modif_pass.addEventListener('click',OnClick_Btn_Modif_Pass);
password1.addEventListener('keyup',OnKeyUpVerificationPassword);
password_verif.addEventListener('blur',OnOnKeyUpVerification_Password);
btn_valider.addEventListener('click',OnclikBtn1);
btn_valider2.addEventListener('click',OnClickBtn2);
btn_supprimer_compte.addEventListener('click',Onclick_btn_Supp);
btn_annuler.addEventListener('click',OnClick)
