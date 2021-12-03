<?php include('Modele/Classe.php');
 include('Modele/Enseignant.php');
$e = new Classe();
$p = new Enseignant();
$tab = $p->getAllEnseignant(); 
if(isset($_POST['action']) & $_POST['action']=='Valider' ){
$test = $e->getClasseByNiveau($_POST['niveau']); 
if($test){
	header('Location:AjouterClasse.php?error=1');	
}else {
$e->setNiveau($_POST['niveau']); 
$e->setEnseignant_cin($_POST['enseignant_cin']); 
$res = $e->addClasse($e); 
if($res){
	header('Location:ListClasse.php?msg=1');
}
}}
include("header.php");
?>

			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Classe</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Classe</a></li>
								<li class="breadcrumb-item active" aria-current="page">Ajouter Classe</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="AjouterClasse.php" class="card">
									<div class="card-header">
										<h3 class="card-title">Ajouter Classe</h3>
									</div>
									<?php if(isset($_GET['error']) & $_GET['error']=='1') { ?>
											<div class="alert alert-danger" role="alert">
												<strong>Classe    </strong> <strong> existe déja.</strong>
											</div>
									<?php  } ?>
									<div class="card-body" >
										
										<div class="form-group">
											<label class="form-label">Niveau</label>
											<input type="text" pattern="[0-9]{1}" title="1 chiffres" class="form-control" name="niveau" placeholder="niveau">
										</div> 
										
										
										
										<div class="form-group ">
											<label class="form-label">Enseignant</label>
											<select class="form-control select2 custom-select" name="enseignant_cin"  data-placeholder="Choose one" required>
												<option label="Choose one" value=""> Sélectionner Enseignant</option>
												<?php foreach($tab as $t){ ?> 
									<option value="<?php echo $t['cinEnseignant']; ?>"><?php echo $t['cinEnseignant'].' '.$t['nomEnseignant'].' '.$t['prenomEnseignant'];; ?></option> 
												<?php   }  ?> 
											</select>
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
  