<?php

	$strAction = basename($_SERVER["PHP_SELF"]);;
	include "core/core.php";    
	
	//drawdebug(!isset($_SESSION["core"]["login"]));
	//drawdebug(isset($_SESSION["core"]["login"]));

	if( !isset($_SESSION["core"]["login"]) ){
	    
	     header('Location: login.php');
	     ?>
		     <script>
		        location.href = 'login.php';
		     </script>
	     <?php	    
	}

	fntDrawHeaderPage();

	fntDrawHeaderContenido("Bienvenido", $strAction);
	
	
	fntDrawFooterPage();

?>


