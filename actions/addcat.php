<?php

ini_set("display_errors",0);error_reporting(0);	
	
	$form='	<form action="" method="post" > ';
	   if (isset($_POST['libelle'])&&!preg_match("/[A-Z][a-z]+/",$_POST['libelle'])) 
			{
				$n="* champs incorrect, Libelle commence par une majiscule";
				$err=1;
			 }
	 
	   
	    else $err=0;
		if (isset($_POST['libelle']))  $no="";$no= $_POST['libelle'];
		$form.='<label for="libelle" class="ench_mod">libelle de Categorie : </label><input type="text" name="libelle" value="'.$no.'" class="in_put"><i style="color:red;font-size:15px;">'.$n.'</i><br/>';
		$form.='<center><input type="submit" name="submit" value="Ajouter" class="ench_mod"></center>';
		
	$form.='</form>';	
		
		if (isset($_POST['submit'])&& $err==0) {
			$r=$c->exec("insert into categorie values (NULL,'".$_POST['libelle']."')");
			$id = $c->lastInsertId();
			$r2=$c->query("select * from categorie where id_cat=(select MAX(id_cat) from categorie) ");
			$row=$r2->fetch(PDO::FETCH_ASSOC);
			$form='<label for="libelle" class="ench_mod">libelle de l\'enchère : </label><p  class="line">'. $row['lib_cat'].'</p><br>';
			$form.='&nbsp;&nbsp;<a  class="line" href="addcat.html">Ajouter une autre Categorie</a>';
			$tpl = "addcat.twig";
			$param["form"]=$form;
		}
		
		
		  
$tpl = "addcat.twig";
$param["form"]=$form;  
		

?>