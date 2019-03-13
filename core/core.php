<?php 

	include "function_services.php";
	include "dbClass.php";

	session_start();

	function fntDrawHeaderPage() {
?>

			<!DOCTYPE html>
				<html lang="en">
				<head>
				    <meta charset="UTF-8">
				    <meta name="viewport" content="width=device-width, initial-scale=1.0">
				    <meta http-equiv="X-UA-Compatible" content="ie=edge">
				    <title>Php</title>

				    <!-- Custom fonts for this template-->
				    <!--link href="Public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"-->
				    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

				    <!-- Page level plugin CSS-->
				    <link href="Public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

				    <!-- Custom styles for this template-->
				    <link href="Public/css/sb-admin.css" rel="stylesheet">
				    
				    <!--Sweet Alert-->
				    <link href="Public/bootstrap-sweetalert/dist/sweetalert.css" rel="stylesheet" />

				    <!-- Bootstrap core JavaScript-->
				    <script src="Public/vendor/jquery/jquery.min.js"></script>
				    <script src="Public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

				    <!-- Core plugin JavaScript-->
				    <script src="Public/vendor/jquery-easing/jquery.easing.min.js"></script>

				    <!-- Page level plugin JavaScript-->
				    <script src="Public/vendor/chart.js/Chart.min.js"></script>
				    <script src="Public/vendor/datatables/jquery.dataTables.js"></script>
				    <script src="Public/vendor/datatables/dataTables.bootstrap4.js"></script>

				    <!-- Custom scripts for all pages-->
				    <script src="Public/js/sb-admin.min.js"></script>

				    <!-- Demo scripts for this page-->
				    <script src="Public/js/demo/datatables-demo.js"></script>
				    <script src="Public/js/demo/chart-area-demo.js"></script>

				     <!--Sweet Alert javascript-->
				    <script src="Public/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
				</head>				
<?php 
	}
	
	function fntDrawHeaderContenido($strNombrePagina, $strAction) {
?>
			<body id="page-top">
			        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

			            <a class="navbar-brand mr-1" href="#">Php</a>

			            <a class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
			                <i class="fas fa-bars"></i>
			            </a>

			            <!-- Navbar -->
			            <ul class="navbar-nav ml-auto pl-4">
			                <li class="nav-item dropdown no-arrow mx-1">
			                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                        <i class="fas fa-bell fa-fw"></i>
			                        <span class="badge badge-danger">9+</span>
			                    </a>
			                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
			                        <a class="dropdown-item" href="#">Action</a>
			                        <a class="dropdown-item" href="#">Another action</a>
			                        <div class="dropdown-divider"></div>
			                        <a class="dropdown-item" href="#">Something else here</a>
			                    </div>
			                </li>
			                <li class="nav-item dropdown no-arrow mx-1">
			                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                        <i class="fas fa-envelope fa-fw"></i>
			                        <span class="badge badge-danger">7</span>
			                    </a>
			                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
			                        <a class="dropdown-item" href="#">Action</a>
			                        <a class="dropdown-item" href="#">Another action</a>
			                        <div class="dropdown-divider"></div>
			                        <a class="dropdown-item" href="#">Something else here</a>
			                    </div>
			                </li>
			                <li class="nav-item">
			                    <a class="nav-link" href="javascript:void()" onclick="fntLogOut();">
			                        <i class="fa fa-fw fa-sign-in-alt"> Salir </i>
			                    </a>
			                </li>
			            </ul>

			        </nav>

			        <div id="wrapper">

			            <!-- Sidebar -->
			            <ul class="sidebar navbar-nav">
			                <li class="nav-item active">
			                    <a class="nav-link" href="#">
			                        <i class="fas fa-fw fa-address-book"></i>
			                        <span>Posibles Clientes</span>
			                    </a>
			                </li>
			                <li class="nav-item active">
			                    <a class="nav-link" href="#">
			                        <i class="fas fa-fw fa-book"></i>
			                        <span>Contactos</span>
			                    </a>
			                </li>

			            </ul>

			            <div id="content-wrapper">
			                <!-- contenido -->
			                <div class="container-fluid">
			                	<h3> <?php print $strNombrePagina;?> </h3>
<?php
	}


	function fntDrawFooterPage() {
?> 

							</div>
			                <!-- /.container-fluid -->

			                <!-- Sticky Footer -->
			                <footer class="sticky-footer">
			                    <div class="container my-auto">
			                        <div class="copyright text-center my-auto">
			                            <span>Copyright © Your Website 2019</span>
			                        </div>
			                    </div>
			                </footer>

			            </div>
			            <!-- /.content-wrapper -->

			        </div>

			             <script>            
				            function fntLogOut(){				                
				                location.href = 'login.php?logout=true';				                
				            }				            
				        </script>
			</body>
			</html>
<?php
	}
 ?>