<?php
		
		
	if(isset($_POST['valider'])){
	$prix=$_POST["prix"];
	$prix_pack=$_POST["prix_pack"];
		if($prix==$prix_pack){
			$r=$c->exec("insert into jeton_user values(NULL,'".$_POST["pack"]."','".$_SESSION["user"]["user_id_user"]."',NOW())");
			
			$r3=$c->query("select jeton from user where id_user = '".$_SESSION["user"]["user_id_user"]."' ");
			$row=$r3->fetch(PDO::FETCH_ASSOC);
			
			$user_jeton=$row['jeton'];
			
			$r4=$c->query("select nbr_jetons from pack_jetons where id_pack = '".$_POST["pack"]."' ");
			$ro=$r4->fetch(PDO::FETCH_ASSOC);
			
			$jetons=$ro['nbr_jetons'];
			
			$n_jetons = $jetons + $user_jeton;
			
			$r1=$c->exec("UPDATE user SET jeton='$n_jetons' where id_user='".$_SESSION["user"]["user_id_user"]."' ");		
		
			$form='<h1>Merci =)</h1>';
			$form.='<h4>Votre Achat  est faite avec succée ^^</h4>';
			$form.='<a href="encheres.html"  class="line">Back to Encheres List ?</a>';
		}
		else{
			$form='<h1>Ohh !</h1>';
			$form.='<h4>Une erreur s\'est produite durant l\'achat , peut etre le prix ajouté est different au prix de pack !</h4>';
			$form.='<a href="buyjetons.html"  class="line">Back to Jetons List ?</a>';
		}
		
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
			
$tpl = "offrejeton.twig";
$param["form"]=$form;

?>