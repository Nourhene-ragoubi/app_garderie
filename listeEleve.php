<?php
include('Modele/Eleve.php');
$e  = new Eleve();
$res = $e->getAllEleve();
if(isset($_GET['action']) & $_GET['action']=='delete'){
$result = $e->deleteEleve($_GET['idd']);
if($result){
	header('Location:listeEleve.php?msg=3');
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
							<h4 class="page-title">Gestion Eléve</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Eléve</a></li>
								<li class="breadcrumb-item active" aria-current="page">Liste Eléve</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Liste Eléve</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
										<?php if(isset($_GET['msg']) & $_GET['msg']=='1') { ?>
											<div class="alert alert-success" role="alert">
												<strong>Ajout élève effectuée avec sucée.</strong>
											</div>
											<?php  } ?>
											
											<?php if(isset($_GET['msg']) & $_GET['msg']=='2') { ?>
											<div class="alert alert-success" role="alert">
												<strong>Modification élève effectuée avec sucée.</strong>
											</div>
											<?php  } ?>
											<?php if(isset($_GET['msg']) & $_GET['msg']=='3') { ?>
											<div class="alert alert-success" role="alert">
												<strong>Suppression élève effectuée avec sucée.</strong>
												
											</div>
											<?php  } ?>
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
													<tr class="border-bottom-0">
														
														<th class="wd-15p">Nom</th>
														<th class="wd-20p">Prénom</th>														
														<th class="wd-25p">Parent</th>
														<th class="wd-25p">Date de naissance</th>
														<th class="wd-25p">Etat de santé</th>
														
														<th class="wd-25p">Matieres à réviser</th>
														<th class="wd-25p">Ecole</th>
														<th class="wd-25p">Action</th>
													</tr>
												</thead>
												<tbody>
													
													<?php  foreach($res as $r){ ?>
                <tr>
				
                  
                  <td><?php  echo $r['nom']; ?></td>
                  <td><?php  echo $r['prenom']; ?></td> 
				  <td><?php  echo $r['cinParent']; ?></td>
				   <td><?php  echo $r['dateNaissance']; ?></td>
				  <td><?php  echo $r['etatSante']; ?></td>
				 
	             <td><?php  echo $r['matieres']; ?></td>
				   <td><?php  echo $r['ecole']; ?></td>
                  <td width="150"><span class="label label-success"></span>
                   <a href="editeEleve.php?idd=<?php  echo $r['code']; ?>"><button type="button" class="btn btn-icon btn-warning"><i class="fa fa-pencil-square-o"></i></button></a>
				     <a href="listeEleve.php?idd=<?php  echo $r['code']; ?>&action=delete"><button type="button" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a></td>
                
				
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