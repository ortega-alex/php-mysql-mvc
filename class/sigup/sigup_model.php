<?php 

	/**
	 * 
	 */
	class sigup_model 
	{
		
		var $objDbClass;
		function __construct()
		{
			$this->objDbClass = new dbClass();
		}

		public function setClosetDb(){
			$this->objDbClass->dn_close();
		}

		public function sigup($strName , $strUserName , $strPass ){
			$strQuery = "INSERT INTO usuario (name , username , password)
						 VALUES( '{$strName}' , '{$strUserName}' , '{$strPass}' )";

			//drawdebug($strQuery);
			//die();
			$this->objDbClass->db_consulta($strQuery);
		}
	}

 ?>