<?php
ini_set("display_errors",0);error_reporting(0);
$url = $_SERVER['REQUEST_URI'];
 //echo $url;
 $url_parse = parse_url($url); 
 $url_path = explode("=", $url_parse['query']); 
    // On récupère les parties de l'url dans un tableau "$url_path"
    $id = $url_path[1]; // Contient : "snippets"
    $ids = $url_path[2]; // Contient : "recuperer-la-partie-une-url-en-php"
	//echo $id;
	

$form='	<form action="" method="post" > ';
	   if (isset($_POST['libelle'])&&!preg_match("/[A-Z][a-z]+/",$_POST['libelle'])) 
			{
				$n="* champs incorrect, Libelle commence par une majiscule";
				$err=1;
			 }
	 
	   elseif(isset($_POST['max'])&&!preg_match("/[0-9]+/",$_POST['max'])) 
			{
				$p="* champs incorrect";
				$err=1;
			 }
		
	      elseif (isset($_POST['date_debut'])&&!preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/",$_POST['date_debut'])) 
			{
				$dd="* doit être une date valide : aaaa-mm-jj hh-mm-ss";
				$err=1;
			 }
			 elseif (isset($_POST['date_fin'])&&!preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/",$_POST['date_fin'])) 
			{
				$df="* doit être une date valide : aaaa-mm-jj hh-mm-ss";
				$err=1;
			 }
		
		  elseif (isset($_POST['etat'])&&($_POST['etat']=='@@@@')) 
			{
				$prd="* Choisir une etat ";
				$err=1;
			 }
	    else $err=0;
$requete=$c->query("SELECT * FROM  enchere where  id_ench='$id'");
$jo=$requete->fetch(PDO::FETCH_ASSOC);
		if (isset($_POST['libelle']))  $no="";$no= $_POST['libelle'];
		$form.='<label for="libelle" class="ench_mod">libelle de l\'enchère : </label><input type="text" name="libelle" value="'.$jo['libelle'].$no.'" class="in_put"><i style="color:red;font-size:15px;">'.$n.'</i><br/>';
		if (isset($_POST['max'])) $pn="";$pn =$_POST['max'];
		$form.='<label for="max" class="ench_mod">Max de mise : </label><input type="text" name="max" value="'.$jo['max_mise'].$pn.'" class="in_put"><i style="color:red;">'.$p.'</i><br/>';
		if (isset($_POST['date_debut'])) $em="";$em= $_POST['date_debut'];
		$form.='<label for="date_debut" class="ench_mod">Date de debut: </label><input type="text" name="date_debut" value="'.$jo['date_debut'].$em.'" class="in_put"><i style="color:red;">'.$dd.'</i><br/>';
		if (isset($_POST['date_fin'])) $dt="";$dt= $_POST['date_fin'];
		$form.='<label for="date_fin" class="ench_mod">Date de fin  : </label><input type="text" value="'.$jo['date_fin'].$dt.'" name="date_fin" class="in_put"><i style="color:red;">'.$df.'</i><br/><br/>';
		$form.='<label for="prdt" class="ench_mod">Etat d\'enchere : </label><select class="in_put" name="etat">';
		$form.='<option value="@@@@">Choisir l\'etat</option>';
		$form.='<option value="soon">soon</option>';
		$form.='<option value="en coure">en coure</option>';
		$form.='<option value="end">end</option>';		
		$form.='</select><i style="color:red;">'.$prd.'</i><br/><br/>';
		$form.='<center><input type="submit" name="submit" value="Modifier" class="ench_mod"></center>';
		
	$form.='</form>';	
		
if (isset($_POST['submit'])&& $err==0) {
$r=$c->exec("UPDATE enchere SET 
	libelle='".$_POST['libelle']."',
	max_mise='".$_POST['max']."',
	date_debut='".$_POST['date_debut']."',
	date_fin='".$_POST['date_fin']."',
	etat='".$_POST['etat']."' WHERE id_ench='$id'");
	header("Location:updateench.html");
			
}
		
		
		  
$tpl = "modifench.twig";
$param["form"]=$form;  


?>