<?php
$c=new PDO('mysql:host=127.0.0.1;port=3306;dbname=site02','root','');
		if(!$c)
		die("erreur connexion");
if (isset($_POST['ok'])) {
			$c->exec("update enchere SET libelle='".$_POST['libelle']."',max_mise='".$_POST['mise_max']."',date_debut='".$_POST['date_debut']."',date_fin'".$_POST['date_fin']."',etat='".$_POST['etat']."' WHERE id_ench='$id'") ; }
?>