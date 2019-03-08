<?php       

$strAction = basename($_SERVER["PHP_SELF"]);
include "./core/core.php"; 
include "./class/login/login_controller.php";


//drawdebug($_SESSION);

$objController = new login_controller();

$objController->getAjax($strAction);

	fntDrawHeaderPage();
	$objController->drawContentPage($strAction);
                                  
?>