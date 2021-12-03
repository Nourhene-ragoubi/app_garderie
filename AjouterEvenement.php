<?php include('Modele/Evenement.php');
$e = new Evenement();
$tab = $e->getAllEvenement(); 

if(isset($_POST['action']) & $_POST['action']=='Valider' ){
$test = $e->getEvenementByDateEvenement($_POST['dateEvenement']); 
if($test){
	header('Location:AjouterEvenement.php?error=1');	
}else {
$e->setCodeEvenement($_POST['codeEvenement']); 
$e->setTitreEvenement($_POST['titreEvenement']); 
$e->setDateEvenement($_POST['dateEvenement']); 
$e->setDescriptionEvenement($_POST['descriptionEvenement']); 
$e->setMontantParticipation($_POST['montantParticipation']); 

$res = $e->addEvenement($e); 
if($res){
	header('Location:ListEvenement.php?msg=1');
}
}
}
include("header.php");
?>
			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Evénement</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Evénement</a></li>
								<li class="breadcrumb-item active" aria-current="page">Ajouter Evénement</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="AjouterEvenement.php" class="card">
									<div class="card-header">
										<h3 class="card-title">Ajouter Evénement</h3>
									</div>
									<div class="card-body" >
										<?php if(isset($_GET['error']) & $_GET['error']=='1') { ?>
											<div class="alert alert-danger" role="alert">
												<strong>Evénement    </strong> <strong> existe déja.</strong>
											</div>
									<?php  } ?>
										
										<div class="form-group">
											<label class="form-label">titre</label>
											<input type="text" class="form-control" required maxlength="20" title="le titre doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="titreEvenement" placeholder="titre">
										</div> 
										<div class="form-group">
											<label class="form-label">date</label>
											<input type="date" class="form-control" required onkeydown="return false" name="dateEvenement" placeholder="text">
										</div>
										<div class="form-group">
											<label class="form-label">Description <span class="form-label-small ml-3"></span></label>
											<textarea class="form-control" required maxlength="100" title="la description doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="descriptionEvenement" rows="7" placeholder="Description.."></textarea>
										</div>
										

										<div class="form-group">
											<label class="form-label">montant</label>
											<input type="number" class="form-control" required name="montantParticipation"  placeholder="montant">
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
  