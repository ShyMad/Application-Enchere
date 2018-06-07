<?php
	$frm='<div class="search">';
	$frm.='<input type="text" placeholder="Prenom, nom ,Email ,ville cp,role ..." class="text" name="recherche" id="recherche">';
	$frm.='</div>';
	$frm.='<div class="scroll">';
	$frm.='<table>';
		$frm.='<thead >';
			$frm.='<th> Email </th>';
			$frm.='<th> Nom & Prenom</th>';
			$frm.='<th> Age </th>';
			$frm.='<th> Date de naissance </th>';
			$frm.='<th> Addresse </th>';
			$frm.='<th> Role </th>';
			$frm.='<th> Nombre de Jeton </th>';
			$frm.='<th> Action </th>';
		$frm.='</thead>';
		$frm.='<tbody id="affichs">';
		$r=$c->query("select * FROM user order by id_user ASC");
		while($row=$r->fetch(PDO::FETCH_ASSOC)){
			$frm.='<tr>';
				$frm.='<td>'.$row['email'].'</td>';
				$frm.='<td>'.$row['nom'].' '.$row['prenom'].'</td>';
				$frm.='<td>'.$row['age'].'</td>';
				$frm.='<td>'.$row['date_naiss'].'</td>';
				$frm.='<td>'.$row['ville'].'</td>';
		$r1=$c->query("select role from niveau where id_role='".$row['niveau_id_role']."'");
		$ro=$r1->fetch(PDO::FETCH_ASSOC);
				$frm.='<td>'.$ro['role'].'</td>';
				$frm.='<td>'.$row['jeton'].'</td>';
				$frm.='<td><a href="updateuser.html?updatuser&id_prdt='.$row['id_user'].'"><img style="margin-left:25px;padding:5px" src="Images/update_user.ico" height="30" width="30"></a></td>';
				$frm.='</tr>';
				}
		$frm.='</tbody>';
	$frm.='</table>';
	$frm.='</div>';
	
$tpl = "updateuser.twig";
$param["frm"]=$frm;

?>