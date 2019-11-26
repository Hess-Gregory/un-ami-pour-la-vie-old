<?php 
class Connection {
	protected function dbConnection(){
		$basededonnees = "mysql:host=localhost;dbname=un_ami_pour_la_vie;charset=utf8";
		$utilisateur = "root";
		$motdepasse = "";
		try{
			$pdo = new PDO($basededonnees, $utilisateur, $motdepasse, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $pdo;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

		

	}
}


 ?>