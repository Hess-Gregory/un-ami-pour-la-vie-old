<?php 
require_once("model/User.php");

if(isset($_GET["user"])){	
	try{
		$users = $con->getUser($_GET['user']);


		foreach ($users as $user) {

			$id = $user["id"];
			$login = $user["login"];
			$ROLE_idROLE = $user["ROLE_idROLE"]; 
			$roleName = $user["roleName"];
			$FirstName = $user["FirstName"];
			$lastName = $user["lastName"]; 
			$email = $user["email"];
			$pwd = $user["pwd"]; 
			$adPvStreet = $user["adPvStreet"]; 
			$adPvNum = $user["adPvNum"];
			$adPvZip = $user["adPvZip"];
			$adPvCity = $user["adPvCity"];
			$adPvCountry = $user["adPvCountry"]; 
			if ($adPvCountry === "be"){
				$adPvCountry = "Belgique";
			}
			elseif ($adPvCountry === "fr"){
				$adPvCountry= "France";
			}
			else {
				$adPvCountry = "";
			}
			$adProStreet = $user["adProStreet"]; 
			$adProNum = $user["adProNum"];
			$adProZip = $user["adProZip"];
			$adProCity = $user["adProCity"];
			$adProCountry = $user["adProCountry"]; 
			if ($adProCountry === "be"){
				$adProCountry = "Belgique";
			}
			elseif ($adProCountry === "fr"){
				$adProCountry = "France";
			}
			else {
				$adProCountry = "";
			}
			$contPhonePro = $user["contPhonePro"]; 
			$contPhonePv = $user["contPhonePv"];
			$contPhoneGsm = $user["contPhoneGsm"]; 
			$contFacebook = $user["contFacebook"]; 
			$contWebsite = $user["contWebsite"];
			$sexGenre = $user["sexGenre"];
			$shortDesc = $user["shortDesc"]; 
			$longDesc = $user["longDesc"];
			$birthday = $user["birthday"];
			if (!isset($birthday)){
				$birthdaytype = "text";
			}		
			else {
				$birthdaytype = "date";
			}
			$asbl = $user["asbl"];
			$isActive = $user["isActive"]; 
			if ($isActive === "0"){
				$isActive = "NON";
			}
			else {
				$isActive = "OUI";
			}
			$tva = $user["tva"];
			$addDate = $user["addDate"]; 
			$newDate = date("d/m/Y", strtotime($addDate));
			$newHour = date(" H:i", strtotime($addDate));
			$firm = $user["firm"];
			$str1 ='coucou';
			$userOne =

			" 
  
<php {?>

	<div class='container'>

	<div class='text-center'>
			<h2>Fiche de l'utilisateur (ID $id):
				<br>Login \"$login\"
			</h2>
			<img class='d-block mx-auto'src='public\media\images\user-male-circle.png'alt=''width='300'height='300'>
			<p class='lead'>
			est inscrit depuis le $newDate à  $newHour

		</p>	<br>
		<div class='row'>
		<div class='col-md-6'>				
		<a class='btn btn-primary btn-lg btn-block' href='?pageusers=update&user=$id'>Modifier les informations</a>
		</div>

		<div class='col-md-6'>
			<a class='btn btn-primary btn-lg btn-block' href='?pageusers=selectAll'>Revenir à la liste</a>
		</div>
	</div>
	</div>



	<div class='row'>

		<div class='col-md-12'>
				



				<hr class='mb-4'>
				<h4 class='mb-3'>Login et Rôle</h4>
				<hr class='mb-4'>

				<div class='row'>


					<div class='mb-3 mb-3a col-md-12'>
							<label for='login'>Login</label>
						<div class='input-group'>
							<div class='input-group-prepend'>
							<span class='input-group-text'>@</span>
							</div>
							<input class='form-control' type='text' value='$login'  disabled='disabled'>
						</div>
					</div>

					<div class='mb-3 mb-3a col-md-12'>
						<label for='email'>Email </label>
						<input type='email' class='form-control' value='$email'  disabled='disabled'>

					</div>


					
					<div class='row row100 col-md-12'>
						<div class='col-md-8 mb-3a mb-3'>
							<label  for='ROLE_idROLE'>Son role</label>
							<input type='text' value='$roleName' class='form-control' name='ROLE_idROLE' disabled='disabled'>

						</div>
						<div class='col-md-4 mb-3a mb-3'>
							<label for='isActive'>Peut-il se connecter</label>
							<input name='isActive' class='form-control' value='$isActive'  disabled='disabled'>
						</div>
					</div>

				</div>
			
				<hr class='mb-4'>
				<h4 class='mb-3'>Informations générales</h4>
				<hr class='mb-4'>


				<div class='row'>

					<div class='row row100 col-md-12'>
						<div class='col-md-6 mb-3'>
							<label  for='FirstName'>Prénom</label>
							<input type='text' name='FirstName' class='form-control'  value='$FirstName' disabled='disabled'>
						</div>
						<div class='col-md-6 mb-3'>
							<label  for='lastName'>Nom</label>
							<input type='text' name='lastName' class='form-control' value='$lastName' disabled='disabled'>
						</div>
					</div>
				
					<div class='row row100  col-md-12'>
						<div class='col-md-4 mb-3'>
							<label  for='birthday'>Date de naissance</label>
							<input class='form-control' value='$birthday' type='$birthdaytype' name='birthday' disabled='disabled'>
						</div>
						<div class='col-md-8 mb-3'>
							<label for='sexGenre'>Sexe</label>
							<input type='text' value='$sexGenre' name='sexGenre' class='form-control' disabled='disabled'>
						</div>
					</div>

				</div>
			
				<hr class='mb-4'>
				<h4 class='mb-3'>Adresse Privée</h4>
				<hr class='mb-4'>


				<div class='row'>

					<div class='row  row100 col-md-12'>
						<div class='col-md-2 mb-3'>
						<label for='adPvNum'>Numéro et boite</label>
							<input type='text' value='$adPvNum' class='form-control'name='adPvNum' disabled='disabled'>
						</div>
						<div class='col-md-10 mb-3'>
							<label for='adPvStreet'>Rue</label>
							<input type='text' value='$adPvStreet' class='form-control'name='adPvStreet'  disabled='disabled'>
						</div>
					</div>

					<div class='row row100  col-md-12'>
						<div class='col-md-5 mb-3'>
							<label  for='adPvCountry'>Choisir un pays</label>
								<input type='text' value='$adPvCountry' class='form-control' name='adPvCountry' disabled='disabled'>	
						</div>
						<div class='col-md-4 mb-3'>
							<label for='adPvZip'>Code Postal</label>
							<input   type='text' value='$adPvZip' class='form-control' name='adPvZip'  disabled='disabled'>
						</div>
						<div class='col-md-3 mb-3'>
							<label  for='adPvCity'>Ville</label>
							<input type='text' value='$adPvCity' class='form-control'name='adPvCity'  disabled='disabled'>
						</div>
					</div>

				</div>			
			
				<hr class='mb-4'>
				<h4 class='mb-3'>Adresse Professionnelle</h4>
				<hr class='mb-4'>


				<div class='row'>

					<div class='row row100  col-md-12'>
						<div class='col-md-2 mb-3'>
						<label for='adProNum'>Numéro et boite</label>
							<input type='text' value='$adProNum' class='form-control'name='adProNum' disabled='disabled'>
						</div>
						<div class='col-md-10 mb-3'>
							<label for='adProStreet'>Rue</label>
							<input type='text' value='$adProStreet' class='form-control'name='adProStreet' disabled='disabled'>
						</div>
					</div>

					<div class='row  row100 col-md-12'>
						<div class='col-md-5 mb-3'>
							<label  for='adProCountry'>Choisir un pays</label>
								<input value='$adProCountry' class='form-control'  name='adProCountry' disabled='disabled'>	

						</div>
						<div class='col-md-4 mb-3'>
							<label for='adProZip'>Code Postal</label>
							<input value='$adProZip'  type='text' class='form-control' name='adProZip'  disabled='disabled'>
						</div>
						<div class='col-md-3 mb-3'>
							<label  for='adProCity'>Ville</label>
							<input type='text' value='$adProCity' class='form-control' name='adProCity'  disabled='disabled'>
						</div>
					</div>

				</div>	
			
				<hr class='mb-4'>
				<h4 class='mb-3'>Contacts</h4>
				<hr class='mb-4'>
				
				<div class='row'>
					<div class='row row100  col-md-12'>
						<div class='col-md-4 mb-3'>
							<label   for='contPhonePv'>Télèphone privé</label>
							<input   type='tel' value='$contPhonePv' name='contPhonePv'class='form-control' disabled='disabled'>
						</div>
						<div class='col-md-4 mb-3'>
							<label   for='contPhoneGsm'>GSM</label>
							<input   type='tel' value='$contPhoneGsm' name='contPhoneGsm'class='form-control' disabled='disabled'>
						</div>
						<div class='col-md-4 mb-3'>
							<label   for='contPhonePro'>Télèphone (bureau)</label>
							<input   type='tel' value='$contPhonePro' name='contPhonePro'class='form-control' disabled='disabled'>
						</div>						
					</div>
				</div>

				<div class='row'>
					<div class='row row100  col-md-12'>
						<div class='col-md-6 mb-3'>
							<label   for='contFacebook'>Facebook</label><a href='$contFacebook'>
							<input   type='url' value='$contFacebook' name='contFacebook'class='form-control' disabled='disabled'></a>
						</div>
						<div class='col-md-6 mb-3'>
							<label   for='contWebsite'>Site Web</label><a href='$contWebsite'>
							<input   type='url' value='$contWebsite' name='contWebsite'class='form-control' disabled='disabled'></a>
						</div>					
					</div>
				</div>

				<hr class='mb-4'>
				<h4 class='mb-3'>Autres informations</h4>
				<hr class='mb-4'>

				<div class='row'>

					<div class='mb-3 col-md-12'>
						<label  for='firm'>Société </label>
						<input type='text' value='$firm' class='form-control'name='firm' disabled='disabled'>
					</div>

					<div class='mb-3 col-md-12'>
						<label  for='tva'>Numéro de TVA </label>
						<input type='text' value='$tva' class='form-control'name='tva' disabled='disabled'>
					</div>

					<div class='mb-3 col-md-12'>
						<label for='asbl'>En rapport avec l'ASBL </label>
						<input type='text' value='$asbl' class='form-control' name='asbl' disabled='disabled'>
					</div>					

					<div class='mb-3 col-md-12'>
						<label for='shortDesc'>Petite description </label>
						<input  type='textarea' value='$shortDesc' class='form-control'name='shortDesc' disabled='disabled'>
					</div>
					
					<div class='mb-3 col-md-12'>
						<label for='longDesc'>Autre information</label>
						<input  type='textarea' value='$longDesc' class='form-control' name='longDesc' disabled='disabled'>
					</div>	
				</div>




		</div>
	</div>
</div>



<?php} ?>
  
";
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

	require_once("view/pages/users/selectOne.php");
}

 ?>