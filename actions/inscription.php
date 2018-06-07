<?php
ini_set("display_errors",0);error_reporting(0);	
	function age($dateN){
		
		$xplode=explode('-',$dateN);
		return date("Y")-$xplode[0];
	}	
 		$n="";$e="";$cp="";$d="";$p="";
	function username(){
		return $_POST['nom'].$_POST['prenom'];	
	}
	function pwd(){
		return 	$_POST['nom'].$_POST['prenom'].rand(10,100);
	}
	$form='	<form action="" method="post" > ';
	   if (isset($_POST['nom'])&&!preg_match("/[A-Z][a-z]+/",$_POST['nom'])) 
			{
				$n="* champs incorrect, Nom commence par majiscule";
				$err=1;
			 }
	 
	   elseif(isset($_POST['prenom'])&&!preg_match("/[a-z]+/",$_POST['prenom'])) 
			{
				$p="* champs incorrect";
				$err=1;
			 }
		elseif (isset($_POST['email'])&&!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/",$_POST['email'])) 
			{
				$e="* doit être un mail valide";
				$err=1;
			 }
	      elseif (isset($_POST['date_naiss'])&&!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$_POST['date_naiss'])) 
			{
				$d="* doit être une date valide : aaaa-mm-jj";
				$err=1;
			 }
		
		  elseif (isset($_POST['cp'])&&!preg_match("/[0-9]{5}/",$_POST['cp'])) 
			{
				$cp="* champs incorrect";
				$err=1;
			 }
	    else $err=0;
		if (isset($_POST['nom']))  $no="";$no= $_POST['nom'];
		$form.='<label for="nom" class="moderns">Votre Nom : </label><input type="text" name="nom" value="'.$no.'" class="simple-input"><i style="color:red;font-size:15px;">'.$n.'</i><br/>';
		if (isset($_POST['prenom'])) $pn="";$pn =$_POST['prenom'];
		$form.='<label for="prenom" class="moderns">Votre Prenom : </label><input type="text" name="prenom" value="'.$pn.'" class="simple-input"><i style="color:red;">'.$p.'</i><br/>';
		if (isset($_POST['email'])) $em="";$em= $_POST['email'];
		$form.='<label for="email" class="moderns">Votre E-mail : </label><input type="text" name="email" value="'.$em.'" class="simple-input"><i style="color:red;">'.$e.'</i><br/>';
		if (isset($_POST['date_naiss'])) $dt="";$dt= $_POST['date_naiss'];
		$form.='<label for="date_naiss" class="moderns">Votre Date de naissance : </label><input type="date" value="'.$dt.'" name="date_naiss" class="simple-input"><i style="color:red;">'.$d.'</i><br/>';
		if (isset($_POST['ville'])) $v="";$v= $_POST['ville'];
		$form.='<label for="ville" class="moderns">Votre Ville : </label><input type="text" name="ville" value="'.$v.'" class="simple-input"><i style="color:red;">'.$p.'</i><br/>';
		if (isset($_POST['cp'])) $pc="";$pc= $_POST['cp'];
		$form.='<label for="cp" class="moderns">Votre Code Postal : </label><input type="text" value="'.$pc.'" name="cp" class="simple-input"><i style="color:red;">'.$cp.'</i><br/>';
		$form.='<input type="submit" name="submit" value="s\'inscrire" class="sub">';
		
	$form.='</form>';	
		
		if (isset($_POST['submit'])&& $err==0) {
			$date=$_POST['date_naiss'];
			$age=age($date);
			$username= username();
			$pwd=pwd();
        	$r=$c->exec("insert into user values (NULL,'".$_POST['email']."','".$_POST['nom']."','".$_POST['prenom']."','$age','".$_POST['date_naiss']."','".$_POST['ville']."','".$_POST['cp']."','1','3')");
			$id = $c->lastInsertId();
			$r1=$c->exec("insert into compte(user_id_user,username,password,role) values('$id','".$_POST['email']."','$pwd','1')");
			
			$r2=$c->query("select * from compte where idcompte=(select MAX(idcompte) from compte) ");
			$row=$r2->fetch(PDO::FETCH_ASSOC);
			$form='<label for="username" class="lbl"></label>Votre Username :<p class="line">'. $row['username'].'</p><br>';
			$form.='<label for="pwd" class="lbl">Votre mot de passe :</label><p class="line">'. $row['password'].'</p><br>';
			$form.='<p>Check Your E-mail for more informations =)</p>';
			$form.='<a href="seconnecter.html" class="line">Se connecter ?!</a>';
			$tpl = "inscription.twig";
			$param["form"]=$form;
		}
		
		
		  
$tpl = "inscription.twig";
$param["form"]=$form;  
		
	

?>