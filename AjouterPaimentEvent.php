<?php include('Modele/PaimentEvent.php');
include('Modele/InscriptionEvent.php');
include('Modele/Eleve.php');
$e = new PaimentEvent();
$c = new InscriptionEvent();
$d = new Eleve();
$infoAd = $c->getLastInscriptionEvent(); 
$codeInscriptionEvent = $c->getInscriptionEventByEvenementEleve($_GET['codeEvenement'], $_GET['code']);  
if(isset($_POST['action']) & $_POST['action']=='Valider' ){ 
$e->setInscriptionEvent_code($_POST['inscriptionEventCode']); 
$e->setMontantPaimentEvent($_POST['montant']); 
$e->setDatePaimentEvent(date('Y-m-d')); 
$res = $e->addPaimentEvent($e);
if($res){
	header('Location:ListEventP.php');
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
								<li class="breadcrumb-item active" aria-current="page">Ajouter Paiement event</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="AjouterPaimentEvent.php" class="card">
									<input type="hidden"    name="montant"  value="<?php echo $_GET['montantParticipation'] ; ?>"  >
									<input type="hidden"    name="inscriptionEventCode"  value="<?php echo $codeInscriptionEvent['codeInscriptionEvent'] ; ?>"  >
									 <div class="card-header">
										<h3 class="card-title">Ajouter Paiement  <?php echo $codeInscriptionEvent['codeInscriptionEvent'] ; ?></h3>
									</div>
									<div class="card-body" >
										
										
						
										<div class="form-group">
											<label class="form-label">Eleve</label>
											<input type="text" class="form-control" disabled value="<?php echo $infoAd['nom'].' '.$infoAd['prenom'].' '.$infoAd['code']; ?>"  >
										</div> 
										<div class="form-group">
											<label class="form-label">Evenement</label>
											<input type="text" class="form-control" disabled value="<?php echo $infoAd['titreEvenement']; ?>"   >
										</div> 
										
										
										
                                         <div class="form-group">
											<label class="form-label">Montant</label>
											<input type="text" class="form-control" disabled value="<?php echo $_GET['montantParticipation'].' DT'; ?>" >
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
  