<?php 

	require_once "sigup_model.php";
	require_once "sigup_view.php";

	/**
	 * 
	 */
	class sigup_controller 
	{
		
		var $objModel;
		var $objView;

		function __construct()
		{
			$this->objModel = new sigup_model();
			$this->objView = new sigup_view();
		}

		public function drawContentPage($strAction){
			$this->objView->ftnContentPage($strAction);
		}

		public function getAjax($strAction){

			if (isset($_GET["sigup"])) {
				$strName = isset($_POST["name"]) ? trim($_POST["name"]) : "";
				$strUserName = isset($_POST["username"]) ? trim($_POST["username"]) : "";
				$strPass = isset($_POST["pass"]) ? trim($_POST["pass"]) : "";
				$strConfirm = isset($_POST["confirm"]) ? trim($_POST["confirm"]) : "";

				if ( !empty($strName) && !empty("$strPass") && !empty($strConfirm && !empty($strUserName)) ) {
					if ( $strPass != $strConfirm ) {
						$arr["err"] = "true";        
		       			$arr["msn"] = "No hay concidencias";
					} else {
					    $this->objModel->sigup($strName , $strUserName, $strPass);
						$arr["err"] = "false";        
		        		$arr["msn"] = "register Successfully";  
					}
				} else {
					$arr["err"] = "true";        
		       		$arr["msn"] = "Incorrect data";
				}

				//drawdebug($arr);

				print json_encode($arr);
				die();
			}			
		}
	}
 ?>