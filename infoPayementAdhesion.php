<?php
include('Modele/PaimentAdhesion.php');
$e  = new PaimentAdhesion();
$r = $e->getInfoPaiementAdhesion($_GET['idd']);
 

 include("header.php");
 ?>
 <div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Paiement Adhésion</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Paiement Adhésion</a></li>
								<li class="breadcrumb-item active" aria-current="page">Paiement Adhésion</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Récu Paiement Adhésion</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table  class="table card-table table-vcenter text-nowrap" style="width:100%">
												 <tr class="border-bottom-0"> 
														<th class="wd-15p" width="150">N° Récu : </th>
														<td><?php  echo $r['codePaimentAdhesion']; ?></td>
													</tr>
													<tr class="border-bottom-0"> 
														<th class="wd-15p">Date Paiement: </th>
														<td><?php  echo $r['datePaimentAdhesion']; ?></td>
													</tr>
													<tr class="border-bottom-0"> 
														<th class="wd-15p">Code Elève : </th>
														<td><?php  echo $r['code']; ?></td>
													</tr>
													<tr class="border-bottom-0"> 
														<th class="wd-15p">Eleve : </th>
														<td><?php  echo $r['nom'].' '.$r['prenom']; ?></td>
													</tr>
													<tr class="border-bottom-0"> 
														<th class="wd-15p">Club : </th>
														<td><?php  echo $r['nomClub']; ?></td>
													</tr>
													<tr class="border-bottom-0"> 
														<th class="wd-15p">Montant Payé : </th>
														<td><?php  echo $r['montantPaimentAdhesion']; ?></td>
													</tr>   
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