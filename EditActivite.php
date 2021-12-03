<?php include('Modele/Activite.php');
 include('Modele/Club.php');
$e = new Activite();
$p = new Club();
$tab = $p->getAllClub(); 

$data = $e->getActiviteByCodeActivite($_GET['idd']);
if(isset($_POST['action']) & $_POST['action']=='Valider'){
$e->setNomActivite($_POST['nomActivite']); 
$e->setDescriptionActivite($_POST['descriptionActivite']); 

$e->setClub_code($_POST['club_code']);
$e->setCodeActivite($_POST['codeActivite']); 
$res = $e->editActivite($e); 
if($res){
	header('Location:ListActivite.php');
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
								<form   method="post" action="EditActivite.php" class="card">
									<div class="card-header">
										<h3 class="card-title">Modifier Activite</h3>
									</div>
									<div class="card-body" >
										<input type="hidden"   name="codeActivite"  value="<?php echo $data['codeActivite']; ?>" >
										<div class="form-group">
											<label class="form-label">code Activite</label>
											<input type="text" class="form-control"  disabled  value="<?php echo $data['codeActivite']; ?>" >
										</div> 
										
										<div class="form-group">
											<label class="form-label">Nom Activite</label>
											<input type="text" class="form-control" name="nomActivite"  value="<?php echo $data['nomActivite']; ?>" >
										</div> 
										<div class="form-group">
											<label class="form-label">Description Activite <span class="form-label-small ml-3"></span></label>
											<textarea class="form-control" name="descriptionActivite" rows="7" placeholder="text here.."><?php echo $data['descriptionActivite']; ?></textarea>
										</div>
										
									
										<div class="form-group ">
											<label class="form-label">club</label>
											<select class="form-control select2 custom-select" name="club_code"  data-placeholder="Choose one" required>
												<option label="Choose one" value=""> Selectionner club</option>
												<?php foreach($tab as $t){ ?> 
															<option value="<?php echo $t['codeClub']; ?>"<?php  if($data['club_code']==$t['codeClub']){echo"selected";} ?>><?php echo $t['nomClub'];; ?></option> 
												<?php   }  ?> 
											</select>
										</div>


									

										

										
										<div class="box_footer">
											 <button type="submit" name="action" value="Valider" class="btn btn-primary ml-auto">Valider</button>
										</div>
									
									
				
												</div>
											</div>
										</div>
									</div>
									
								</form>
							

<?php include("footer.php");; ?>
  