<?php
	$vis='<div class="scroll">';
	$vis.='<table>';
		$vis.='<thead >';
			$vis.='<th >Nom d\'Enchere :</th>';
			$vis.='<th> Date de debut :</th>';
			$vis.='<th> Date de fin  :</th>';
			$vis.='<th> Max de mise  :</th>';
			$vis.='<th> Etat d\'enchere  :</th>';
			
		$vis.='</thead>';
		$vis.='<tbody id="affichs">';
		$r=$c->query("select * from enchere e , user_enchere us , user u where
			us.ref_user = u.id_user and
			us.ref_ench = e.id_ench and
			u.id_user = '".$_SESSION["user"]["user_id_user"]."'	
		 order by us.ref_ench asc");
		while($row=$r->fetch(PDO::FETCH_ASSOC)){
			
			$vis.='<tr >';
				
				$vis.='<td>'.$row['libelle'].'</td>';
				$vis.='<td>'.$row['date_debut'].'</td>';
				$vis.='<td>'.$row['date_fin'].'</td>';
				$vis.='<td>'.$row['max_mise'].'</td>';
				$vis.='<td>'.$row['etat'].'</td>';
				
		    $vis.='</tr>';
			
				}
				
		$vis.='</tbody>';
	$vis.='</table>';
	$vis.='</div>';
	
$tpl = "enchvisit.twig";
$param["vis"]=$vis;

?>