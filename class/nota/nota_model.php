<?php 

/**
 * 
 */
class nota_model 
{
	
	var $objDbClass;
	function __construct()
	{
		$this->objDbClass = new dbClass();
	}

	public function setCloseDb() {
		$this->objDbClass->db_close();
	}

	public function getNota($idUsuario) {
		$strQuery = "SELECT *
					 FROM nota
					 WHERE usuario = {$idUsuario}
					 ORDER BY create_at asc";
		$arr = array();
		$qTMP = $this->objDbClass->db_consulta($strQuery);
		while ($rTMP = $this->objDbClass->db_fetch_array($qTMP)) {
			$arr[$rTMP["id"]]["id"] = $rTMP["id"];
			$arr[$rTMP["id"]]["titulo"] = $rTMP["titulo"];
			$arr[$rTMP["id"]]["description"] = $rTMP["description"];
			$arr[$rTMP["id"]]["create_at"] = $rTMP["create_at"];
		}

		$this->objDbClass->db_free_result($qTMP);
		return $arr;

	}

	public function getNotaId($intId) {
		$strQuery = "SELECT *
					 FROM nota
					 WHERE id = {$intId}";
		$arr = array();
		$qTMP = $this->objDbClass->db_consulta($strQuery);
		$arr = $this->objDbClass->db_fetch_array($qTMP);
		//drawdebug($arr);
		$this->objDbClass->db_free_result($qTMP);
		return $arr;

	}

	public function newNote($intUsuario , $strTitulo , $strDescripcion){
		$strQuery = "INSERT INTO nota (usuario , titulo , description)
					 VALUES ({$intUsuario} , '{$strTitulo}' , '{$strDescripcion}')";
		//drawdebug($strQuery);
		$this->objDbClass->db_consulta($strQuery);
	}

	public function updateNote($intId , $strTitulo , $strDescripcion){
		$strQuery = "UPDATE nota 
					 SET titulo = '{$strTitulo}' ,
					 	 description = '{$strDescripcion}'
					 WHERE id = {$intId}"; 
		$this->objDbClass->db_consulta($strQuery);
	}

	public function deletedNote($intId){
		$strQuery = "DELETE FROM nota 
					 WHERE id = {$intId}";
					 drawdebug($strQuery);
		$this->objDbClass->db_consulta($strQuery);		 
	}
}

 ?>