<?php       

$strAction = basename($_SERVER["PHP_SELF"]);
include "./core/core.php"; 
include "./class/login/login_controller.php";


//drawdebug($_SESSION);

$objController = new login_controller();

$objController->getAjax($strAction);

fntDrawHeaderPage();

	?>
		
		<div class="container">
			<div class="row mt-4">
				<div class="col-md-4 mx-auto">
	<?php

					$objController->drawContentPage($strAction);

	?>
	 			</div>
			    <!-- /.content-wrapper -->
	        </div>
		</body>
		</html>
	<?php
                                  
?>