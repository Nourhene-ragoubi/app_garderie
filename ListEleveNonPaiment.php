<?php
include('Modele/PaimentInscription.php');
$e  = new PaimentInscription();
$res = $e->getAlllistEleveNonPayee();
if(isset($_GET['action']) & $_GET['action']=='delete'){
$result = $e->deletePaimentInscription($_GET['idd']);
if($result){
	header('Location:ListEleveNonPaiment.php');
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
							<h4 class="page-title">Paiment Inscription</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Paiment Inscription</a></li>
								<li class="breadcrumb-item active" aria-current="page">Paiment Inscription</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Paiment Inscription</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
													<tr class="border-bottom-0">
													
														<th class="wd-15p">CODE</th> 	 
														<th class="wd-25p">Eleve</th>
														<th class="wd-25p">Parent</th>
														
													</tr>
												</thead>
												<tbody>
													
			<?php  foreach($res as $r){ ?>
                <tr>
				
                  
                 
				 <td><?php  echo $r['code']; ?></td> 
				 <td><?php  echo $r['nom'].' '.$r['prenom'] ; ?></td> 
				  <td><?php  echo $r['parentCin'].' '.$r['nomParent'].' '.$r['prenomParent'] ; ?></td> 
                 
				
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