<div class="container">
<?= $error;?>
	<div class="text-center">
			<h2>Modifier un utilisateur
				<br>Login : <?= $login; ?> - ID : <?= $id; ?>
			</h2>
			<img class="d-block mx-auto" src="public\media\images\user-male-circle.png" alt="" width="300" height="300">
			<p class="lead">
			est inscrit depuis le <?= $newDate; ?> à  <?= $newHour; ?>
		</p>
				<br>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form action="#" name="newUserForm" method="post" class="needs-validation" novalidate>
				<hr class="mb-4">
				<h4 class="mb-3">Login et Rôle</h4>
				<hr class="mb-4">
				<div class="row">
					<div class="mb-3 col-md-12">
							<label for="login">Login</label>
						<div class="input-group">
							<div class="input-group-prepend">
							<span class="input-group-text">@</span>
							</div>
							<input class="form-control"  type="text" name="login" value="<?= $login; ?>" placeholder="Username" required>
							<div class="invalid-feedback" style="width: 100%;">
							Le Login est necessaire.
							</div>
						</div>
					</div>
					<div class="mb-3 col-md-12">
						<label for="email">Email <span class="text-muted">(Optionnel)</span></label>
						<input type="email" class="form-control" name="email" value="<?= $email; ?>" placeholder="ton-adresse@example.com">
						<div class="invalid-feedback">
						Veuillez entrer une adresse email valide pour que l'utilisateur puisse se connecter.
						</div>
					</div>
					<div class="mb-3 col-md-12">
						<label for="pwd">Mot de Passe <span class="text-muted">(Optionnel)</span></label>
						<input   type="password" name="pwd" class="form-control" value="<?= $pwd; ?>" placeholder="mot de passe">
						<div class="invalid-feedback">
						Veuillez entrer un mot de passe valide pour que l'utilisateur puisse se connecter.
						</div>
					</div>
					<div class="row row100  col-md-12">
						<div class="col-md-8 mb-3">
							<label  for="ROLE_idROLE">Role</label>
							<select class="custom-select d-block w-100"  name="ROLE_idROLE" required>
							<option value="<?= $ROLE_idROLE ?>"><?= $roleName ?></option>	
								<?= $optionRole ?>
							</select>
							<div class="invalid-feedback">
							Veuillez choisir un role.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="isActive">Permettre l'utilisateur de se connecter</label>
							<select name="isActive" class="custom-select d-block w-100">
								<option value="<?= $isActive ?>"><?= $isActiveName ?></option>		
								<option value="0">NON</option>
								<option value="1">OUI</option>	
							</select>
							<div class="invalid-feedback">
							Veuillez configurer l'utilisateur.
							</div>
						</div>
					</div>
				</div>
				<hr class="mb-4">
				<h4 class="mb-3">Informations générales</h4>
				<hr class="mb-4">
				<div class="row">
					<div class="row row100  col-md-12">
						<div class="col-md-6 mb-3">
							<label  for="FirstName">Prénom</label>
							<input type="text" value="<?= $FirstName; ?>" name="FirstName" class="form-control" id="firstName" placeholder="" value="">
								<div class="invalid-feedback">
								Prénom valide requis.
								</div>
						</div>
						<div class="col-md-6 mb-3">
							<label  for="lastName">Nom</label>
							<input type="text" value="<?= $lastName; ?>" name="lastName" class="form-control" id="lastName" placeholder="" value="">
								<div class="invalid-feedback">
								Nom valide est requis.
								</div>
						</div>
					</div>
					<div class="row row100  col-md-12">
						<div class="col-md-4 mb-3">
							<label  for="birthday">Date de naissance</label>
							<input class="form-control" value="<?= $birthday; ?>" type="date" name="birthday">
						</div>
						<div class="col-md-8 mb-3">
							<label for="sexGenre">Sexe</label>
							<select name="sexGenre" id="sexGenre" class="custom-select d-block w-100">
								<option value="<?= $sexGenre; ?>"><?= $sexGenre; ?></option>		
								<option value="Homme">Homme</option>
								<option value="Femme">Femme</option>
							</select>
							<div class="invalid-feedback">
							Choissisez le sexe.
							</div>
						</div>
					</div>
				</div>
				<hr class="mb-4">
				<h4 class="mb-3">Adresse Privée</h4>
				<hr class="mb-4">
				<div class="row">
					<div class="row row100  col-md-12">
						<div class="col-md-2 mb-3">
						<label for="adPvNum">Numéro et boite</label>
							<input type="text" value="<?= $adPvNum; ?>" class="form-control" name="adPvNum" placeholder="123">
								<div class="invalid-feedback">
								Indiquer un numéro de rue.
								</div>
						</div>
						<div class="col-md-10 mb-3">
							<label for="adPvStreet">Rue</label>
							<input type="text" value="<?= $adPvStreet; ?>" class="form-control" name="adPvStreet" placeholder="Rue Saint-Mont">
								<div class="invalid-feedback">
								Indiquer l'adresse.
								</div>
						</div>
					</div>

					<div class="row row100  col-md-12">
						<div class="col-md-5 mb-3">
							<label  for="adPvCountry">Choisir un pays</label>
								<select class="custom-select d-block w-100" search="pays" name="adPvCountry" id="adPvCountry">	
									<option value="<?= $adPvCountry; ?>"><?= $adPvCountryName; ?></option>			
									<option value="be">Belgique</option>
									<option value="fr">France</option>
								</select>
								<div class="invalid-feedback">
								Veuillez sélectionner un pays valide.
								</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="adPvZip">Code Postal</label>
							<input   type="number" value="<?= $adPvZip; ?>" class="form-control" placeholder="Code Postal" name="adPvZip"  id="postal" search="cp" onchange="completionVillePv(this.value);" >
								<div class="invalid-feedback">
								Code postal requis.
								</div>
						</div>
						<div class="col-md-3 mb-3">
							<label  for="adPvCity">Ville</label>
							<input type="text" value="<?= $adPvCity; ?>" class="form-control" name="adPvCity" id="adPvCity" placeholder="Paris">
									<!--<select name="adPvCity" id="adPvCity">
											<option value="">Choix</option>
										</select><br/>-->
							<div class="invalid-feedback">
							S'il vous plaît fournir une ville valide.
							</div>
						</div>
					</div>
				</div>	
				<hr class="mb-4">
				<h4 class="mb-3">Adresse Professionnelle</h4>
				<hr class="mb-4">
				<div class="row">
					<div class="row  row100 col-md-12">
						<div class="col-md-2 mb-3">
						<label for="adProNum">Numéro et boite</label>
							<input type="text" value="<?= $adProNum; ?>" class="form-control" name="adProNum" placeholder="1234">
								<div class="invalid-feedback">
								Indiquer un numéro de rue.
								</div>
						</div>
						<div class="col-md-10 mb-3">
							<label for="adProStreet">Rue</label>
							<input type="text" value="<?= $adProStreet; ?>" class="form-control" name="adProStreet" placeholder="Rue Saint-Mont">
								<div class="invalid-feedback">
								Indiquer l'adresse.
								</div>
						</div>
					</div>
					<div class="row row100  col-md-12">
						<div class="col-md-5 mb-3">
							<label  for="adProCountry">Choisir un pays</label>
								<select class="custom-select d-block w-100" search="pays" name="adProCountry" id="adProvCountry">	
									<option value="<?= $adProCountry; ?>"><?= $adProCountryName; ?></option>			
									<option value="be">Belgique</option>
									<option value="fr">France</option>
								</select>
								<div class="invalid-feedback">
								Veuillez sélectionner un pays valide.
								</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="adProZip">Code Postal</label>
							<input value="<?= $adProZip; ?>"  type="number"class="form-control" placeholder="Code Postal" name="adProZip"  id="postal" search="cp" onchange="completionVillePro(this.value);" >
								<div class="invalid-feedback">
								Code postal requis.
								</div>
						</div>
						<div class="col-md-3 mb-3">
							<label  for="adProCity">Ville</label>
							<input type="text" value="<?= $adProCity; ?>" class="form-control" name="adProCity" id="adProCity" placeholder="Paris">
									<!--<select name="adPvCity" id="adPvCity">
											<option value="">Choix</option>
										</select><br/>-->
							<div class="invalid-feedback">
							S'il vous plaît fournir une ville valide.
							</div>
						</div>
					</div>
				</div>	
				<hr class="mb-4">
				<h4 class="mb-3">Contacts</h4>
				<hr class="mb-4">
				<div class="row">
					<div class="row row100  col-md-12">
						<div class="col-md-4 mb-3">
							<label   for="contPhonePv">Télèphone privé</label>
							<input   type="tel" value="<?= $contPhonePv; ?>" name="contPhonePv" class="form-control" >
								<div class="invalid-feedback">
								Veuillez entrer un numéro de télèphone fixe.
								</div>
						</div>
						<div class="col-md-4 mb-3">
							<label   for="contPhoneGsm">GSM</label>
							<input   type="tel" value="<?= $contPhoneGsm; ?>" name="contPhoneGsm" class="form-control" >
								<div class="invalid-feedback">
								Veuillez entrer un numéro de télèphone fixe.
								</div>
						</div>
						<div class="col-md-4 mb-3">
							<label   for="contPhonePro">Télèphone (bureau)</label>
							<input   type="tel"  value="<?= $contPhonePro; ?>" name="contPhonePro" class="form-control" >
								<div class="invalid-feedback">
								Veuillez entrer un numéro de télèphone de bureau.
								</div>
						</div>						
					</div>
				</div>
				<div class="row">
					<div class="row row100  col-md-12">
						<div class="col-md-6 mb-3">
							<label   for="contFacebook">Facebook</label>
							<input   type="url" value="<?= $contFacebook; ?>" name="contFacebook" class="form-control" placeholder="https://www.facebook.com/user">
								<div class="invalid-feedback">
								Veuillez entrer l'url complet du facebook de l'utilisateur.
								</div>
						</div>
						<div class="col-md-6 mb-3">
							<label   for="contWebsite">Site Web</label>
							<input   type="url"  value="<?= $contWebsite; ?>" name="contWebsite" class="form-control" placeholder="https://www.siteweb.com">
								<div class="invalid-feedback">
								Veuillez entrer l'url complet du site web.
								</div>
						</div>					
					</div>
				</div>
				<hr class="mb-4">
				<h4 class="mb-3">Autres informations</h4>
				<hr class="mb-4">
				<div class="row">
					<div class="mb-3 col-md-12">
						<label  for="firm">Société </label>
						<input type="text" value="<?= $firm; ?>" class="form-control" name="firm" >
					</div>
					<div class="mb-3 col-md-12">
						<label  for="tva">Numéro de TVA </label>
						<input type="text" value="<?= $tva; ?>" class="form-control" name="tva" >
					</div>
					<div class="mb-3 col-md-12">
						<label for="asbl">En rapport avec l'ASBL </label>
						<input type="text" value="<?= $asbl; ?>" class="form-control"  name="asbl" >
					</div>		
					<div class="mb-3 col-md-12">
						<label for="shortDesc">Petite description </label>
						<input  type="textarea" value="<?= $shortDesc; ?>" class="form-control" name="shortDesc" >
					</div>
					<div class="mb-3 col-md-12">
						<label for="longDesc">Autre information</label>
						<input  type="textarea" value="<?= $longDesc; ?>" class="form-control"  name="longDesc" >
					</div>	
				</div>
				<div class="row">
					<div class="col-md-6">				
						<button class="btn btn-primary btn-lg btn-block" type="submit">Enregister</button>
					</div>
					<div class="col-md-6">
						<a class="btn btn-primary btn-lg btn-block"  href="?pageusers=selectAll">Revenir à la liste</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

