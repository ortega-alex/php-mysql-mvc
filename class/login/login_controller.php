<?php 

	require_once "login_model.php";
	require_once "login_view.php";

	/**
	 * 
	 */
	class login_controller
	{
		
		var $objModel;
		var $objView;

		function __construct()
		{
			$this->objModel = new login_model();
			$this->objView = new login_view();
		}

		public function drawContentPage($strAction) {
			$this->objView->fntContentPage($strAction);
		}

		public function getAjax($strAction){			
			

			if (isset($_GET["login"])) {	
				$strUsername = isset($_POST["username"]) ? trim($_POST["username"]) : "";
				$strPass = isset($_POST["pass"]) ? trim($_POST["pass"]) : "";	

				$arr = $this->objModel->login($strUsername , $strPass);
				//drawdebug($arr);
				print json_encode($arr);
				die();
			} 

			if (isset($_GET["logout"])) {
				session_destroy();

				 header('Location: login.php');
			     ?>
				     <script>
				        location.href = 'login.php';
				     </script>
			     <?php	
				die();
			}
		}
	}
	
 ?>