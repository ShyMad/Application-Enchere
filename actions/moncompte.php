<?php
	
	$r=$c->query("Select * from user where id_user='".$_SESSION["user"]["user_id_user"]."'");
	$row=$r->fetch(PDO::FETCH_ASSOC);
	$cpt='<from action="" methode="post">';
		$cpt.='<label class="moderns">Votre Nom:</label><input type="text" value="'.$row['nom'].'" class="simple-input" name="">';
		$cpt.='<label class="moderns">Votre Prenom:</label><input value="'.$row['prenom'].'" class="simple-input" type="text" name="">';
		$cpt.='<label class="moderns">Votre date de naissaince:</label><input value="'.$row['date_naiss'].'" class="simple-input" type="text" name="">';
		$cpt.='<label class="moderns">Votre age :</label><input type="text" value="'.$row['age'].'" class="simple-input" name="">';
		$cpt.='<label class="moderns">Votre ville :</label><input type="text" value="'.$row['ville'].'" class="simple-input" name="">';
		$cpt.='<label class="moderns">Votre Adresse E-mail:</label><input type="text" value="'.$row['email'].'" class="simple-input" name="">';
		$cpt.='<label class="moderns">Votre Code postal :</label><input class="simple-input" value="'.$row['cp'].'" type="text" name="">';
		
	$cpt.='</from>';
	$r1=$c->query("Select * from compte where user_id_user='".$_SESSION["user"]["user_id_user"]."'");
	$ro=$r1->fetch(PDO::FETCH_ASSOC);
		$cp='<label class="moderns">Votre Login :</label><p class="simple-input">'.$ro['username'].'</p><br>';
		$cp.='<label class="moderns">Votre Mot de passe :</label><p class="simple-input">'.$ro['password'].'</p>';
	
$tpl = "moncompte.twig";
$param["cpt"]=$cpt;
$param["cp"]=$cp;

?>