<?php include('Modele/Evenement.php');
$e = new Evenement();
$data = $e->getEvenementByCodeEvenement($_GET['idd']);
if(isset($_POST['action']) & $_POST['action']=='Valider'){

$e->setTitreEvenement($_POST['titreEvenement']); 
$e->setDateEvenement($_POST['dateEvenement']); 
$e->setDescriptionEvenement($_POST['descriptionEvenement']); 
$e->setMontantParticipation($_POST['montantParticipation']);
$e->setCodeEvenement($_POST['codeEvenement']);  
$res = $e->editEvenement($e);

if($res){
	header('Location:ListEvenement.php?msg=2');
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
								<li class="breadcrumb-item active" aria-current="page">Modifier Evénement</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="editeEvenement.php" class="card">
									<div class="card-header">
										<h3 class="card-title">Modifier Evénement</h3>
									</div>
									<div class="card-body" >
									
										
										<div class="form-group">
											<label class="form-label">titre</label>
											<input type="text" disabled class="form-control" name="titreEvenement" value="<?php echo $data['titreEvenement']; ?>" placeholder="text" required>
										</div> 
										<div class="form-group">
											<label class="form-label">date</label>
											<input type="date" onkeydown="return false" class="form-control" name="dateEvenement" value="<?php echo $data['dateEvenement']; ?>" placeholder="text" required>
										</div>
										<div class="form-group">
											<label class="form-label">Description <span class="form-label-small ml-3"></span></label>
											<textarea class="form-control" maxlength="50" title="La description doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" required name="descriptionEvenement" rows="7"  placeholder="text here.."><?php echo $data['descriptionEvenement']; ?></textarea>
										</div>
										<div class="form-group">
											<label class="form-label">montant</label>
											<input type="number" class="form-control" name="montantParticipation" value="<?php echo $data['montantParticipation']; ?>" placeholder="number" required>
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
  