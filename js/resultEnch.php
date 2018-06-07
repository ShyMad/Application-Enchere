<?php
$c=new PDO('mysql:host=127.0.0.1;port=3306;dbname=site02','root','');
		if(!$c)
		die("erreur connexion");
if(isset($_GET['key'])){
	$key = $_GET['key'];
	$sql = "SELECT * FROM enchere WHERE libelle REGEXP '^$key' OR date_debut REGEXP '^$key' OR date_fin REGEXP '^$key' OR max_mise REGEXP '^$key' OR etat REGEXP '^$key'";
	$req = $c->query($sql);
	$count = $req->rowCount($sql);
	
	while($row = $req->fetch(PDO::FETCH_OBJ)){?>
        
			<tr>;
            	<td><input type="radio" name="idench" value="<?php echo $row->id_ench ?>" id="idench" onClick="getID(this.value)" ><?php echo $row->id_ench ?></td>
				 <td><?php echo $row->libelle ?></td>';
				 <td><?php echo $row->date_debut ?></td>';
				 <td><?php echo $row->date_fin ?></td>';
                 <td><?php echo $row->max_mise ?></td>';
                 <td><?php echo $row->etat ?></td>';
                 <td><a id="modif<?php echo $row->id_ench ?>"  href="#"><img style="margin-left:25px;padding:5px"  id="ide"   src="Images/update.png" height="30" width="30"></a></td>
		 </tr><?php
		
		}
		}else{
			echo "Aucun resultat pour :".$key ;
	
}

?>