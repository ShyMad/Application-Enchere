<?php
ini_set("display_errors",0);error_reporting(0);
$c=new PDO('mysql:host=127.0.0.1;port=3306;dbname=ofppt','root','');
		if(!$c)die("erreur connexion");

 
$add='<form action="" class="frm_add" method="post" enctype="multipart/form-data">';
	
$requete=$c->query("SELECT user FROM login WHERE id_user='".$_SESSION["user"]["id_user"]."'");
$jo=$requete->fetch(PDO::FETCH_ASSOC);
$add.='<table>';
$add.='<tr><td>';			
	$add.='<label class="form_labelle">User Name : </label></td><td><input class="in_put" type="text" name="user" value="'.$jo['user'].'">';
	$add.='</td></tr>';
	$add.='<tr><td><center><input border=0 src="Images/ok-icon.png" type=image Value=submit align="middle" height="28px"  width="35px;" title="Oui" name="yes" /><input border=0 src="Images/delete.png" type=image Value=submit align="middle" height="28px"  width="35px;" title="No" name="no" /></center>';
$add.='</td></tr></table>';
$add.='<form>';

if (isset($_POST['yes'])) {

$r=$c->exec("UPDATE login SET 
	user='".$_POST['user']."' 
	WHERE id_user='".$_SESSION["user"]["id_user"]."'");
	header("Location:accueil.html");
			
}
if (isset($_POST['no'])) {

header("Location:accueil.html");
			
}


$tpl="updateusr.twig";
$param["add"]=$add;


?>