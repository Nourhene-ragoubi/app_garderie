<?php
include('Modele/InscriptionEvent.php');
$e  = new InscriptionEvent();
$res = $e->getAllInscriptionEvent();
if(isset($_GET['action']) & $_GET['action']=='delete'){
$result = $e->deleteInscriptionEvent($_GET['idd']);
if($result){
	header('Location:ListInscriptionEvent.php');
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
							<h4 class="page-title">Gestion Inscription Evenement</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Inscription Evenement</a></li>
								<li class="breadcrumb-item active" aria-current="page">List Inscription Evenement</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">List Inscription Evenement</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
													<tr class="border-bottom-0">
														<th class="wd-15p">Code</th>
														<th class="wd-15p">evenement</th>
														<th class="wd-20p">eleve</th>														
														<th class="wd-20p">date</th>
														<th class="wd-25p">Action</th>
													</tr>
												</thead>
												<tbody>
													
													<?php  foreach($res as $r){ ?>
                <tr>
				
                  <td><?php  echo $r['codeInscriptionEvent']; ?></td>
        
                  <td><?php  echo $r['titreEvenement']; ?></td>
				  <td><?php  echo $r['parentCin'].'  '.$r['nom'].' '.$r['prenom']; ?></td>
				 <td><?php  echo $r['dateInscriptionEvent']; ?></td>
                  <td><span class="label label-success"></span>
                  
				
                <a href="EditInscriptionEvent.php?idd=<?php  echo $r['codeInscriptionEvent']; ?>"><button type="button" class="btn btn-icon btn-warning"><i class="fa fa-pencil-square-o"></i></button></a>
				  <a href="AjouterPaimentEvent.php?code=<?php  echo $r['eleve_code']; ?>&codeClub=<?php  echo $r['codeEvenement']; ?>&montantParticipation=<?php  echo $r['montantParticipation']; ?>"> <i class="ti-plus" data-toggle="tooltip" title="" data-original-title="ti-plus"></i></a></td>   
                
				
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