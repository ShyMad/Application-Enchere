<?php
$c=new PDO('mysql:host=127.0.0.1;port=3306;dbname=site02','root','');
		if(!$c)
		die("erreur connexion");
function safe($var)
{
	$var = mysql_real_escape_string($var);
	$var = addcslashes($var, '%_');
	$var = trim($var);
	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_GET['key'])){
	$key = $_GET['key'];
	$sql = "SELECT * FROM produit WHERE designation REGEXP '^$key' OR libelle REGEXP '^$key' OR prix REGEXP '^$key' ";
	$req = $c->query($sql);
	$count = $req->rowCount($sql);
	
	while($row = $req->fetch(PDO::FETCH_OBJ)){?>
        
			<tr>;
				<td align="center"><img style="margin:5px;padding:5px" src="upload/<?php echo $row->img ?>" width="50" height="50"></td>';
				 <td><?php echo $row->libelle ?></td>';
				 <td><?php echo $row->designation ?></td>';
				 <td><?php echo $row->prix ?></td>';
		<?php $r1=$c->query("select lib_cat from categorie where id_cat='".$row->ref_cat."'");
		$ro=$r1->fetch(PDO::FETCH_ASSOC);?>
				 <td><?php echo $ro['lib_cat'] ?></td>
				 <td><a href="updateprdt.html?updateprdt&id_prdt=<?php echo $row->id_prdt ?>"><img style="margin-left:25px;padding:5px" src="Images/update.png" height="30" width="30"></a></td>
		 </tr><?php
		
		}
		}else{
			echo "Aucun resultat pour :".$key ;
	
}

?>