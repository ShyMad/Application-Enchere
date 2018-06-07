<?php
		$frm='<div class="listEnc">';
			$frm.='<h2>Liste des Encheres !</h2><br>';
				$r=$c->query("select * from enchere order by id_ench desc");
				while($row=$r->fetch(PDO::FETCH_ASSOC)){
					$prdt=$row['ref_prdt'];
					$frm.='<div class="Ench clearfix">';
					$frm.='<h3>'.$row['libelle'].'</h3>';
					$frm.='<div class="info">';
						$r3=$c->query("select img,prix from produit where id_prdt='$prdt'");
						$rows=$r3->fetch(PDO::FETCH_ASSOC);
						$frm.='<img src="upload/'.$rows['img'].'" width="80px" height="150px" class="Pimg">';
					$frm.='<span class="title">Date debut :'.$row['date_debut'].'</span><br/>';
					$frm.='<span class="title">Date fin :'.$row['date_fin'].'</span><br/>';
					$frm.='<span class="title">Max mise :'.$row['max_mise'].'</span><br/>';
					$frm.='<span class="title">Sa Valeur :'.$rows['prix'].'$</span><br/>';
					$frm.='<span class="title">Etat :'.$row['etat'].'</span><br/>';
					$frm.='<a href="#" class="modern socle">Rien Fair !</a>';
					$frm.='</div>';
					$frm.='</div>';
						}
		
	
		$frm.='</div>';
	
$tpl = "enchlist.twig";
$param["frm"]=$frm;

?>


<!--	
			
			
				
				<span class="title">product 1</span><br/>
				<span class="DateDebut">debut le :</span><br/>
				<span class="Valuer">Valeur : </span><br/>
				<span class="Valuer">Valeur : </span><br/>
				<span class="Valuer">Valeur : </span><br/>
				<a href="#" class="modern socle">Passer un offre</a>
				
			</div>
					
		</div>
     -->