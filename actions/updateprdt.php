<?php
	$frm='<div class="search">';
	$frm.='<input type="text" placeholder="Tapper le nom ou la designation" class="text" name="recherche" id="recherche">';
	$frm.='</div>';
	$frm.='<div class="scroll">';
	$frm.='<table>';
		$frm.='<thead >';
			$frm.='<th >image</th>';
			$frm.='<th> Nom de produit :</th>';
			$frm.='<th>Designation :</th>';
			$frm.='<th>Prix :</th>';
			$frm.='<th>Categorie :</th>';
			$frm.='<th>Action</th>';
		$frm.='</thead>';
		$frm.='<tbody id="affichs">';
		$r=$c->query("select * from produit order by id_prdt desc");
		while($row=$r->fetch(PDO::FETCH_ASSOC)){
			$frm.='<tr>';
				$frm.='<td align="center"><img style="margin:5px;padding:5px" src="upload/'.$row['img'].'" width="50" height="50"></td>';
				$frm.='<td>'.$row['libelle'].'</td>';
				$frm.='<td>'.$row['designation'].'</td>';
				$frm.='<td>'.$row['prix'].'</td>';
		$r1=$c->query("select lib_cat from categorie where id_cat='".$row['ref_cat']."'");
		$ro=$r1->fetch(PDO::FETCH_ASSOC);
				$frm.='<td>'.$ro['lib_cat'].'</td>';
				$frm.='<td><a href="updateprdt.html?updateprdt&id_prdt='.$row['id_prdt'].'"><img style="margin-left:25px;padding:5px" src="Images/update.png" height="30" width="30"></a></td>';
				$frm.='</tr>';
				}
		$frm.='</tbody>';
	$frm.='</table>';
	$frm.='</div>';
	
$tpl = "updateprdt.twig";
$param["frm"]=$frm;

?>