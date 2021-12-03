<?php
include('Modele/Inscription.php');
$e  = new Inscription();
$res = $e->getAllInscription();
if(isset($_GET['action']) & $_GET['action']=='delete'){
$result = $e->deleteInscription($_GET['idd']);
if($result){
	header('Location:ListInscription.php');
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
							<h4 class="page-title">Gestion Inscription</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Inscription</a></li>
								<li class="breadcrumb-item active" aria-current="page">Gestion Inscription</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Gestion Inscription</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
													<tr class="border-bottom-0">
														
														<th class="wd-15p">Année Scolaire</th>
														<th class="wd-20p">eleve</th>														
														<th class="wd-25p">classe</th>
														<th class="wd-25p">Action</th>
													</tr>
												</thead>
												<tbody>
													
													<?php  foreach($res as $r){ ?>
                <tr>
				
                  
                  <td><?php  echo $r['anneeScolaire']; ?></td>
                 
				  <td><?php  echo $r['nom'].' '.$r['prenom'].' '.$r['parentCin']; ?></td>
				 <td><?php  echo $r['niveau']; ?></td> 
                  <td width="150"><span class="label label-success"></span>
                  
				    
				     <a href="ListInscription.php?idd=<?php  echo $r['codeInscription']; ?>&action=delete"><button type="button" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
					<a href="AjouterPaimentInscription.php?code=<?php  echo $r['eleve_code']; ?>&classe=<?php  echo $r['classe_niveau']; ?>&anneeScolaire=<?php  echo $r['anneeScolaire']; ?>&montant=<?php  echo $r['montantInscription']; ?>"><button type="button" class="btn btn-icon btn-default"><img src="assets\images\p.jpg"></td>
				
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