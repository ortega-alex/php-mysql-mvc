<?php 

	//require_once "nota_model.php";

	/**
	 * 
	 */
	class nota_view 
	{
		//var $objModel;
		function __construct()
		{
			//$this->objModel = new nota_model();
		}

		public function ftnContentPage($strAction , $arr) {
			?>
				<div class="container" id="divBody">
					<div class="row">
						<div class="col-md-6">
							<h1 class="h3">Notas</h1>
						</div>					
						<div class="col-md-6 text-right">
							<button class="btn btn-info btn-sm" onclick="ftnGetFormNewNote(0)">
								<i class="fas fa-plus"></i>	New						
							</button>
						</div>	
					</div>
					<div class="table-responsive table-hover">
                        <table class="table table-sm">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Description</th>
									<th>Creation date</th>
									<th>Options</th>
								</tr>
							</thead>
							<tbody>
								<?php 

									 if( isset($arr["notas"]) && is_array($arr["notas"]) && count($arr["notas"]) > 0 ){
                                    	
									 	$index = 1;
									 	foreach ($arr["notas"] as $key=>$nota ) {

                                            ?>
                                            <tr>
                                                <td><?php print $index?></td>
                                                <td><?php print $nota["titulo"]?></td>
                                                <td><?php print $nota["description"]?></td>
                                                <td><?php print $nota["create_at"]?></td>
                                                <td nowrap>
                                                	<button class="btn btn-warning btn-sm" onclick="ftnGetFormNewNote(<?php print $nota["id"]?>)">
                                                		<i class="far fa-edit"></i>
                                                		Edit
                                                	</button>
                                                	<button class="btn btn-danger btn-sm" onclick="ftnDeleteNote(<?php print $nota["id"]?>)">
                                                		<i class="fas fa-trash-alt"></i>
                                                		Delete
                                                	</button>
                                                </td>
                                            </tr>
                                            <?php
                                             $index++;
                                        }                                       
                                    } 
								 ?>
							</tbody>
						</table>
					</div>
				</div>	
				<script>
					function ftnGetFormNewNote(intId){
						$.ajax({
							url: "<?php print $strAction?>?getFormNewNote=true&id=" + intId,
							success: function(result) {
								$("#divBody").html(result);
							} 
						});
					}

					function ftnDeleteNote(intId) {
							swal({   
                                title: "Warnng",   
                                text: "Are sure?",   
                                type: "warning",
                                confirmButtonColor: "#DD6B55"   
                            },
							function(isConfirm) {
							  	if (isConfirm) {
							   	  	$.ajax({
							   	  		url: "<?php print $strAction?>?deleteNote=true&id=" + intId,
							   	  		success: function (result) {							   	  			
			                                location.href = 'index.php';   
							   	  		}
							   	  	}); 
							  	}
							});
					}
				</script>
			<?php
		}


		public function newNote($strAction , $arr = null){
			?>
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="cord">
							<div class="card-header">
								New Note
							</div>
							<div class="card-body">
								<form class="form-horizontal form-control-sm" role="form" id="frmNewNote" method="POST" onsubmit="return false">
									<input type="hidden" id="id" name="id" value="<?php isset($arr) ? print $arr['id'] : 0 ; ?>">
									<div class="form-group">
										<label for="titulo">Title:</label>
										<input type="text" class="form-control" placeholder="Title" id="title" name="title" onfocus required value="<?php isset($arr) ? print $arr['titulo'] : '' ; ?>">
									</div>
									<div class="form-group">
										<label for="titulo">Description:</label>
										<input type="text" class="form-control" placeholder="Description" id="description" name="description" required value="<?php isset($arr) ? print $arr['description'] : '' ; ?>">
									</div>
									<div class="form-group text-center">										
										<button class="btn btn-success btn-sm" onclick="ftnNewNote()">
											Save											
											<i class="far fa-check-circle"></i>
										</button>						
										<button class="btn btn-danger btn-sm" onclick="location.href = 'index.php'">
											<i class="fas fa-ban"></i>
											Cancel
										</button>				
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<script>
					function ftnNewNote() {
						$.ajax({
							url: "<?php print $strAction?>?newNote=true",
							type: "POST" ,
							dataType: "json",
							data: $("#frmNewNote").serialize(),
							success: function(result) {
								if (result.err == "false") {
									swal({   
		                                title: "Success",   
		                                text: "",   
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
							} 
						});
					}
	
				</script>
			<?php
		}
	}

 ?>