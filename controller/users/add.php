<?php 
//require_once("model/User.php");
require_once("../api_auth/api/objects/user.php");

$error = "";
$optionRole= "";
$roles = $con->getRoles();	
	foreach ($roles as $role) 
	{
		$optionRole .= '<option value=" '  . $role["idROLE"] .  ' ">'  . $role["roleName"] .  '</option>';
	}
	$loginred ="";
	$mailred="";
	$pwdred="";
	$rolered="";
	$prenomred="";
	$nomred="";

	if (!empty($_POST["login"])) { $loginfail="";} else { $loginfail="- Login<br>";}
	if (!empty($_POST["ROLE_idROLE"])) { $rolefail="";} else { $rolefail="- Role<br>";}
	if (!empty($_POST["email"])) { $mailfail="";} else { $mailfail="- Adresse Email<br>";}
	if (!empty($_POST["FirstName"])) { $prenomfail="";} else { $prenomfail="- Prénom<br>";}		
	if (!empty($_POST["lastName"])) { $nomfail="";} else { $nomfail="- Nom<br>";}
	if (!empty($_POST["pwd"])) { $pwdfail="";} else { $pwdfail="- Mot de Passe<br>";}
if(isset($_POST["login"], $_POST["ROLE_idROLE"], $_POST["email"] , $_POST["FirstName"], $_POST["lastName"] ))
	{
		if(trim($_POST["login"]) != "" && trim($_POST["ROLE_idROLE"]) && trim($_POST["email"]) && trim($_POST["FirstName"]) && trim($_POST["lastName"]) )
			{		
				try
					{
						$mail=$_POST["login"];
						$birt= $_POST["birthday"];
						if (!empty($_POST["adPvZip"])) { $_POST["adPvZip"]="0000"; } else {}
						if ( ($_POST["isActive"] === "0")  ||
						(!empty($_POST["email"]) and !empty($_POST["pwd"])) )  
						{
							$users = $con->addUser(
									$_POST["login"], 
									$_POST["ROLE_idROLE"], 
									$_POST["FirstName"], 
									$_POST["lastName"], 
									$_POST["email"], 
									$_POST["pwd"], 
									$_POST["adPvStreet"], 
									$_POST["adPvNum"], 
									$_POST["adPvZip"], 
									$_POST["adPvCity"], 
									$_POST["adPvCountry"], 
									$_POST["adProStreet"], 
									$_POST["adProNum"], 
									$_POST["adProZip"], 
									$_POST["adProCity"], 
									$_POST["adProCountry"], 
									$_POST["contPhonePro"], 
									$_POST["contPhonePv"], 
									$_POST["contPhoneGsm"], 
									$_POST["contFacebook"], 
									$_POST["contWebsite"], 
									$_POST["sexGenre"], 
									$_POST["shortDesc"], 
									$_POST["longDesc"], 
									$_POST["birthday"], 
									$_POST["asbl"], 
									$_POST["isActive"], 
									$_POST["tva"], 
									$_POST["firm"]);			

										echo "
										<h2 style='color:green ; text-align:center;'>L'utilisateur: Login \"$mail\" est ajouté.</h2>
										<img class='d-block mx-auto mb-4'src='public\media\images\user-male-circle.png'alt=''width='300'height='300'>
											<div class='row'>
											<div class='col-md-6'>				
											<a class='btn btn-primary btn-lg btn-block' href='?pageusers=add'>Ajouter un nouveau</a>
											</div>
											<div class='col-md-6'>
												<a class='btn btn-primary btn-lg btn-block' href='?pageusers=selectAll'>Revenir à la liste</a>
											</div>
										</div>";
										exit;
						} 
						else 
	
						{
							if(empty($_POST["mail"])) { $mailred="border-danger";} else { $mailred="border-success";}
							if(empty($_POST["pwd"])) { $pwdred="border-danger";} else { $pwdred="border-success";}
							if(empty($_POST["ROLE_idROLE"])) { $rolered="border-danger";} else { $rolered="border-success";}
							if(empty($_POST["login"])) { $loginred="border-danger";} else { $loginred="border-success";}
							$mailred = "border-danger";
							$error = "
							<h2  style='color:red; text-align:center;'>ERREUR :</h2>
							<p style=color:black;>Pour permettre l'utlisateur de se connecter, veuillez remplir les champs suivant :<br> 
							<br>$mailfail $pwdfail</p>";
						} 
					}
					catch(PDOException $e)
					{
						echo $e->getMessage();
					}

		}
			else 
			{
				if(empty($_POST["mail"])) { $mailred="border-danger";} else { $mailred="border-success";}
				if(empty($_POST["ROLE_idROLE"])) { $rolered="border-danger";} else { $rolered="border-success";}
				if(empty($_POST["login"])) { $loginred="border-danger";} else { $loginred="border-success";}
				if(empty($_POST["FirstName"])) { $prenomred="border-danger";} else { $prenomred="border-success";}
				if(empty($_POST["lastName"])) { $nomred="border-danger";} else { $nomred="border-success";}
				$error = "<p style=color:red;>Veuillez remplir correctement les champs:<br>$loginfail $mailfail $pwdfail $rolefail $prenomfail $nomfail </p>";
			}	
	}

require_once("view/pages/users/add.php");

 ?>