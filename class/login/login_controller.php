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

				if (!empty($strUsername) && !empty($strPass)) {

					$rTMP = $this->objModel->login($strUsername , $strPass);
					//drawdebug($rTMP);
					//die();

					if ( sizeof($rTMP) > 0 ) {	
						$_SESSION["core"]["login"] = true;
						$_SESSION["core"]["name"] = $rTMP["name"];
						$_SESSION["core"]["username"] = $rTMP["username"];
						$_SESSION["core"]["id"] = $rTMP["id"];	

						$arr["err"] = "false";        
			        	$arr["msn"] = "Login Successfully";  
						
					} else {					
						$arr["err"] = "true";         
			            $arr["msn"] = "Incorrect username or password.";
					}
				} else {
					$arr["err"] = "true";        
			        $arr["msn"] = "Incorrect data";       
				}

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