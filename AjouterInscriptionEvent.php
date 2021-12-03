<?php include('Modele/InscriptionEvent.php');
include('Modele/Eleve.php');
include('Modele/Evenement.php');
$e = new InscriptionEvent();
$p = new Eleve();
$c = new Evenement();
$tab = $e->getAllInscriptionEvent(); 
$tabE = $p->getAllEleve(); 
$tabC = $c->getAllEvenement();
if(isset($_POST['action']) & $_POST['action']=='Valider' ){

$test = $e->getInscriptionEventByEvenementElevee($_POST['eleve_code'],$_POST['evenement_code']); 
if($test){
	header('Location:AjouterInscriptionEvent.php?error=1');	
}else {
$montant = $c->getEvenementByCodeEvenement($_POST['evenement_code']);
$e->setCodeInscriptionEvent($_POST['codeInscriptionEvent']); 
$e->setDateInscriptionEvent($_POST['dateInscriptionEvent']); 
$e->setEleve_code($_POST['eleve_code']); 
$e->setEvenement_code($_POST['evenement_code']); 

$res = $e->addInscriptionEvent($e); 
if($res){
	
	header('Location:AjouterPaimentEvent.php?code='.$_POST['eleve_code'].'&codeEvenement='.$_POST['evenement_code'].'&montantParticipation='.$montant['montantParticipation']);
}
}
}
include("header.php");
?>

			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Inscription Evénement</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion  Inscription Evénement</a></li>
								<li class="breadcrumb-item active" aria-current="page">Ajouter  Inscription Evénement</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="AjouterInscriptionEvent.php" class="card">
									<div class="card-header">
										<h3 class="card-title">Ajouter  Inscription Evénement</h3>
									</div>
									<div class="card-body" >
										<?php if(isset($_GET['error']) & $_GET['error']=='1') { ?>
											<div class="alert alert-danger" role="alert">
												<strong>Eléve déja inscrit à cet événement.  </strong>
											</div>
									<?php  } ?>
										 <div class="form-group ">
											<label class="form-label">Eléve</label>
											<select class="form-control select2 custom-select" name="eleve_code"  data-placeholder="Choose one" required>
												<option label="Choose one" value=""> Sélectionner éléve</option>
												<?php foreach($tabE as $t){ ?> 
															<option value="<?php echo $t['code']; ?>"><?php echo $t['parentCin']; ?> <?php echo $t['nom']; ?> <?php echo $t['prenom']; ?></option> 
												<?php   }  ?> 
											</select>
										</div>
										<div class="form-group ">
											<label class="form-label"> Evénement</label>
											<select class="form-control select2 custom-select" name="evenement_code"  data-placeholder="Choose one" required>
												<option label="Choose one" value=""> Sélectionner Evénement</option>
												<?php foreach($tabC as $t){ ?> 
															<option value="<?php echo $t['codeEvenement']; ?>"><?php echo $t['titreEvenement'];; ?></option> 
												<?php   }  ?> 
											</select>
										</div>

                                         <div class="form-group">
											<label class="form-label">Date</label>
											<input type="date" class="form-control" onkeydown="return false" name="dateInscriptionEvent" required placeholder="text">
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
  