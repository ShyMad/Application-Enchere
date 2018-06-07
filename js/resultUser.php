<?php
$c=new PDO('mysql:host=127.0.0.1;port=3306;dbname=site02','root','');
		if(!$c)
		die("erreur connexion");
if(isset($_GET['key'])){
	$key = $_GET['key'];
	$sql = "SELECT * FROM user WHERE email REGEXP '^$key' OR nom REGEXP '^$key' OR prenom REGEXP '^$key' OR ville REGEXP '^$key' OR cp REGEXP '^$key' OR jeton REGEXP '^$key' OR age REGEXP '^$key' OR date_naiss REGEXP '^$key'   ";
	$req = $c->query($sql);
	$count = $req->rowCount($sql);
	
	while($row = $req->fetch(PDO::FETCH_OBJ)){?>
        
			<tr>;
				 <td><?php echo $row->email ?></td>';
				 <td><?php echo $row->nom.' '.$row->prenom ?></td>';
				 <td><?php echo $row->age ?></td>';
                 <td><?php echo $row->date_naiss ?></td>';
                 <td><?php echo $row->ville ?></td>';
				 
		<?php $r1=$c->query("select role from niveau where id_role='".$row->niveau_id_role."'");
		$ro=$r1->fetch(PDO::FETCH_ASSOC);?>
				 <td><?php echo $ro['role'] ?></td>
                 <td><?php echo $row->jeton ?></td>';
				 <td><a href="updateuser.html?updatuser&id_prdt=<?php echo $row->id_user ?>"><img style="margin-left:25px;padding:5px" src="Images/update_user.ico" height="30" width="30"></a></td>
		 </tr><?php
		
		}
		}else{
			echo "Aucun resultat pour :".$key ;
	
}

?>