<?php
								
								
		$frm='<div class="listEnc">';
			$frm.='<script language="javascript1.5">function will(){
	alert("cette Offre serai available soon!");
}</script>';
			$frm.='<h3> Liste des Encheres !</h3><br>';
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
								$etat=$row['etat'];
								if($etat == 'end'){
								$frm.='<a href="#" onClick="expire()" class="expire">Expirée!</a>';}
								else if($etat== 'en coure'){
							$frm.='<form action="" method="post" enctype="multipart/form-data"><input name="submit'.$row['id_ench'].'" class="modern" type="submit" value="Passer un offre !"></form>';}
								else if($etat == 'soon'){
							$frm.='<a href="#" onClick="will()" class="pro"> Available soon</a>';	}	
							$i=$row['id_ench'];
							
					$frm.='</div>';
				$frm.='</div>';
				
				
						
				if(isset($_POST['submit'.$i])){
					if(isset($_SESSION["user"])){
					$frm='<div class="enSpec clearfix">';
						$frm.='<div class="info">';
						$frm.='<h3>Passer Un Offre!</h3>';
							$j=$c->query("select jeton from user where id_user='".$_SESSION["user"]["user_id_user"]."'");
							$jo=$j->fetch(PDO::FETCH_ASSOC);
						    $r=$c->query("select * from enchere where id_ench='$i'");
							while($row=$r->fetch(PDO::FETCH_ASSOC)){
								$prdt=$row['ref_prdt'];
								$jeton=$jo['jeton'];
								$r3=$c->query("select img,prix from produit where id_prdt='$prdt'");
								$rows=$r3->fetch(PDO::FETCH_ASSOC);
								$frm.='<div class="Pimg">';
									$frm.='<img src="upload/'.$rows['img'].'" width="300px" height="400px" class="Pimg">';
								$frm.='</div>';
								$frm.='<span class="title">Nombre de jeton :<i style="color:red;">'.$jo['jeton'].'</i></span><br/>';
						        $frm.='<br><br><span class="title">Date debut :'.$row['date_debut'].'</span><br/><br><br>';
								$frm.='<span class="title">Date fin :'.$row['date_fin'].'</span><br/><br><br>';
								$frm.='<span class="title">Max mise :'.$row['max_mise'].'</span><br/><br><br>';
								$frm.='<span class="title">Sa Valeur :'.$rows['prix'].'$</span><br/><br><br>';
								$frm.='<span class="title">Etat :'.$row['etat'].'</span><br/><br><br>';
								if($jeton>0){
								$frm.='<form action="offre.html" method="post" enctype="multipart/form-data">
								<input type="text" name="ref" value="'.$row['id_ench'].'" hidden>
								<input type="text" name="jeton" value="'.$jo['jeton'].'" hidden>
								<input type="text" name="inc" value="'.$row['mise_inc'].'" hidden>
								<label>Valeur de mise :</label><input type="text" name="mise" value=""><input type="submit" name="valider" value="Valider L\'offre"></form>';}
								else{
								$frm.='<span style="color:red">Vous n\'avez pas assez de jeton!!</span><a href="buyjetons.html">Achter des Jeton?!</a>';
									}
								
							}
						$frm.='</div>';	
					$frm.='</div>';
					}else{header("Location:seconnecter.html");}
					$tpl = "encheres.twig";
					$param["frm"]=$frm;
	
					}
						}
			$frm.='</div>';
				
				
		
	
		
	
$tpl = "encheres.twig";
$param["frm"]=$frm;

?>