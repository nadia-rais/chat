/*----------------------------------------------------*/
/* RENAME CHANNEL
------------------------------------------------------ */
    $(document).ready(function(){

        $('.rename').submit(function(e){
            e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
                
            var id_channel = $(this).find("input[name=id_channel]").val();
            var name_channel = $(this).find("input[name=rename_channel]").val();
            //alert(name_channel);
                        
                $.ajax({
                    url : "php/rename_chan.php", // on donne l'URL du fichier de traitement
                    type : "POST", // la requête est de type POST
                    data : ({id_channel: id_channel, name_channel: name_channel}),// et on envoie nos données
                    success:function(response){
                        console.log(response);
                        //alert(response);

                        $("#name_channel" + id_channel).html(response); 
                        $("#rename_channel" + id_channel).html(response); 
                        
                    }
                });
        });
});

/*----------------------------------------------------*/
/* DELETE CHANNEL
------------------------------------------------------ */
$(document).ready(function(){

    $('.delete_form').submit(function(e){
        e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
            
        var id_channel = $(this).find("input[name=delete1]").val();
        //alert(id_channel);
                    
            $.ajax({
                url : "php/delete_channel.php", // on donne l'URL du fichier de traitement
                type : "POST", // la requête est de type POST
                data : ({id_channel: id_channel}),// et on envoie nos données
                success:function(response){
                    //console.log(response);
                    //alert(response);
                    $("#chan" + id_channel).remove();
                }
            });
    });
});

/*----------------------------------------------------*/
/* ADD CHANNEL
------------------------------------------------------ */
$(document).ready(function(){

    $('#create_chan').submit(function(e){
        e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
        e.stopImmediatePropagation();

        console.log("FORMULAIRE CREATE CHAN VALIDE");
        var name_channel = $(this).find("input[name=create_channel]").val();
        //alert(id_channel);
                    
            $.ajax({
                url : "php/new_channel.php", // on donne l'URL du fichier de traitement
                type : "POST", // la requête est de type POST
                data : ({name_channel: name_channel}),// et on envoie nos données
                success:function(response){
                    
                    //alert(response);
                    $('.table_channel tbody').append(response);
                }
            });
    });
});

/*----------------------------------------------------*/
/* UPDATE USER
------------------------------------------------------ */
$(document).ready(function(){

    $('.user').submit(function(e){
        e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
            
        var id = $(this).find("input[name=id_user]").val();
        var droits = $(this).find("input[name=change_status]").val();
        //alert(id);
                    
            $.ajax({
                url : "php/update_user.php", // on donne l'URL du fichier de traitement
                type : "POST", // la requête est de type POST
                data : ({id:id, droits:droits}),// et on envoie nos données
                success:function(response){
                    console.log(response);
                    //alert(response);

                    //$("#status" + id).val(response);
                   
                    
                    $("#status" + id).html(response);
                    $("#change_status" +id).empty(); 

                    }
            });
    });
});

/*----------------------------------------------------*/
/* DELETE USER
------------------------------------------------------ */
$(document).ready(function(){

    $('.delete_user').submit(function(e){
        e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
         
        var id = $(this).find("input[name=delete2]").val();
        
        //alert(id_channel);
                    
            $.ajax({
                url : "php/delete_user.php", // on donne l'URL du fichier de traitement
                type : "POST", // la requête est de type POST
                data : ({id: id}),// et on envoie nos données
                success:function(response){
                    //console.log(response);
                    //alert(response);
                    $("#row" + id).remove();
                }
            });
    });
});



















