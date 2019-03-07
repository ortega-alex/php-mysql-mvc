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
			
					<form class="form-horizontal form-material" method="POST" id="loginform" onsubmit="return false">
						<div class="form-group">
							<label for="username" class="label-control">Username:</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus required>
						</div>						
						<div class="form-group">
							<label for="pass" class="label-control">Password:</label>
							<input type="Password" class="form-control" id="pass" name="pass" placeholder="Password" required>
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-blok btn-lg" onclick="fntSubmit()">
								Enviar
							</button>
						</div>
					</form>

			<script>
				function fntSubmit() {

					$.ajax({
						url: "<?php print $strAction ?>?login=true",
						type: "POST",
						dataType: "json",
						data: $("#loginform").serialize(),
						success: function(result){

							//var res = json(result);
							//console.log(res);
							if (result.err == "false") {
								swal({   
	                                title: "Success",   
	                                text: result.msn,   
	                                type: "success",
	                                confirmButtonColor: "#DD6B55"   
	                            });                           
	                            
	                            location.href = 'index.php'; 
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
	                            type: "danger",
	                            confirmButtonColor: "#DD6B55"   
	                        });
	                    }
					});
				}
			</script>
<?php
		}
	}

 ?>