<?php include('Modele/Classe.php');
 include('Modele/Enseignant.php');
$e = new Classe();
$p = new Enseignant();
$tab = $p->getAllEnseignant(); 

$data = $e->getClasseByNiveau($_GET['idd']);
if(isset($_POST['action']) & $_POST['action']=='Valider'){
$e->setNiveau($_POST['niveau']); 
$e->setEnseignant_cin($_POST['enseignant_cin']);

$res = $e->EditClasse($e); 
if($res){
	header('Location:ListClasse.php?msg=2');
}
}
include("header.php");


?>
			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Classe</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Classe</a></li>
								<li class="breadcrumb-item active" aria-current="page">Modifier Classe</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form  method="post" class="card" action="EditClasse.php">
									<div class="card-header">
										<h3 class="card-title">Modifier Classe</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
										
											<label class="form-label">Niveau</label>
											<input disabled type="text"pattern="[0-9]{8}" title="8 chiffres" class="form-control" name="niveau" value="<?php echo $data['niveau']; ?>" placeholder="number">
										</div>
										

										

							
										
										<div class="form-group">
											<label class="form-label">Enseignant</label>
											
												<select class="form-control select2 custom-select" name="enseignant_cin"  data-placeholder="Choose one">
												<option label="Choose one">Sélectionner Enseignant</option>
												<?php foreach($tab as $t){ ?> 
															<option value="<?php echo $t['cinEnseignant']; ?>" <?php  if($data['enseignant_cin']==$t['cinEnseignant']){echo"selected";} ?>><?php echo $t['nomEnseignant'].' '.$t['prenomEnseignant'].' ('.$t['cinEnseignant'].')'; ?></option> 
												<?php   }  ?> 
											</select>
											
										</div>


									

										

										
										<div class="box_footer">
											<button type="submit" class="btn btn-primary ml-auto">Annuler</button>
											<button type="submit" name="action" value="Valider" class="btn btn-primary ml-auto">Enregistrer</button>
										</div>
									
									
				
												</div>
											</div>
										</div>
									</div>
									
								</form>
							</div>

<?php include("footer.php");; ?>
  