<?php
include('Modele/Club.php');
$e  = new Club();
$res = $e->getAllClub();
if(isset($_GET['action']) & $_GET['action']=='delete'){
$result = $e->deleteClub($_GET['idd']);
if($result){
	header('Location:ListClub.php?msg=3');
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
							<h4 class="page-title">Gestion Club</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Club</a></li>
								<li class="breadcrumb-item active" aria-current="page">Liste Club</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Liste Club</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
										<?php if(isset($_GET['msg']) & $_GET['msg']=='1') { ?>
											<div class="alert alert-success" role="alert">
												<strong>Ajout club effectuée avec sucée.</strong>
											</div>
											<?php  } ?>
											
											<?php if(isset($_GET['msg']) & $_GET['msg']=='2') { ?>
											<div class="alert alert-success" role="alert">
												<strong>Modification club effectuée avec sucée.</strong>
											</div>
											<?php  } ?>
											<?php if(isset($_GET['msg']) & $_GET['msg']=='3') { ?>
											<div class="alert alert-success" role="alert">
												<strong>Suppression club effectuée avec sucée.</strong>
												
											</div>
											<?php  } ?>
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
													<tr class="border-bottom-0">
														<th class="wd-15p">code</th>
														<th class="wd-15p">nom</th>
														<th class="wd-15p">animateur</th>
														<th class="wd-20p">description</th>
														<th class="wd-20p">montant</th>
														
														
													
													    <th class="wd-25p">Action</th>
													</tr>
												</thead>
												<tbody>
													
													<?php  foreach($res as $r){ ?>
                <tr>
				   <td><?php  echo $r['codeClub']; ?></td>
                  <td><span class="badge badge-info"><?php  echo $r['nomClub']; ?></span></td>
                  <td><?php  echo $r['animateurClub']; ?></td>
                  <td><?php  echo $r['descriptionClub']; ?></td>
                    <td><?php  echo $r['montantAdhesion']; ?></td>
				 
				
                  <td width="150"><span class="label label-success"></span>
                   <a href="EditClub.php?idd=<?php  echo $r['codeClub']; ?>"><button type="button" class="btn btn-icon btn-warning"><i class="fa fa-pencil-square-o"></i></button></a>
				     <a href="ListClub.php?idd=<?php  echo $r['codeClub']; ?>&action=delete"><button type="button" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
                <a href="AjouterActivite.php?codeClub=<?php  echo $r['codeClub']; ?>"><button type="button" class="btn btn-icon btn-warning"> <i class="ti-plus" data-toggle="tooltip" title="" data-original-title="ti-plus"></i></a></td>
                
				
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