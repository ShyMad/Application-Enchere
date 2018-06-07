<?php
		
		
		if(isset($_POST['valider'])){
		$r=$c->exec("insert into user_enchere values(NULL,'".$_SESSION["user"]["user_id_user"]."','".$_POST["ref"]."','".$_POST["mise"]."')");
		$jeton=$_POST['jeton']-1;	
		$inc=$_POST['inc']+1;	
		$r1=$c->exec("UPDATE user SET jeton='$jeton' where id_user='".$_SESSION["user"]["user_id_user"]."' ");		
		$r2=$c->exec("UPDATE enchere SET mise_inc='$inc' where id_ench='".$_POST["ref"]."' ");
		$form='<h1>Merci =)</h1>';
		$form.='<h4>Votre offre est ajouté avec succée ^^</h4>';
		$form.='<a href="encheres.html"  class="line">Back to Encheres List ?</a>';
								}
		
		/*	if(isset($_POST['ide'])){
			print_r($_POST['ide']);	
			}
   		   	$r0=$c->query("select * from user where id_user='".$_SESSION["user"]["user_id_user"]."'");
			$ro=$r0->fetch(PDO::FETCH_ASSOC);
			$jeton=$ro['jeton'];
			$r2=$c->query("select * from enchere where id_ench='' ");
			$row=$r2->fetch(PDO::FETCH_ASSOC);
			$MISE=$row['mise_inc'];
			$prdt=$row['ref_prdt'];
			$r3=$c->query("select img from produit where id_prdt='$prdt'");
			$rows=$r3->fetch(PDO::FETCH_ASSOC);
			//echo $rows['img'];
			
			$form='<img src="upload/'.$rows['img'].'" class="bordered-ench">';
			$form.='<script  language="JavaScript" type="text/javascript">j=getId();alert(j);</script>';
			$form.='<label for="libelle" class="ench_mod">libelle de l\'enchère : </label><p  class="line">'. $row['libelle'].'</p><br>';
			$form.='<label for="max" class="ench_mod">Max de mise : </label><p class="line">'. $row['max_mise'].'</p><br>';
			$form.='<label for="max" class="ench_mod">Date de debut: </label><p  class="line">'. $row['date_debut'].'</p><br>';
			$form.='<label for="max" class="ench_mod">Date de fin : </label><p  class="line">'. $row['date_fin'].'</p><br>';
			$form.='<input type="submit"  class="modern socle" value="Valider L\'offre">&nbsp;&nbsp;<a href="encheres.html" class="line">Voir liste des Encheres? ?!</a>';
*/			
			
$tpl = "offre.twig";
$param["form"]=$form;

?>