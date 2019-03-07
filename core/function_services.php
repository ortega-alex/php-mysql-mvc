<?php 

	function drawdebug($strContent = ""){
	    if($strContent == "" || $strContent == null || $strContent == false){
	        var_dump($strContent);
	    }
	    else{
	        print_r("<pre style='text-align: left!important'>\r\r");
	        print_r($strContent);
	        print_r("\r\r</pre>");
	    }
	}

 ?>