<?php
	$frm='<div class="scroll">';
	$frm.='<table>';
		$frm.='<thead >';
			$frm.='<th >Nom de Pack :</th>';
			$frm.='<th> Email de l\'user :</th>';
			$frm.='<th>Date d\'achat :</th>';
			
		$frm.='</thead>';
		$frm.='<tbody id="affichs">';
		$r=$c->query("select lib_pack  , email ,date_achat  from pack_jetons p , user u ,jeton_user j where
						j.ref_user = u.id_user AND
						j.ref_jeton = p.id_pack");
		while($row=$r->fetch(PDO::FETCH_ASSOC)){
			$frm.='<tr>';
				$frm.='<td>'.$row['lib_pack'].'</td>';
				$frm.='<td>'.$row['email'].'</td>';
				$frm.='<td>'.$row['date_achat'].'</td>';
			$frm.='</tr>';
				}
		$frm.='</tbody>';
	$frm.='</table>';
	$frm.='</div>';
	
$tpl = "detailachat.twig";
$param["frm"]=$frm;

?>