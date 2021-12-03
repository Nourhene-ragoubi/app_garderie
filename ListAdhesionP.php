<?php
include('Modele/PaimentAdhesion.php');
$e  = new PaimentAdhesion();
$res = $e->getAllPaimentAdhesion();
if(isset($_GET['action']) & $_GET['action']=='delete'){
$result = $e->deletePaimentAdhesion($_GET['idd']);
if($result){
	header('Location:ListAdhesionP.php?msg=3');
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
							<h4 class="page-title">Paiement Adhésion</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Paiement Adhésion</a></li>
								<li class="breadcrumb-item active" aria-current="page">Liste Paiement Adhésion</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Liste Paiement Adhésion</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
										<?php if(isset($_GET['msg']) & $_GET['msg']=='1') { ?>
											<div class="alert alert-success" role="alert">
												<strong> Ajout paiement adhésion effectuée avec sucée </strong>
											</div>
											<?php  } ?>
											<?php if(isset($_GET['msg']) & $_GET['msg']=='2') { ?>
											<div class="alert alert-success" role="alert">
												<strong> Modification paiement adhésion  effectuée avec sucée </strong>
											</div>
											<?php  } ?>
											<?php if(isset($_GET['msg']) & $_GET['msg']=='3') { ?>
											<div class="alert alert-success" role="alert">
												<strong>  Suppression paiement adhésion effectuée avec sucée </strong>
											</div>
											<?php  } ?>
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
													<tr class="border-bottom-0">
													
														<th class="wd-15p">Eleve</th>
														<th class="wd-15p">Club</th>
														<th class="wd-20p">Montant</th>														
														<th class="wd-25p">Date</th>
														<th class="wd-25p">Action</th>
													</tr>
												</thead>
												<tbody>
													
			<?php  foreach($res as $r){ ?>
                <tr>
				
                  
                 
				 <td><?php  echo $r['nom'].' '.$r['prenom'].' '.$r['parentCin']; ?></td>
				 <td><?php  echo $r['nomClub']; ?></td> 
				 <td><?php  echo $r['montantPaimentAdhesion']; ?></td>
				 <td><?php  echo $r['datePaimentAdhesion']; ?></td>
                  <td><span class="label label-success"></span>
                  
				    
	    <a href="ListAdhesionP.php?idd=<?php  echo $r['codePaimentAdhesion']; ?>&action=delete"><button type="button" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
			 <a href="infoPayementAdhesion.php?idd=<?php  echo $r['codePaimentAdhesion']; ?>"><button type="button" class="btn btn-icon btn-default"><i class="icon icon-printer" data-toggle="tooltip" title="" data-original-title="icon-printer"></i>	</td>
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