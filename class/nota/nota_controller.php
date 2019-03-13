<?php 

	require_once "nota_model.php";
	require_once "nota_view.php";

	/**
	 * 
	 */
	class nota_controller
	{
		var $objView;
		var $objModel;
		function __construct()
		{
			$this->objModel = new nota_model();
			$this->objView = new nota_view();
		}

		public function drawContentPage($strAction){
			$strUsuario = $_SESSION["core"]["id"];	
			$arr =  $this->getNotas($strUsuario);
			$this->objView->ftnContentPage($strAction , $arr);
		}

		public function getNotas($strUsuario){
			//drawdebug("entra");
			$arr["error"] = "false";
    		$arr["msn"] = "";
			$idUsuario = isset($strUsuario) ? intval($strUsuario) : 0;
			if ($idUsuario == 0 ) {
				$arr["error"] = "false";
    			$arr["msn"] = "Incorrect data";
				return $arr;
			} else {				
				$arr["notas"] = $this->objModel->getNota($idUsuario);
				//drawdebug($arr);	
				return $arr;
			}

			die();		
		}

		public function getAjax($strAction){

			if (isset($_GET["getFormNewNote"])) {

				$intId = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
				if ( $intId == 0 ) {
					$this->objView->newNote($strAction);
				} else {
					$arr = $this->objModel->getNotaId($intId);
					$this->objView->newNote($strAction , $arr);
				}				
				die();
			}

			if (isset($_GET["newNote"])) {

				$intId = isset($_POST["id"]) ? intval($_POST["id"]) : 0;
				$intUsuario = intval($_SESSION["core"]["id"]);
				$strTitulo = isset($_POST["title"]) ? trim($_POST["title"]) : "";
				$strDescription = isset($_POST["description"]) ? trim($_POST["description"]) : "";

				if (!empty($strTitulo) && !empty($strDescription)) {
					if ( $intId == 0 ) {
						$this->objModel->newNote($intUsuario , $strTitulo , $strDescription);	
					} else {
						$this->objModel->updateNote($intId , $strTitulo , $strDescription);	
					}					
					$arr["err"] = "false";
    				$arr["msn"] = "Note created successfully";
				} else {
					$arr["err"] = "true";
    				$arr["msn"] = "Incorrect data";
				}
				print json_encode($arr);
				die();
			}

			if (isset($_GET["deleteNote"])) {
				$intId = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
				if ($intId != 0) {
					$this->objModel->deletedNote($intId);
				}
				die();
			}
		}
	}

 ?>