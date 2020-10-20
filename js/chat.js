/*----------------------------------------------------*/
/* GET MESSAGES RELOAD
------------------------------------------------------ */
$(document).ready(function(){

    function charger(){
    
        setTimeout( function(){

            var id_channel =  $('main').data('id_page');
            var last_id = $('#messages p:last').data('id_messages');
            //alert(last_id);
   
            $.ajax({
                url : "php/reload.php", // on donne l'URL du fichier de traitement
                type : "GET", // la requête est de type GET
                data : ({id_channel: id_channel, id_messages: last_id}),// et on envoie nos données
                success:function(response){
                //console.log(response);
                //alert(response);

                
                $(".text-messages").remove();
                var d = $('#messages');
                d.animate({ scrollTop: d.prop('scrollHeight') }, 1000);
                $("#messages").append(response).fadeIn();

                }
            });

              charger(); 
        }, 3000);
    }charger();

});

/*----------------------------------------------------*/
/* POST MESSAGES
------------------------------------------------------ */

$(document).ready(function(){

    $('#chat').submit(function(e){
        e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

        var id_user = $(this).find("input[name=id_user]").val();;
        var id_channel = $(this).find("input[name=id_page]").val();
        var content = $(this).find("input[name=content]").val();

        //alert(id_channel);

        $.ajax({
            url : "php/send_messages.php", // on donne l'URL du fichier de traitement
            type : "POST", // la requête est de type POST
            data : ({id_utilisateur: id_user, id_channel: id_channel, content: content}),// et on envoie nos données
            success:function(response){
            //console.log(response); 
            //alert(response);
            if (response != 'sent'){
                $(".error").empty().append(response);
            }else{
   
            $("#chat")[0].reset(); 
        
            }
            }
        });

    });


});















