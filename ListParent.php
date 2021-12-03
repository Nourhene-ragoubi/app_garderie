<?php
include('Modele/Parent.php');
$e  = new Parentt();
$res = $e->getAllParent();
if(isset($_GET['action']) & $_GET['action']=='delete'){

$result = $e->deleteParent($_GET['idd']);
if($result){
	header('Location:ListParent.php');
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
							<h4 class="page-title">Gestion Parent</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Parent</a></li>
								<li class="breadcrumb-item active" aria-current="page">Gestion Parent</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Ajouter Parent</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
													<tr class="border-bottom-0">
														<th class="wd-15p">Cin P/M </th>
														<th class="wd-15p">Pére </th>
														<th class="wd-20p">Mére</th>														
														<th class="wd-25p">Tel.P </th>
													   <th class="wd-25p">Tel.M</th>
														<th class="wd-20p">Fonction.P</th>														
														<th class="wd-25p">Fonction.M </th>
													   <th class="wd-25p">adresse</th> 
														<th class="wd-25p">Action</th>
													</tr>
												</thead>
												<tbody>
													
													<?php  foreach($res as $r){ ?>
                <tr>
				
                 <td><?php  echo $r['cinParent']; ?></td>
			  <td><?php  echo $r['nomParent'].' '.$r['prenomParent']; ?></td>
			  <td><?php  echo $r['nomMere'].' '.$r['prenomMere']; ?></td>
              <td><?php  echo $r['telephoneParent']; ?></td>
			 <td><?php  echo $r['telephoneMere']; ?></td>
			 <td><?php  echo $r['fonctionPere']; ?></td>
			 <td><?php  echo $r['fonctionMere']; ?></td>
			 <td><?php  echo $r['adresseParent']; ?></td>
				
                  <td width="180"> 
                 
                 <a href="EditeParent.php?idd=<?php  echo $r['cinParent']; ?>"><button type="button" class="btn btn-icon btn-warning"><i class="fa fa-pencil-square-o"></i></button></a>
				 <a href="ListParent.php?idd=<?php  echo $r['cinParent']; ?>&action=delete"><button type="button" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
                 <a href="ajoutEleve.php?nom=<?php  echo $r['nomParent']; ?>&cinParent=<?php  echo $r['cinParent']; ?>"><button type="button" class="btn btn-icon btn-default"><i class="fa fa-user-plus" data-toggle="tooltip" title="" data-original-title="fa fa-user-plus"></i></a>
			
			
			</td>
			
			
				
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