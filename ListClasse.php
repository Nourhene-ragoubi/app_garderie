<?php
include('Modele/Classe.php');
$e  = new Classe();
$res = $e->getAllClasse();
if(isset($_GET['action']) & $_GET['action']=='delete'){
$result = $e->deleteClasse($_GET['idd']);
if($result){
	header('Location:ListClasse.php?msg=3');
}
}

 include("header.php");
 ?>
<!-- Data table css -->
		<link href="assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<!-- Data table js -->
		<script>
			$(function(e) {
				$('#example').DataTable();
			} );
		</script>
<!-- Data tables -->
		<script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gesion Classe</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Classe</a></li>
								<li class="breadcrumb-item active" aria-current="page">Liste Classe</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Liste Classe</div>
									</div>
									<div class="card-body">
									
										<div class="table-responsive">
										<?php  if(isset($_GET['msg']) & $_GET['msg']=='1'){ ?>
										<div class="alert alert-success" role="alert">
											Ajout de la classe effectuée avec succée
											<button class="close" aria-label="Close" type="button" data-dismiss="alert">
												<span aria-hidden="true">×</span>
											</button>
										</div>
									<?php } ?>
									<?php  if(isset($_GET['msg']) & $_GET['msg']=='2'){ ?>
										<div class="alert alert-success" role="alert">
											Modification de la classe effectuée avec succée
											<button class="close" aria-label="Close" type="button" data-dismiss="alert">
												<span aria-hidden="true">×</span>
											</button>
										</div>
									<?php } ?>
									<?php  if(isset($_GET['msg']) & $_GET['msg']=='3'){ ?>
										<div class="alert alert-success" role="alert">
											Suppression de la classe effectuée avec succée
											<button class="close" aria-label="Close" type="button" data-dismiss="alert">
												<span aria-hidden="true">×</span>
											</button>
										</div>
									<?php } ?>
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
													<tr class="border-bottom-0">
														<th class="wd-15p">Niveau</th>
														<th class="wd-15p">Enseignant</th>
													
														<th class="wd-25p">Action</th>
													</tr>
												</thead>
												<tbody>
													
													<?php  foreach($res as $r){ ?>
                <tr>
				
                  <td><?php  echo $r['niveau']; ?></td>
                 
                  
				<td><?php  echo $r['nomEnseignant'].' '.$r['prenomEnseignant']; ?></td>
				  <td><span class="label label-success"></span>
                 <a href="EditClasse.php?idd=<?php  echo $r['niveau']; ?>"><button type="button" class="btn btn-icon btn-warning"><i class="fa fa-pencil-square-o"></i></button></a>
				     <a href="ListClasse.php?idd=<?php  echo $r['niveau']; ?>&action=delete"><button type="button" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a></td>
                
				
				</tr>
				
                <?php  } ?> 
													</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
													<?php
include('footer.php');?>