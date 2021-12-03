<?php include('Modele/Club.php');
$e = new Club();
$tab = $e->getAllClub(); 

if(isset($_POST['action']) & $_POST['action']=='Valider' ){
$test = $e->getClubByNomClub($_POST['nomClub']); 
if($test){
	header('Location:AjouterClub.php?error=1');	
}else {
$e->setCodeClub($_POST['codeClub']); 
$e->setNomClub($_POST['nomClub']); 
$e->setAnimateurClub($_POST['animateurClub']); 
$e->setDescriptionClub($_POST['descriptionClub']); 
$e->setMontantAdhesion($_POST['montantAdhesion']); 

$res = $e->addClub($e); 
if($res){
	header('Location:AjouterActivite.php?codeClub='.$_POST['codeClub']);
}
}
}
include("header.php");
?>
			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Club</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Club</a></li>
								<li class="breadcrumb-item active" aria-current="page">Ajouter Club</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="AjouterClub.php" class="card">
									<div class="card-header">
										<h3 class="card-title">Ajouter Club</h3>
									</div>
									<input type="hidden" class="form-control" name="codeClub" value="<?php echo $codeClub['codeClub'] ; ?>"    >
									<div class="card-body" >
										<?php if(isset($_GET['error']) & $_GET['error']=='1') { ?>
											<div class="alert alert-danger" role="alert">
												<strong>Club  Existe déja .  </strong>
											</div>
									<?php  } ?>
									
										<div class="form-group">
											<label class="form-label">nom</label>
											<input type="text" class="form-control" maxlength="30" title="le nom doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="nomClub" placeholder="text"required>
										</div> 
										
										<div class="form-group">
											<label class="form-label">animateur</label>
											<input type="text" class="form-control" maxlength="30" title="le nom et le prénom de l'animateur doivent contenir uniquement des lettres" pattern="[A-Za-z]{3,}"name="animateurClub" placeholder="text" required>
										</div> 
										<div class="form-group">
											<label class="form-label">Description <span class="form-label-small ml-3"></span></label>
											<textarea class="form-control" maxlength="50" title="la description doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="descriptionClub" rows="7" placeholder="text here.." required></textarea>
										</div>
									
										
										<div class="form-group">
											<label class="form-label">Montant Adhesion</label>
											<input type="number" class="form-control"  name="montantAdhesion" placeholder="number" required>
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
  