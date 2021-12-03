<?php
include('Modele/PaimentEvent.php');
$e  = new PaimentEvent();
$res = $e->getAllPaimentEvent();
if(isset($_GET['action']) & $_GET['action']=='delete'){
$result = $e->deletePaimentEvent($_GET['idd']);
if($result){
	header('Location:ListEventP.php');
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
							<h4 class="page-title">Paiement Evénement</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Paiement Evénement</a></li>
								<li class="breadcrumb-item active" aria-current="page">Paiement Evénement</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Paiement Evénement</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
													<tr class="border-bottom-0">
													
														<th class="wd-15p">Eleve</th>
														<th class="wd-15p">Evenement</th>
														<th class="wd-20p">Montant</th>														
														<th class="wd-25p">Date</th>
														<th class="wd-25p">Action</th>
													</tr>
												</thead>
												<tbody>
													
													<?php  foreach($res as $r){ ?>
                <tr>
				
                  
                  
				 <td><?php  echo $r['nom'].' '.$r['prenom'].' '.$r['parentCin']; ?></td>
				  
				 <td><?php  echo $r['titreEvenement']; ?></td> 
				 <td><?php  echo $r['montantPaimentEvent']; ?></td>
				 <td><?php  echo $r['datePaimentEvent']; ?></td>
                  <td><span class="label label-success"></span>
                  
				    
			<a href="ListEventP.php?idd=<?php  echo $r['codePaimentEvent']; ?>&action=delete"><button type="button" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
			 <a href="infoPaimentEvent.php?idd=<?php  echo $r['codePaimentEvent']; ?>"><button type="button" class="btn btn-icon btn-default"><i class="icon icon-printer" data-toggle="tooltip" title="" data-original-title="icon-printer"></i>	</td>
				
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