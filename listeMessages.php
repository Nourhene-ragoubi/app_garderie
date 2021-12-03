<?php
include('Modele/Contact.php');
$e  = new Contact();
$res = $e->getAllMessages();
if(isset($_GET['action']) & $_GET['action']=='delete'){
$result = $e->deleteClasse($_GET['idd']);
if($result){
	header('Location:ListeMessages.php');
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
									
										
									
									
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
													<tr class="border-bottom-0">
														<th class="wd-15p">Parent</th>
														<th class="wd-15p">Sujet</th>
													
														<th class="wd-25p">Contenu</th>
														<th class="wd-25p">Date Envoie</th>
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