<?php

	$strAction = basename($_SERVER["PHP_SELF"]);;
	include "core/core.php";    
	include "class/nota/nota_controller.php";
	
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


	$objController = new nota_controller();
	$objController->getAjax($strAction);

	fntDrawHeaderPage();
	fntDrawHeaderContenido("Bienvenido", $strAction);

	$objController->drawContentPage($strAction );

	fntDrawFooterPage();

?>


