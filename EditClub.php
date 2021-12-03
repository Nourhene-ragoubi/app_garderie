<?php include('Modele/Club.php');

$e = new Club();


$data = $e->getClubByCodeClub($_GET['idd']);
if(isset($_POST['action']) & $_POST['action']=='Valider'){
$e->setCodeClub($_POST['codeClub']); 
$e->setNomClub($_POST['nomClub']); 
$e->setAnimateurClub($_POST['animateurClub']); 
$e->setDescriptionClub($_POST['descriptionClub']); 
$e->setMontantAdhesion($_POST['montantAdhesion']); 

						
					
$res = $e->editClub($e); 
if($res){
	header('Location:ListClub.php');
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
								<li class="breadcrumb-item active" aria-current="page">Modifier Club</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="EditClub.php" class="card">
									<div class="card-header">
										<h3 class="card-title">Modifier Club</h3>
									</div>
									<div class="card-body" >
									<div class="form-group">
											<label class="form-label">code</label>
											<input type="number" class="form-control" name="codeClub" value="<?php echo $data['codeClub']; ?>"placeholder="text">
										</div> 
										
										<div class="form-group">
											<label class="form-label">nom</label>
											<input type="text" class="form-control" name="nomClub" value="<?php echo $data['nomClub']; ?>"placeholder="text">
										</div> 
										
										<div class="form-group">
											<label class="form-label">animateur</label>
											<input type="text" class="form-control" name="animateurClub"value="<?php echo $data['animateurClub']; ?>" placeholder="text">
										</div> 
										<div class="form-group">
											<label class="form-label">Description <span class="form-label-small ml-3"></span></label>
											<textarea class="form-control" name="descriptionClub" rows="7" placeholder="text here.."><?php echo $data['descriptionClub']; ?></textarea>
										</div>
									
										
										<div class="form-group">
											<label class="form-label">Montant Adhesion</label>
											<input type="number" class="form-control" name="montantAdhesion" value="<?php echo $data['montantAdhesion']; ?>"placeholder="number">
										</div>
										

									

										

										
										<div class="box_footer">
											<button type="submit" name="action" class="btn btn-primary ml-auto">Annuler</button>
											<button type="submit" name="action" value="Valider" class="btn btn-primary ml-auto">Valider</button>
										</div>
									
									
				
												</div>
											</div>
										</div>
									</div>
									
								</form>
							

<?php include("footer.php");; ?>
  