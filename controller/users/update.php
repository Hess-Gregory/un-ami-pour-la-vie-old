<?php
require_once("model/User.php");
$error = "";
$_POST["id"] = $_GET['user'];
$id = $_POST["id"] ;

$users = $con->getUser($_GET['user']);
foreach ($users as $user)
{
$login = $user["login"];
}

if(isset($_POST["login"],$_POST["ROLE_idROLE"],$_POST["id"]))
{

	

	if(trim($_POST["login"]) != "" && trim($_POST["id"] != ""))
	{
		try
		{
			$Newlogin= $_POST["login"];
			$Newpwd= $_POST["pwd"];
			$NewEmail=$_POST["email"];
			$activeis= $_POST["isActive"];
if (!empty($_POST["email"])) { $mailfail="";} else { $mailfail="- Adresse Email<br>";}
if (!empty($_POST["pwd"])) { $pwdfail="";} else { $pwdfail="- Mot de Passe";}
			if ( ($_POST["isActive"] === "0")  ||
			(!empty($_POST["email"]) and !empty($_POST["pwd"])) )  
		   
	   
	   {
	   			$users = $con->updateUser($_POST["id"], $_POST["login"], $_POST["ROLE_idROLE"], $_POST["FirstName"], $_POST["lastName"], $_POST["email"], $_POST["pwd"], $_POST["adPvStreet"], $_POST["adPvNum"], $_POST["adPvZip"], $_POST["adPvCity"], $_POST["adPvCountry"], $_POST["adProStreet"], $_POST["adProNum"], $_POST["adProZip"], $_POST["adProCity"], $_POST["adProCountry"], $_POST["contPhonePro"], $_POST["contPhonePv"], $_POST["contPhoneGsm"], $_POST["contFacebook"], $_POST["contWebsite"], $_POST["sexGenre"], $_POST["shortDesc"], $_POST["longDesc"], $_POST["birthday"], $_POST["asbl"], $_POST["isActive"], $_POST["tva"], $_POST["firm"]);
				
				echo "<h2 style='color:green ; text-align:center;'>L'utilisateur (ID $id):
			Login \"$Newlogin\" est modifié.
		</h2>
		<img class='d-block mx-auto mb-4'src='public\media\images\user-male-circle.png'alt=''width='300'height='300'>
			<div class='row'>
			<div class='col-md-6'>				
			<a class='btn btn-primary btn-lg btn-block' href='?pageusers=selectOne&user=$id'>Vérifier l'utilisateur</a>
			</div>
	
			<div class='col-md-6'>
				<a class='btn btn-primary btn-lg btn-block' href='?pageusers=selectAll'>Revenir à la liste</a>
			</div>
		</div>";
		} else {echo"
			<h2  style='color:red; text-align:center;'>ERREUR :
		</h2>
		<p style=color:black;>Pour permettre l'utlisateur de se connecter, veuillez remplir les champs suivant : <br>$mailfail $pwdfail</p>
		<img class='d-block mx-auto mb-4'src='public\media\images\user-male-circle.png'alt=''width='300'height='300'>
			<div class='row'>
			<div class='col-md-6'>				
			<a class='btn btn-primary btn-lg btn-block' href='?pageusers=selectOne&user=$id'>Vérifier l'utilisateur</a>
			</div>
	
			<div class='col-md-6'>
				<a class='btn btn-primary btn-lg btn-block' href='?pageusers=selectAll'>Revenir à la liste</a>
			</div>
		</div>
			
			
			";} 
			exit;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	else {
		$id=$_POST["id"];
		$error = "<p style=color:red;>Veuillez remplir correctement les champs</p>";
		header("Location:?section=update&user='. $id .' ");
	}
}
else if(isset($_GET["user"])){
		try
		{
			$users = $con->getUser($_GET['user']);
			foreach ($users as $user)
			{
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
					$adPvCountryName = "Belgique";
				}
				elseif ($adPvCountry === "fr"){
					$adPvCountryName = "France";
				}
				else {
					$adPvCountryName = "Choix...";
				}
				$adProStreet = $user["adProStreet"];
				$adProNum = $user["adProNum"];
				$adProZip = $user["adProZip"];
				$adProCity = $user["adProCity"];
				$adProCountry = $user["adProCountry"];
				if ($adProCountry === "be"){
					$adProCountryName = "Belgique";
				}
				elseif ($adProCountry === "fr"){
					$adProCountryName = "France";
				}
				else {
					$adProCountryName = "Choix...";
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
				$asbl = $user["asbl"];
				$isActive = $user["isActive"];
				if ($isActive === "0"){
					$isActiveName = "NON";
				}
				else {
					$isActiveName = "OUI";
					
				}
				$tva = $user["tva"];
				$addDate = $user["addDate"];
				$newDate = date("d/m/Y", strtotime($addDate));
				$newHour = date(" H:i", strtotime($addDate));
				$firm = $user["firm"];
				$optionRole= "";
				$roles = $con->getRoles();
				foreach ($roles as $role)
				{
					$optionRole .= '<option value=" '  . $role["idROLE"] .  ' ">'  . $role["roleName"] .  '</option>';
				}
			}
			require_once("view/pages/users/update.php");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
}
else
{
	require_once("view/pages/users/notfound.php");
}
 ?>