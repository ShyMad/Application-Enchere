<?php
	$frm='<div class="search">';
	$frm.='<input type="text" placeholder="Tapper le nom ou la designation" class="text" name="recherche" id="recherche">';
	$frm.='</div>';
	$frm.='<div class="scroll">';
	$frm.='<table>';
		$frm.='<thead >';
			$frm.='<th >Nom de Pack :</th>';
			$frm.='<th> Prix de Pack :</th>';
			$frm.='<th>Nombre de jeton par pack :</th>';
			$frm.='<th>Action</th>';
		$frm.='</thead>';
		$frm.='<tbody id="affichs">';
		$r=$c->query("select * from pack_jetons order by id_pack desc");
		while($row=$r->fetch(PDO::FETCH_ASSOC)){
			$frm.='<tr>';
				$frm.='<td>'.$row['lib_pack'].'</td>';
				$frm.='<td>'.$row['prix_pack'].'</td>';
				$frm.='<td>'.$row['nbr_jetons'].'</td>';
				$frm.='<td><a href="updatejeton.html?updatejeton&id_pack='.$row['id_pack'].'"><img style="margin-left:25px;padding:5px" src="Images/update.png" height="30" width="30"></a></td>';
				$frm.='</tr>';
				}
		$frm.='</tbody>';
	$frm.='</table>';
	$frm.='</div>';
	
$tpl = "updatejeton.twig";
$param["frm"]=$frm;

?>