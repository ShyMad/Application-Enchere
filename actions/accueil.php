<?php
	
	//print_r($_SESSION["user"]["user_id_user"]);
	$var='<div class="enSpec clearfix">';
		$var.='<h3>Enchèere de Lux  </h3>';
		$var.='<div class="infos">';
			$var.='<div class="Pimg">';
		$r=$c->query("select * from enchere WHERE ref_prdt=(select id_prdt from produit where ref_cat='5') order by id_ench desc");
		
				while($row=$r->fetch(PDO::FETCH_ASSOC)){
					$today= date("Y-m-d H:i:s");
		// Update etat dans la table de l'enchere
					if(($row['date_fin']<=$today)||($row['mise_inc']==$row['max_mise'])){
					$t=$c->exec("UPDATE enchere set etat='end' where id_ench='".$row['id_ench']."'");}
					if(($row['date_debut']<=$today)&&($row['date_fin']>$today)&&($row['mise_inc']<$row['max_mise'])){
					$t=$c->exec("UPDATE enchere set etat='en coure' where id_ench='".$row['id_ench']."'");}
					if(($row['date_debut']>$today)){
					$t=$c->exec("UPDATE enchere set etat='soon' where id_ench='".$row['id_ench']."'");}
		$prdt=$row['ref_prdt'];
		$r3=$c->query("select img,prix from produit where id_prdt='$prdt'");
						$rows=$r3->fetch(PDO::FETCH_ASSOC);
		$var.='<img src="upload/'.$rows['img'].'" width="300px" height="300px" class="Pimg">';
		$var.='</div>';	
		$var.='<span class="title">'.$row['libelle'].'</span><br/><br/><br>';	
		$var.='<span class="title">Date debut :'.$row['date_debut'].'</span><br/><br/><br>';
		$var.='<span class="title">Date fin :'.$row['date_fin'].'</span><br/><br/><br>';
		$var.='<span class="title">Max mise :'.$row['max_mise'].'</span><br/><br/><br>';
		$var.='<span class="title">Sa Valeur :'.$rows['prix'].'$</span><br/><br/><br>';
		$var.='<span class="title">Etat :'.$row['etat'].'</span><br/>';
		$var.='<a href="encheres.html" class="modern socle">Passer un offre</a>';
				}
		$var.='</div>';
	$var.='</div>';
		$var.='<div class="listEnc">';
				$r1=$c->query("select * from enchere where ref_prdt Not in(select id_prdt from produit where ref_cat='5') order by id_ench desc LIMIT 4");
				while($ro=$r1->fetch(PDO::FETCH_ASSOC)){
					$today= date("Y-m-d H:i:s");
		// Update etat dans la table de l'enchere
					if(($ro['date_fin']<=$today)||($ro['mise_inc']==$ro['max_mise'])){
					$t=$c->exec("UPDATE enchere set etat='end' where id_ench='".$ro['id_ench']."'");}
					if(($ro['date_debut']<=$today)&&($ro['date_fin']>$today)&&($ro['mise_inc']<$ro['max_mise'])){
					$t=$c->exec("UPDATE enchere set etat='en coure' where id_ench='".$ro['id_ench']."'");}
					if(($ro['date_debut']>$today)){
					$t=$c->exec("UPDATE enchere set etat='soon' where id_ench='".$ro['id_ench']."'");}
					$prdti=$ro['ref_prdt'];
					$var.='<div class="Ench clearfix">';
					$var.='<h3>'.$ro['libelle'].'</h3>';
					$var.='<div class="info">';
						$r4=$c->query("select img,prix from produit where id_prdt='$prdti'");
						$rowss=$r4->fetch(PDO::FETCH_ASSOC);
						$var.='<img src="upload/'.$rowss['img'].'" width="80px" height="150px" class="Pimg">';
					$var.='<span class="title">Date debut :'.$ro['date_debut'].'</span><br/>';
					$var.='<span class="title">Date fin :'.$ro['date_fin'].'</span><br/>';
					$var.='<span class="title">Max mise :'.$ro['max_mise'].'</span><br/>';
					$var.='<span class="title">Sa Valeur :'.$rowss['prix'].'$</span><br/>';
					$var.='<span class="title">Etat :'.$ro['etat'].'</span><br/>';
					$etat=$ro['etat'];
					if($etat == 'end'){
					$var.='<a href="#" onClick="expire()" class="expire socle">Expirée!</a>';}
					else if($etat == 'en coure'){
					$var.='<a href="encheres.html" class="modern socle">Passer un offre !</a>';}
					else if($etat == 'soon'){
					$var.='<a href="encheres.html" class="pro"> Available soon</a>';	}
					$var.='</div>';
					$var.='</div>';
						}
		
	
		$var.='</div>';
		
	

$param["var"]=$var;
$tpl="accueil.twig";



?>


		
		