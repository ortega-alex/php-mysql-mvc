<?php 

	require_once "sigup_model.php";

	/**
	 * 
	 */
	class sigup_view 
	{
		
		var $objModel;
		function __construct()
		{
			$this->objModel = new sigup_model();
		}

		public function ftnContentPage($strAction){
?>
			<div class="container">
				<div class="row">
					<div class="col-md-4 mx-auto">
						<div class="card">
							<div class="card-header text-center">
								<h1>sigup</h1>
							</div>
							<div class="card-body">
								<form id="formRegister" class="horizontal" method="POST" onsubmit="return false">
									<div class="form-group">
										<label for="name">Name:</label>
										<input type="text" class="form-control" placeholder="Name" id="name" name="name" required autofocus>
									</div>
									<div class="form-group">
										<label for="username" class="label-control">Username:</label>
										<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
									</div>		
									<div class="form-group">
										<label for="pass">Password:</label>
										<input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required>
									</div>
									<div class="form-group">
										<label for="confirm">Confirm Password:</label>
										<input type="password" class="form-control" placeholder="Confirm Password" id="confirm" name="confirm" required>
									</div>
									<div class="form-group text-center">
										<button class="btn btn-danger" onclick="ftnRedirec()">
											Cancel
										</button>
										<button class="btn btn-success" onclick="ftnSigup()">
											SigUp
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
	
			<script>
				function ftnRedirec(){
					location.href = "login.php";
				}

				function ftnSigup(){
					//console.log($("#formRegister").serialize());
					$.ajax({
						url: "<?php print $strAction ?>?sigup=true",
						type: "POST",
						dataType: "json",
						data: $("#formRegister").serialize(),
						success: function(result) {
							console.log(result);
							if (result.err == "false") {
								swal({   
	                                title: "Success",   
	                                text: result.msn,   
	                                type: "success",
	                                confirmButtonColor: "#DD6B55"   
	                            },
								function(isConfirm) {
								  if (isConfirm) {
								   	  location.href = 'login.php'; 
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
			</script>

			</body>
			</html>
<?php
		}
	}
?>