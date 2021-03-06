<?php
include('Modele/Enseignant.php');
$e  = new Enseignant();
$res = $e->getAllEnseignant();
if(isset($_GET['action']) & $_GET['action']=='delete'){
$result = $e->deleteEnseignant($_GET['idd']);
if($result){
	header('Location:listeEnseignant.php?msg=3');
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
							<h4 class="page-title">Gestion Enseignant</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Ensiegnant</a></li>
								<li class="breadcrumb-item active" aria-current="page">Liste Enseignant</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Liste Enseignant</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<?php if(isset($_GET['msg']) & $_GET['msg']=='1') { ?>
											<div class="alert alert-success" role="alert">
												<strong>Ajout de l'enseignant effectuée avec sucée.</strong>
											</div>
											<?php  } ?>
											
											<?php if(isset($_GET['msg']) & $_GET['msg']=='2') { ?>
											<div class="alert alert-success" role="alert">
												<strong>Modification de l'enseignant effectuée avec sucée.</strong>
											</div>
											<?php  } ?>
											<?php if(isset($_GET['msg']) & $_GET['msg']=='3') { ?>
											<div class="alert alert-success" role="alert">
												<strong>Suppression de l'enseignant effectuée avec sucée.</strong>
												
											</div>
											<?php  } ?>
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
													<tr class="border-bottom-0">
														<th class="wd-15p">Cin</th>
														<th class="wd-15p">Nom</th>
														<th class="wd-20p">Prénom</th>
														<th class="wd-20p">Email</th>
														
														<th class="wd-10p">Téléphone</th>
														<th class="wd-15p">Adresse</th>
													    <th class="wd-25p">Action</th>
													</tr>
												</thead>
												<tbody>
													
												<?php  foreach($res as $r){ ?>
													<tr>
													
													  <td><?php  echo $r['cinEnseignant']; ?></td>
													  <td><?php  echo $r['nomEnseignant']; ?></td>
													  <td><?php  echo $r['prenomEnseignant']; ?></td>
														<td><?php  echo $r['emailEnseignant']; ?></td>
													  <td><?php  echo $r['telephoneEnseignant']; ?></td>
														<td><?php  echo $r['adresseEnseignant']; ?></td>
													
													  <td><span class="label label-success"></span>
													  
					 <a href="EditEnseignant.php?idd=<?php  echo $r['cinEnseignant']; ?>"><button type="button" class="btn btn-icon btn-warning"><i class="fa fa-pencil-square-o"></i></button></a>
				     <a href="listeEnseignant.php?idd=<?php  echo $r['cinEnseignant']; ?>&action=delete"><button type="button" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a></td>
													
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