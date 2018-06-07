<?php
	$frm='<div class="search">';
	$frm.='<input type="text" placeholder="Tapper le nom date .." class="text" name="recherche" id="recherche">';
	$frm.='</div>';
	$frm.='<div class="scroll">';
	$frm.='<table>';
		$frm.='<thead >';
			$frm.='<th >Nom d\'Enchere :</th>';
			$frm.='<th> Date de debut :</th>';
			$frm.='<th> Date de fin  :</th>';
			$frm.='<th> Max de mise  :</th>';
			$frm.='<th> Etat d\'enchere  :</th>';
			$frm.='<th>Action</th>';
		$frm.='</thead>';
		$frm.='<tbody id="affichs">';
		$r=$c->query("select * from enchere order by id_ench asc");
		while($row=$r->fetch(PDO::FETCH_ASSOC)){
			
			$frm.='<tr >';
				
				$frm.='<td>'.$row['libelle'].'</td>';
				$frm.='<td>'.$row['date_debut'].'</td>';
				$frm.='<td>'.$row['date_fin'].'</td>';
				$frm.='<td>'.$row['max_mise'].'</td>';
				$frm.='<td>'.$row['etat'].'</td>';
				$frm.='<td><a href="modifench.html?id='.$row['id_ench'].'"><img style="margin-left:25px;padding:5px"  id="ide"  src="Images/update.png" height="30" width="30"></a></td>';	
				$frm.='</tr>';
				$frm.='<tr></tr>';
				}
				
		$frm.='</tbody>';
	$frm.='</table>';
	$frm.='</div>';
	
$tpl = "updateench.twig";
$param["frm"]=$frm;

?>