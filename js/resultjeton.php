<?php
$c=new PDO('mysql:host=127.0.0.1;port=3306;dbname=site02','root','');
		if(!$c)
		die("erreur connexion");
if(isset($_GET['key'])){
	$key = $_GET['key'];
	$sql = "SELECT * FROM pack_jetons WHERE lib_pack REGEXP '^$key' OR prix_pack REGEXP '^$key' OR nbr_jetons REGEXP '^$key' ";
	$req = $c->query($sql);
	$count = $req->rowCount($sql);
	
	while($row = $req->fetch(PDO::FETCH_OBJ)){?>
        
			<tr>;
				 <td><?php echo $row->lib_pack ?></td>';
				 <td><?php echo $row->prix_pack ?></td>';
				 <td><?php echo $row->nbr_jetons ?></td>';
                 <td><a href="updatejeton.html?updatjeton&id_pack=<?php echo $row->id_pack ?>"><img style="margin-left:25px;padding:5px" src="Images/update_user.ico" height="30" width="30"></a></td>
		 </tr><?php
		
		}
		}else{
			echo "Aucun resultat pour :".$key ;
	
}

?>