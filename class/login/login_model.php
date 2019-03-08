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
			$strQuery = "SELECT *
						 FROM usuario
						 WHERE username = '{$strUsername}'
						 AND password = '{$strPass}'";
			
			$arrReturn = array();
			$qTMP = $this->objDbClass->db_consulta($strQuery);
			
		 	while( $rTMP = $this->objDbClass->db_fetch_array($qTMP) ){
		 		//drawdebug( $rTMP );
	            $arrReturn["id"] = $rTMP["id"];
	            $arrReturn["name"] = $rTMP["name"];
	            $arrReturn["username"] = $rTMP["username"];
	        }


			$this->objDbClass->db_free_result($qTMP);
			
			//drawdebug($arr);
			return $arrReturn;    
		}
	}
 ?>