<?php include('Modele/PaimentInscription.php');
include('Modele/Inscription.php');
include('Modele/Eleve.php');
$e = new PaimentInscription();
$c = new Inscription();
$d = new Eleve();
$infoAd = $c->getLastInscription(); 
$infoInscris = $c->getInscriptionByClasseEleve($_GET['classe'], $_GET['code']);  

if(isset($_POST['action']) & $_POST['action']=='Valider' ){ 
$e->setInscription_code($_POST['inscriptionCode']); 
$e->setMontantPaimentInscription($_POST['montant']); 
$e->setMoisPaimentInscription($_POST['moisPaimentInscription']);
$e->setDatePaimentInscription(date('Y-m-d')); 
$res = $e->addPaimentInscription($e);
if($res){
	header('Location:ListInscriptionP.php');
}
}
include("header.php");
?>

			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Paiment</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Paiment</a></li>
								<li class="breadcrumb-item active" aria-current="page">Ajouter Paiment Inscription</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="AjouterPaimentInscription.php" class="card">
									<input type="hidden"    name="montant"  value="<?php echo $_GET['montant'] ; ?>"  >
									<input type="hidden"    name="inscriptionCode"  value="<?php echo $infoInscris['codeInscription'] ; ?>"  >
									<div class="card-header">
										<h3 class="card-title">Ajouter Paiment   </h3>
									</div>
									<div class="card-body" >
										
										
						
										<div class="form-group">
											<label class="form-label">Eleve</label>
											<input type="text" class="form-control" disabled value="<?php echo $infoAd['nom'].' '.$infoAd['prenom'].' '.$infoAd['parentCin']; ?>"  >
										</div> 
										<div class="form-group">
											<label class="form-label">classe</label>
											<input type="text" class="form-control" disabled value="<?php echo $infoAd['niveau']; ?>"   >
										</div> 
										
										
										
                                         <div class="form-group">
											<label class="form-label">Montant</label>
											<input type="text" class="form-control" disabled value="<?php echo $_GET['montant'].' DT'; ?>" >
										</div> 
										<div class="form-group">
											<label class="form-label">Date</label>
											<input type="date" class="form-control" disabled value="<?php echo date('Y-m-d'); ?>" placeholder="number">
										</div> 
										<div class="form-group">
											<label class="form-label">Mois</label> 
	                                       <select name="moisPaimentInscription" class="form-control select2 custom-select" required>
											  <option value="">choisir le mois</option>
											 <option value="Janvier">Janvier</option>
											  <option value="Février">Février</option>
											  <option value="Mars">Mars</option>
											  <option value="Avril">Avril</option>
											  <option value="Mai">Mai</option>
											  <option value="Juin">Juin</option>
											  <option value="Juillet">Juillet</option>
											  <option value="Août">Août</option>
											  <option value="September">September</option>
											  <option value="Octobre">Octobre</option>
										      <option value="Novombre">Novombre</option>
											  <option value="Décombre">Décombre</option> 
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
  