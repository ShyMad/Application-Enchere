<?php

ini_set("display_errors",0);error_reporting(0);	
	
	$form='	<form action="" method="post" > ';
	   if (isset($_POST['libelle'])&&!preg_match("/[A-Z][a-z]+/",$_POST['libelle'])) 
			{
				$n="* champs incorrect, Libelle commence par une majiscule";
				$err=1;
			 }
	 
	    elseif (isset($_POST['prix'])&&!preg_match("/[^0-9(.{1})]/",$_POST['prix'])) 
			{
				$p="* champs incorrect,ex :12.30 ";
				$err=1;
			 }
			 
		
		elseif(isset($_POST['nbr_jeton'])&&!preg_match("/[0-9]+/",$_POST['nbr_jeton'])) 
			{
				$p="* champs incorrect";
				$err=1;
			 }
	    else $err=0;
		if (isset($_POST['libelle']))  $no="";$no= $_POST['libelle'];
		$form.='<label for="libelle" class="jeton_mod">libelle de Pack : </label><input type="text" name="libelle" value="'.$no.'" class="jeton_in_put"><i style="color:red;font-size:15px;">'.$n.'</i><br/>';
		if (isset($_POST['prix'])) $pn="";$pn =$_POST['prix'];
		$form.='<label for="prix" class="jeton_mod">Prix de Pack : </label><input type="text" name="prix" value="'.$pn.'" class="jeton_in_put"><i style="color:red;">'.$p.'</i><br/>';
		if (isset($_POST['nbr_jeton'])) $em="";$em= $_POST['nbr_jeton'];
		$form.='<label for="nbr_jeton" class="jeton_mod">Nombre de jeton par Pack: </label><input type="text" name="nbr_jeton" value="'.$em.'" class="jeton_in_put"><i style="color:red;">'.$dd.'</i><br/>';
		$form.='<center><input type="submit" name="submit" value="Ajouter" class="jeton_mod"></center>';
		
	$form.='</form>';	
		
		if (isset($_POST['submit'])&& $err==0) {
			$r=$c->exec("insert into pack_jetons values (NULL,'".$_POST['libelle']."','".$_POST['prix']."','".$_POST['nbr_jeton']."')");
			$id = $c->lastInsertId();		
			$r2=$c->query("select * from pack_jetons where id_pack=(select MAX(id_pack) from pack_jetons) ");
			$row=$r2->fetch(PDO::FETCH_ASSOC);
			$form='<p class="line">L\'ajout s\'est fait avec succée </p><br>';
			$form.='<label for="libelle" class="jeton_mod">libelle de Pack : </label><p  class="line">'. $row['lib_pack'].'</p><br>';
			$form.='<label for="max" class="jeton_mod">Prix de Pack : </label><p class="line">'. $row['prix_pack'].'</p><br>';
			$form.='<label for="max" class="jeton_mod">Nombre de jeton par pack: </label><p  class="line">'. $row['nbr_jetons'].'</p><br>';
			$form.='<a href="listjeton.html" class="line">Voir liste des Pack-Jetons? ?!</a>&nbsp;&nbsp;<a  class="line" href="addjeton.html">Ajouter un autre Pack</a>';
			$tpl = "addjeton.twig";
			$param["form"]=$form;
		}
		
		
		  
$tpl = "addjeton.twig";
$param["form"]=$form;  
		

?>