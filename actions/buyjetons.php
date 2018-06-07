<?php
	$jet='<div class="scroll">';
	$jet.='<table>';
		$jet.='<thead >';
			$jet.='<th >Nom de Pack :</th>';
			$jet.='<th> Son prix :</th>';
			$jet.='<th> Nombre de Jetons  :</th>';
			$jet.='<th> Action  :</th>';
			
		$jet.='</thead>';
		$jet.='<tbody id="affichs">';
		$r=$c->query("select * from pack_jetons where prix_pack >0 order by id_pack asc");
		while($row=$r->fetch(PDO::FETCH_ASSOC)){
			
			$jet.='<tr >';
				
				$jet.='<td>'.$row['lib_pack'].'</td>';
				$jet.='<td>'.$row['prix_pack'].'</td>';
				$jet.='<td>'.$row['nbr_jetons'].'</td>';
				$jet.='<td><form action="" method="post" enctype="multipart/form-data"><input name="submit'.$row['id_pack'].'" class="modern" type="submit" value="Acheter !"></form></td>';
				$i=$row['id_pack'];
		    $jet.='</tr>';
			
			if(isset($_POST['submit'.$i])){
					if(isset($_SESSION["user"])){
						$r=$c->query("select * from pack_jetons where id_pack='$i'");
						while($row=$r->fetch(PDO::FETCH_ASSOC)){
							$jet='<span class="moderns">Nom de pack :'.$row["lib_pack"].'</span>';
							$jet.='<span class="moderns">Prix de pack : '.$row["prix_pack"].' MAD</span>';
							$jet.='<span class="moderns">Nombre de jetons :'.$row["nbr_jetons"].'</span><br>';
							$jet.='<form action="offrejeton.html" method="post">
							<label class="moderns">Entere le prix de PAck :</label><input type="text" name="prix" class="bordered" class="">
							<input type="text" name="prix_pack" value="'.$row['prix_pack'].'" hidden>
							<input type="text" name="pack" value="'.$row['id_pack'].'" hidden>
							<input type="submit" class="moderns" name="valider" value="valider"></form>';
						}
					}
					$tpl = "buyjetons.twig";
					$param["jet"]=$jet;
			}
		}
				
		$jet.='</tbody>';
	$jet.='</table>';
	$jet.='</div>';
	
$tpl = "buyjetons.twig";
$param["jet"]=$jet;

?>