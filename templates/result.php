<?php
include_once '';
if(isset($_GET['key'])){
	$key = $_GET['key'];
	$q = array('key'=>$key. '%');
	$sql = 'SELECT * FROM produit WHERE libelle like :key or designation like :key';
	$req = $c->prepare($sql);
	$req->execute($q);
	$count = $req->rowCount($sql);
	
	if($count == 1){
		while($row = $req->fetch(PDO::FETCH_ASSOC)){
			$frm='<tr>';
				$frm.='<td align="center"><img style="margin:5px;padding:5px" src="upload/'.$row['img'].'" width="50" height="50"></td>';
				$frm.='<td>'.$row['libelle'].'</td>';
				$frm.='<td>'.$row['designation'].'</td>';
				$frm.='<td>'.$row['prix'].'</td>';
		$r1=$c->query("select lib_cat from categorie where id_cat='".$row['ref_cat']."'");
		$ro=$r1->fetch(PDO::FETCH_ASSOC);
				$frm.='<td>'.$ro['lib_cat'].'</td>';
				$frm.='<td><a href="updateprdt.html?updateprdt&id_prdt='.$row['id_prdt'].'"><img style="margin-left:25px;padding:5px" src="Images/update.png" height="30" width="30"></a></td>';
		}
			$frm.='</tr>';
		}
	}


?>