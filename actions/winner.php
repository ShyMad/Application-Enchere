<?php
	$frm='<div class="scroll">';
	$frm.='<table>';
		$frm.='<thead >';
			$frm.='<th >Nom d\'Enchere :</th>';
			$frm.='<th> Email de user :</th>';
			$frm.='<th> Valeur de mise  :</th>';
		$frm.='</thead>';
		$frm.='<tbody id="affichs">';
		$r=$c->query("select * from enchere where etat='end' and mise_inc>0");

		while($ro=$r->fetch(PDO::FETCH_ASSOC)){
			
	/**/		$frm.='<tr >';
				
					$frm.='<td>'.$ro['libelle'].'</td>';
					$re=$c->query("SELECT email, MIN( mise ) AS Mise
									FROM user_enchere e, user u
									WHERE ref_ench ='".$ro['id_ench']."' AND
									e.ref_user = u.id_user
									GROUP BY mise
									HAVING COUNT( mise ) =1
									LIMIT 1");
	
					while($row=$re->fetch(PDO::FETCH_ASSOC)){
					$frm.='<td>'.$row['email'].'</td>';
					$frm.='<td>'.$row['Mise'].' $</td>';}
				
				$frm.='</tr>';
				
				}
				
		$frm.='</tbody>';
	$frm.='</table>';
	$frm.='</div>';
	
$tpl = "winner.twig";
$param["frm"]=$frm;

?>