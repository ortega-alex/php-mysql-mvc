<?php 

	require_once "login_model.php";
	/**
	 * 
	 */
	class Login_view 
	{
		var $objModel;
		function __construct()
		{
			$this->objModel = new login_model();
		}

		public function fntContentPage($strAction) {

?>
		<div class="container">
			<div class="row">
				<div class="col-md-4 mx-auto">
					<div class="card">
						<div class="cardHeader text-center">
							<h1>Account Login</h1>
						</div>
						<img src="./Public/img/php.jpg" alt="Logo" class="rounded-circle mx-auto d-block m-3 logo">
						<div class="card-body">			
							<form class="form-horizontal form-material" method="POST" id="loginform" onsubmit="return false">
								<div class="form-group">
									<label for="username" class="label-control">Username:</label>
									<input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus required>
								</div>						
								<div class="form-group">
									<label for="pass" class="label-control">Password:</label>
									<input type="Password" class="form-control" id="pass" name="pass" placeholder="Password" required>
								</div>
								<div class="form-group text-center">									
									<button class="btn btn-info btn-lg" onclick="fntRedirec()">
										SigUp
									</button> 
									<button class="btn btn-success btn-lg" onclick="fntSubmit()">
										SigIn
									</button>
								</div>
							</form>
						</div>
					</div>
	 			</div>
			    <!-- /.content-wrapper -->
	        </div>	
	    </div>    	

		<script>
			function fntSubmit() {

				$.ajax({
					url: "<?php print $strAction ?>?login=true",
					type: "POST",
					dataType: "json",
					data: $("#loginform").serialize(),
					success: function(result){
						if (result.err == "false") {
							swal({   
                                title: "Success",   
                                text: result.msn,   
                                type: "success",
                                confirmButtonColor: "#DD6B55"   
                            },
							function(isConfirm) {
							  if (isConfirm) {
							   	  location.href = 'index.php'; 
							  }
							});  
						} else {
							swal({   
                                title: "warning",   
                                text: result.msn,   
                                type: "warning",
                                confirmButtonColor: "#DD6B55"  
                            }); 
						}	
                                         
					} ,
					error: function (xhr, ajaxOptions, thrownError){   
                        swal({   
                            title: "Error",   
                            text: thrownError,   
                            type: "error",
                            confirmButtonColor: "#DD6B55"   
                        });
                    }
				});
			}

			function fntRedirec(){
				location.href = "sigup.php";
			}
		</script>

		</body>
		</html>
<?php
		}
	}

 ?>