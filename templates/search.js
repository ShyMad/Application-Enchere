// JavaScript Document
$(document).ready(function(){
   $('#recherche').keyup(function() {
        var mot = $(this).val();
        if(mot !== '') {
            $.get('js/result.php?key='+mot, function(returnData) {
            if (!returnData) {
                 $('#affichs').html('<p style="padding:5px;">Try again</p>');
             } else {
                        $('#affichs').html(returnData);
             }
             });
         } 

    });
 
});