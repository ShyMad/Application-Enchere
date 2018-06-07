<?php
//ini_set("display_errors",0);error_reporting(0);	
$c=new PDO('mysql:host=127.0.0.1;port=3306;dbname=site02','root','');
		if(!$c)
		die("erreur connexion");
if(isset($_POST['ide'])){
	$id = $_POST['ide'];
	
	//$sql = "SELECT * FROM enchere WHERE id_ench='$id'  ";
	//$req = $c->query($sql);
	$n= '';$p= '';$dd= '';$df = '';
		if (isset($_POST['libelle'])&&!preg_match("/[A-Z][a-z]+/",$_POST['libelle'])) 
			{
				$n="* champs incorrect, Libelle commence par une majiscule";
				$err=1;
			 }
	 
	   elseif(isset($_POST['mise_max'])&&!preg_match("/[0-9]+/",$_POST['max'])) 
			{
				$p="* champs incorrect";
				$err=1;
			 }
		
	      elseif (isset($_POST['date_debut'])&&!preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/",$_POST['date_debut'])) 
			{
				$dd="* doit être une date valide : aaaa-mm-jj hh-mm-ss";
				$err=1;
			 }
			 elseif (isset($_POST['date_fin'])&&!preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/",$_POST['date_fin'])) 
			{
				$df="* doit être une date valide : aaaa-mm-jj hh-mm-ss";
				$err=1;
			 }
		
		 
	  
		
	?>
	
	<form> 
     <td><p><?php echo $_POST['ide']  ?></p></td> 
	 <td><input type="text" class="in_put" name="libelle" value="<?php if(isset($_POST['libelle'])) echo $_POST['libelle']; //else  //echo $row->libelle; ?>"><?php echo $n ;?></td> 
	 <td><input type="text" class="in_put" name="date_debut" value="<?php if(isset($_POST['date_debut'])) echo $_POST['date_debut'];// else  echo $row->date_debut; ?>"><?php echo $dd ;?></td> 
	 <td><input type="text" class="in_put" name="date_fin" value="<?php if(isset($_POST['date_fin'])) echo $_POST['date_fin'];// else  echo $row->date_fin; ?>"><?php echo $df ;?></td> 
	 <td><input type="text" class="in_put" name="mise_max" value="<?php if(isset($_POST['max_mise'])) echo $_POST['max_mise'];// else  echo $row->max_mise; ?>"><?php echo $p ;?></td> 
	 <td><input type="text" class="in_put" name="etat" value="<?php if(isset($_POST['etat'])) echo $_POST['etat'];// else  echo $row->etat; ?>"></td> 
	 <td><input type="submit" class="ench_mod" id="ok" name="valider"><input  class="ench_mod" type="submit" name="annuler" value="annuler"></td> 
	</form>
<?php

			
	}

if(isset($_POST['annuler']) && $err==0){
				echo "HELLO MUNDO";
			}

?>