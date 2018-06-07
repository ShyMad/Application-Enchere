<?php

$form="<form action='' methode='post'>
		<label for='username'>User Name : </label>
		<input type='text' name='username' value='".if (isset($_POST['nom'])) echo $_POST['nom']."' >
	
	  </form>"


?>