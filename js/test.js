// JavaScript Document
var i = 0;
alert("Selectionez ID_Enchere pour la modifier !");
function getID(i){
$(document).ready(function(){
     $("#modif"+i).click(function(){
                 var ide = i;
					$.ajax({
                    type:"post",
                    url:"js/test.php",
                    data: "ide="+ide,
                    success: function(data) {
                      $("#ch"+i).html(data);
					   
                    }
                 });
            });
       });

	}
	
$(document).ready(function(){
     $("#ok").click(function(){
                 var ok = $("#ok").attr("type");
					$.ajax({
                    type:"post",
                    url:"js/test1.php",
                    data: "ok="+ok,
                    success: function(data) {
                      $("#ch"+i).html(data);
					   
                    }
                 });
            });
       });
	   
