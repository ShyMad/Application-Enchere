<?php

ini_set("display_errors",0);error_reporting(0);	
	
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
		
		  elseif (isset($_POST['prdt'])&&($_POST['prdt']=='@@@@')) 
			{
				$prd="* Choisir un produit";
				$err=1;
			 }
	    else $err=0;
		if (isset($_POST['libelle']))  $no="";$no= $_POST['libelle'];
		$form.='<label for="libelle" class="ench_mod">libelle de l\'enchère : </label><input type="text" name="libelle" value="'.$no.'" class="in_put"><i style="color:red;font-size:15px;">'.$n.'</i><br/>';
		if (isset($_POST['max'])) $pn="";$pn =$_POST['max'];
		$form.='<label for="max" class="ench_mod">Max de mise : </label><input type="text" name="max" value="'.$pn.'" class="in_put"><i style="color:red;">'.$p.'</i><br/>';
		if (isset($_POST['date_debut'])) $em="";$em= $_POST['date_debut'];
		$form.='<label for="date_debut" class="ench_mod">Date de debut: </label><input type="text" name="date_debut" value="'.$em.'" class="in_put"><i style="color:red;">'.$dd.'</i><br/>';
		if (isset($_POST['date_fin'])) $dt="";$dt= $_POST['date_fin'];
		$form.='<label for="date_fin" class="ench_mod">Date de fin  : </label><input type="text" value="'.$dt.'" name="date_fin" class="in_put"><i style="color:red;">'.$df.'</i><br/>';
		$form.='<label for="prdt" class="ench_mod">Choix de produit : </label><select class="in_put" name="prdt">';
		$form.='<option value="@@@@">Choisir un produit</option>';
		$ret=$c->query("select * from produit");
		$resulte=array();
		while ($row=$ret->fetch(PDO::FETCH_NUM))
			{
		$result[$row[1]]=$row[0];}
			
		foreach ($result as $key=>$value)
			{
				$form.='<option value="'.$value.'">'.$key.'</option>';
			}
		$form.='</select><i style="color:red;">'.$prd.'</i><br/>';
		$form.='<label for="prdt" class="ench_mod">Etat d\'enchere : </label><select class="in_put" name="etat">';
		$form.='<option value="@@@@">Choisir l\'etat</option>';
		$form.='<option value="soon">soon</option>';
		$form.='<option value="en coure">en coure</option>';
		$form.='<option value="end">end</option>';		
		$form.='</select><br/>';
		$form.='<center><input type="submit" name="submit" value="Ajouter" class="ench_mod"></center>';
		
	$form.='</form>';	
		
		if (isset($_POST['submit'])&& $err==0) {
			$r=$c->exec("insert into enchere values (NULL,'".$_POST['libelle']."','".$_POST['max']."','0','".$_POST['date_debut']."','".$_POST['date_fin']."','".$_POST['prdt']."','".$_POST['etat']."')");
			$id = $c->lastInsertId();
			$prdt=$_POST['prdt'];		
			$r2=$c->query("select * from enchere where id_ench=(select MAX(id_ench) from enchere) ");
			$row=$r2->fetch(PDO::FETCH_ASSOC);
			$r3=$c->query("select img from produit where id_prdt='$prdt'");
			$rows=$r3->fetch(PDO::FETCH_ASSOC);
			//echo $rows['img'];
			$form='<p class="line">L\'ajout s\'est fait avec succée </p><br>';
			$form.='<img src="upload/'.$rows['img'].'" class="bordered-ench">';
			$form.='<label for="libelle" class="ench_mod">libelle de l\'enchère : </label><p  class="line">'. $row['libelle'].'</p><br>';
			$form.='<label for="max" class="ench_mod">Max de mise : </label><p class="line">'. $row['max_mise'].'</p><br>';
			$form.='<label for="max" class="ench_mod">Date de debut: </label><p  class="line">'. $row['date_debut'].'</p><br>';
			$form.='<label for="max" class="ench_mod">Date de fin : </label><p  class="line">'. $row['date_fin'].'</p><br>';
			$form.='<a href="enchlist.html" class="line">Voir liste des Encheres? ?!</a>&nbsp;&nbsp;<a  class="line" href="addench.html">Ajouter une autre enchere</a>';
			$tpl = "addench.twig";
			$param["form"]=$form;
		}
		
		
		  
$tpl = "addench.twig";
$param["form"]=$form;  
		

?>