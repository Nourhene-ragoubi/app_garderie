<?php include('Modele/Activite.php');
 include('Modele/Club.php');
$e = new Activite();
$p = new Club();
$tab = $p->getAllClub(); 
$infoAd = $p->getLastClub();
if(isset($_POST['action']) & $_POST['action']=='Valider' ){
$test = $e->getActiviteByNomActivite($_POST['nomActivite']); 
if($test){
	header('Location:AjouterActivite.php?error=1');	
}else {
$e->setNomActivite($_POST['nomActivite']); 
$e->setDescriptionActivite($_POST['descriptionActivite']); 

$e->setClub_code($_POST['club_code']);
$res = $e->addActivite($e); 
if($res){
	header('Location:ListActivite.php?msg=1');
}
}
}
include("header.php");
?>

			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Activite</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Activite</a></li>
								<li class="breadcrumb-item active" aria-current="page">Gestion Activite</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="AjouterActivite.php" class="card">
									<div class="card-header">
										<h3 class="card-title">Ajouter Activite</h3>
									</div>
									<input type="hidden" class="form-control" name="club_code" value="<?php echo $codeClub['codeClub'] ; ?>"    >
									<div class="card-body" >
											<?php if(isset($_GET['error']) & $_GET['error']=='1') { ?>
											<div class="alert alert-danger" role="alert">
												<strong>Activité   </strong> <strong> existe déja.</strong>
											</div>
									<?php  } ?>
										<div class="form-group">
											<label class="form-label">Nom Activite</label>
											<input type="text" class="form-control" maxlength="25" title="Le nom doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="nomActivite" placeholder="text" required>
										</div> 
										<div class="form-group">
											<label class="form-label">Description Activite <span class="form-label-small ml-3"></span></label>
											<textarea class="form-control" name="descriptionActivite" maxlength="80" title="La description doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" rows="7" placeholder="text here.."required></textarea>
										</div>
										
										
										
										<div class="form-group">
											<label class="form-label">Club</label>
											<input type="text" class="form-control" disabled value="<?php echo $infoAd['nomClub']; ?>"   placeholder="text">
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
  