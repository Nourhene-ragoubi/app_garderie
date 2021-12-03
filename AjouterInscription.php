<?php include('Modele/Inscription.php');
include('Modele/Eleve.php');
include('Modele/Classe.php');
$e = new Inscription();
$p = new Eleve();
$c = new Classe();
$tab = $p->getAllEleve(); 
$tabb = $c->getAllClasse(); 
if(isset($_POST['action']) & $_POST['action']=='Valider' ){
$test = $e->getInscriptionByClasseElevee($_POST['eleve_code'],$_POST['classe_niveau']); 
if($test){
	header('Location:AjouterInscription.php?error=1');	
}else {
$e->setCodeInscription($_POST['codeInscription']); 
$e->setAnneeScolaire($_POST['anneeScolaire']); 
$e->setEleve_code($_POST['eleve_code']); 
$e->setClasse_niveau($_POST['classe_niveau']);
$e->setMontantInscription($_POST['montantInscription']);  

$res = $e->addInscription($e); 
 if($res){
	header('Location:AjouterPaimentInscription.php?code='.$_POST['eleve_code'].
	'&classe='.$_POST['classe_niveau'].
	'&anneeScolaire='.$_POST['anneeScolaire'].
	'&montant='.$_POST['montantInscription']
	);
} 
}
}
 include("header.php");
?>

			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Inscription</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Inscription</a></li>
								<li class="breadcrumb-item active" aria-current="page">Ajouter Inscription</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="AjouterInscription.php" class="card">
									<div class="card-header">
										<h3 class="card-title">Ajouter Inscription</h3>
									</div>
									<div class="card-body" >
										<?php if(isset($_GET['error']) & $_GET['error']=='1') { ?>
											<div class="alert alert-danger" role="alert">
												<strong>Eléve déja inscrit.  </strong>
											</div>
									<?php  } ?>
										
										<div class="form-group">
											<label class="form-label">Année Scolaire</label>
											<input type="text" class="form-control" pattern="[0-9]{4}+/+[0-9}{4}" title="" name="anneeScolaire" placeholder="AnnéeScolaire" required>
										</div>
						
										
										<div class="form-group ">
											<label class="form-label">Eléve</label>
											<select class="form-control select2 custom-select" name="eleve_code"  data-placeholder="Choose one" required>
												<option label="Choose one" value=""> Sélectionner éléve</option>
												<?php foreach($tab as $t){ ?> 
															<option value="<?php echo $t['code']; ?>"><?php echo $t['parentCin']; ?>  <?php echo $t['nom']; ?> <?php echo $t['prenom']; ?> </option> 
												<?php   }  ?> 
											</select>
										</div>
										<div class="form-group ">
											<label class="form-label">Classe</label>
											<select class="form-control select2 custom-select" name="classe_niveau"  data-placeholder="Choose one" required>
												<option label="Choose one" value=""> Sélectionner classe</option>
												<?php foreach($tabb as $t){ ?> 
															<option value="<?php echo $t['niveau']; ?>"><?php echo $t['niveau'];; ?></option> 
												<?php   }  ?> 
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Montant</label>
											<input type="number" class="form-control" name="montantInscription" placeholder="montant">
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
  