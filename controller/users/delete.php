<?php 
require_once("model/User.php");
$_SESSION["id"] = $_GET["user"];

if(isset($_POST["choix"])){
	if($_POST["choix"] === "oui"){
		try
		{
			
			$con->deleteUser();		
			
			header("Location:?pageusers=selectAll");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	else {

		header("Location:?pageusers=selectAll");
	}
}
$p = "";
$users = $con->getUser($_SESSION["id"]);
foreach ($users as $user) {
	$p = $user["lastName"] . " " . $user["FirstName"];	
}
require_once("view/pages/users/delete.php");
 ?>