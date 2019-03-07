<?php 

	/**
	 * 
	 */
	class login_model {
		
		var $objDbClass;
		function __construct()
		{
			$this->objDbClass = new dbClass();
		}

		public function setCloseDb(){
			$this->objDbClass->db_close();
		}

		public function login($strUsername , $strPass){
			if (!empty($strUsername) && !empty($strPass)) {

				$strQuery = "SELECT *
							 FROM usuario
							 WHERE username = '{$strUsername}'
							 AND password = '{$strPass}'";
				
				$qTMP = $this->objDbClass->db_consulta($strQuery);
				$rTMP = $this->objDbClass->db_fetch_array($qTMP);
				
				if ( isset($rTMP) ) {	

					$_SESSION["core"]["login"] = true;
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
			//drawdebug($arr);
			return $arr;    
		}
	}
 ?>