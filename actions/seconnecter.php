<?php
ini_set("display_errors",0);error_reporting(0);
	
	$form='	<form action="" method="post" > ';
	
	if (isset($_POST['username'])&&!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/",$_POST['username'])) 
			{
				$i="* champs incorrect";
				$err=1;
			 }
	else $err=0;
	if (isset($_POST['username'])) $p= $_POST['username'];
	$form.='<label for="username" class="lbl">User Name : </label><input placeholder=" ex: username@web.com" type="text" class="line" name="username" value="'.$p.'" ><i style="color:red;font-size=15px;">'.$i.'</i><br />';
	
	
	
	$form.='<label for="pwd" class="lbl">Mot de passe : </label>';
	$form.='<input type="password" class="line" name="pwd" >';
	$form.='<br />';
	$form.='<input type="submit" name="connecter" class="depth-sub" >';
	$form.='</form>';
if (isset($_POST['connecter'])&& $err==0) {
        $r=$c->query("select * from compte where username='".$_POST['username']."' and password='".$_POST['pwd']."'");
		if (!$r->rowCount()) {$param['msg']="login ou mot de passe inexistant";}
		else {
			$row=$r->fetch(PDO::FETCH_ASSOC);
			$param['info']="Bienvenu ".$_POST['username'];
			$tpl = "accueil.twig";
			$_SESSION["user"]=$row;
			header('Location:accueil.html');
			
		}   
    }

$tpl = "seconnecter.twig";
$param["form"]=$form;
?>


