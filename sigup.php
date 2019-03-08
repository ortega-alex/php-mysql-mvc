<?php 

	$strAction = basename($_SERVER["PHP_SELF"]);
	include "./core/core.php";
	include "./class/sigup/sigup_controller.php";

	$objController = new sigup_controller();
	$objController->getAjax($strAction);

	fntDrawHeaderPage();
	$objController->drawContentPage($strAction);
	
?>
