<?php include('Modele/PaimentAdhesion.php');
include('Modele/Adhesion.php');
include('Modele/Eleve.php');
$e = new PaimentAdhesion();
$c = new Adhesion();
$d = new Eleve();
$infoAd = $c->getLastAdhesion(); 
$codeAdhesion = $c->getAdhesionByClubEleve($_GET['codeClub'], $_GET['code']);  
if(isset($_POST['action']) & $_POST['action']=='Valider' ){ 
$e->setAdhesion_code($_POST['adhesionCode']); 
$e->setMontantPaimentAdhesion($_POST['montant']); 
$e->setDatePaimentAdhesion(date('Y-m-d')); 
$res = $e->addPaimentAdhesion($e);
if($res){
	header('Location:ListAdhesionP.php');
}
}
include("header.php");
?>

			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Paiement</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Paiement</a></li>
								<li class="breadcrumb-item active" aria-current="page">Ajouter Paiement Adhesion</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="AjouterPaimentAdhesion.php" class="card">
									<input type="hidden"    name="montant"  value="<?php echo $_GET['montantClub'] ; ?>"  >
									<input type="hidden"    name="adhesionCode"  value="<?php echo $codeAdhesion['codeAdhesion'] ; ?>"  >
									 <div class="card-header">
										<h3 class="card-title">Ajouter Paiement  <?php echo $codeAdhesion['codeAdhesion'] ; ?></h3>
									</div>
									<div class="card-body" >
										
										
						
										<div class="form-group">
											<label class="form-label">Eleve</label>
											<input type="text" class="form-control" disabled value="<?php echo $infoAd['nom'].' '.$infoAd['prenom']; ?>"  >
										</div> 
										<div class="form-group">
											<label class="form-label">Adhesion Club</label>
											<input type="text" class="form-control" disabled value="<?php echo $infoAd['nomClub']; ?>"   >
										</div> 
										
										
										
                                         <div class="form-group">
											<label class="form-label">Montant</label>
											<input type="text" class="form-control" disabled value="<?php echo $_GET['montantClub'].' DT'; ?>" >
										</div> 
										<div class="form-group">
											<label class="form-label">Date</label>
											<input type="date" class="form-control" disabled value="<?php echo date('Y-m-d'); ?>" placeholder="number">
										</div> 
										

										

										
										<div class="box_footer">
											<button type="reset"   class="btn btn-primary ml-auto">Annuler</button>
											<button type="submit" name="action" value="Valider" class="btn btn-primary ml-auto"><i class="fa fa-check"></i>Valider</button>
										</div>
									
									
				
												</div>
											</div>
										</div>
									</div>
									
								</form>
							

<?php include("footer.php");; ?>
  