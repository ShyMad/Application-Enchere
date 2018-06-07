<?php
ini_set("display_errors",0);error_reporting(0);	

     $add='<form action="" method="post" enctype="multipart/form-data">';
		 if (isset($_POST['libelle'])&&!preg_match("/[a-z]+/",$_POST['libelle'])) 
			{
				$n="* champs incorrect";
				$err=1;
			 }
		
		  elseif (isset($_POST['design'])&&!preg_match("/[A-Z]+/",$_POST['design'])) 
			{
				$d="* champs incorrect, Designation doit etre en majuscule";
				$err=1;
			 }
		   elseif (isset($_POST['prix'])&&!preg_match("/[^0-9(.{1})]/",$_POST['prix'])) 
			{
				$p="* champs incorrect,ex :12.30 ";
				$err=1;
			 }
			  elseif (isset($_POST['cat'])&&($_POST['cat']=='0')) 
			{
				$cat="* Choisir une categorie";
				$err=1;
			 }
			else $err=0;
		$add.='<img src="Images/add_pic.png" class="bordered-links" onclick="performClick(document.getElementById(\'theFile\'));" />';
		$add.='<input type="file" name="image"  id="theFile" hidden/>';
		if (isset($_POST['libelle']))  $lib="";$lib= $_POST['libelle'];
		$add.='<label  class="moderne">Libelle de Produit : </label><input type="text" value="'.$lib.'"  class="bordered" name="libelle" ><i style="color:red;">'.$n.'</i><br>';
		if (isset($_POST['design']))  $de="";$de= $_POST['design'];
		$add.='<label  class="moderne">Designation de Produit : </label><input type="text" class="bordered" value="'.$de.'"  name="design" ><i style="color:red; font-size:14px;">'.$d.'</i><br>';
		if (isset($_POST['prix']))  $pr="";$pr= $_POST['prix'];
		$add.='<label  class="moderne">Prix de Produit : </label><input type="text" class="bordered" value="'.$pr.'"  name="prix" ><i style="color:red;">'.$p.'</i><br>';
		
		$add.='<label  class="moderne">Categorie de Produit : </label><select class="bordered"  name="cat">';
		$add.='<option value="0">Les Categories</option>';
		$ret=$c->query("select * from categorie");
		$resulte=array();
		while ($row=$ret->fetch(PDO::FETCH_NUM))
			{
		$result[$row[1]]=$row[0];}
			
		foreach ($result as $key=>$value)
			{
				$add.='<option value="'.$value.'">'.$key.'</option>';
			}
		$add.='</select><i style="color:red;">'.$cat.'</i><br>';
		$add.='<input type="submit" name="submit" class="bordered" value="Ajouter"><i style="color:red;font-size:14px;">'.$i.'</i>';
	$add.='</form>';
	
	
	if (isset($_POST['submit'])&& $err==0) {
			$image=$_FILES['image']['name'];
			$img_tmp=$_FILES['image']['tmp_name'];
			$maxsize=2097152;
			$image_ext=strtolower(end(explode('.',$image)));
				if(in_array($image_ext,array('jpg','jpeg','png','gif'))){
					if($_FILES['image']['size'] < $maxsize){
						$nom=md5(uniqid(rand(), true));
						$image = "{$nom}.{$image_ext}";
						move_uploaded_file($img_tmp,'upload/'.$image);
						}else{$i="Fichier est trops gros! < 2M ";}
						$r=$c->exec("insert into produit values (NULL,'".$_POST['libelle']."','".$_POST['design']."','".$_POST['prix']."','".$_POST['cat']."','$image')");
						$r2=$c->query("select * from produit where id_prdt=(select MAX(id_prdt) from produit) ");
			            $row=$r2->fetch(PDO::FETCH_ASSOC);
						$add='<p>L\'ajout s\'est fait avec succée</p><br>';
						$add.='<img src="upload/'.$row['img'].'" class="bordered-links">';
						$add.='<label  class="moderne">Libelle de Produit : </label><p class="bordered">'.$row['libelle'].'</p><br>';
						$add.='<label  class="moderne">Designation de Produit : </label><p class="bordered">'.$row['designation'].'</p><br>';
						$add.='<label  class="moderne">Prix de Produit : </label><p class="bordered">'.$row['prix'].'</p><br>';
						$r3=$c->query("select c.lib_cat from categorie c ,produit p where c.id_cat=p.ref_cat ");
			            $ro=$r3->fetch(PDO::FETCH_ASSOC);
						$add.='<label  class="moderne">Libelle de Produit : </label><p class="bordered">'.$ro['lib_cat'].'</p><br>';
						$add.='<a href="prdtlist.html" class="bordered">Voir la list des produits</a>&nbsp;&nbsp;&nbsp;<a href="addprdt.html" class="bordered">Ajouter un autre produit!</a>';
						$tpl = "addprdt.twig";
						$param["add"]=$add;
				}else{
					$i="Veulliez saisir une image valide";
					}
				
		}
$tpl = "addprdt.twig";
$param["add"]=$add;

?>