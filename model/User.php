<?php 
require_once("Connection.php");
// ========== MOULE ============
class User extends Connection {

//////////////////////////////////////////////////////////////////////getUsers/////////////////////////////////////////////////////////////////////

	public function getUsers(){
		

		$pdo = $this->dbConnection();
		$requete = "SELECT id, login, ROLE_idROLE, FirstName, lastName, email, pwd, adPvStreet, adPvNum, adPvZip, adPvCity, adPvCountry, 
		adProStreet, adProNum, adProZip, adProCity, adProCountry, contPhonePro, contPhonePv, contPhoneGsm, contFacebook, contWebsite, 
		sexGenre, shortDesc, longDesc, birthday, asbl, isActive, tva, firm, addDate, roleName 
		FROM user LEFT JOIN role ON user.ROLE_idROLE = role.idROLE ORDER BY id";
		$objects = $pdo->query($requete);
		return $objects->fetchAll(PDO::FETCH_ASSOC);
	}



//////////////////////////////////////////////////////////////////////getRoles/////////////////////////////////////////////////////////////////////

	public function getRoles(){


		$pdo = $this->dbConnection();
		$requete = "SELECT idROLE, roleName FROM role ORDER BY idROLE";
		$objects = $pdo->query($requete);
		return $objects->fetchAll(PDO::FETCH_ASSOC);
	}

///////////////////////////////////////////////////////////////////////getUser//////////////////////////////////////////////////////////////////

	public function getUser($id){
		

		$pdo = $this->dbConnection();
		$requete = "SELECT id, login, ROLE_idROLE, FirstName, lastName, email, pwd, adPvStreet, adPvNum, adPvZip, adPvCity, adPvCountry, 
		adProStreet, adProNum, adProZip, adProCity, adProCountry, contPhonePro, contPhonePv, contPhoneGsm, contFacebook, contWebsite, 
		sexGenre, shortDesc, longDesc, birthday, asbl, isActive, tva, firm, addDate, roleName 
		FROM user LEFT JOIN role ON user.ROLE_idROLE = role.idROLE  WHERE id = :id";
	
		$objects = $pdo->prepare($requete);
		$objects->execute(array(
		'id'=>$id
		));
		return $objects->fetchAll(PDO::FETCH_ASSOC);
	}

///////////////////////////////////////////////////////////////////////addUser//////////////////////////////////////////////////////////////////
	public function addUser
	($login,$ROLE_idROLE,$FirstName,$lastName,$email,$pwd,$adPvStreet,$adPvNum,$adPvZip,$adPvCity,$adPvCountry,$adProStreet,$adProNum,$adProZip,
	$adProCity,$adProCountry,$contPhonePro,$contPhonePv,$contPhoneGsm,$contFacebook,$contWebsite,$sexGenre,$shortDesc,$longDesc,$birthday,$asbl,
	$isActive,$tva, $firm)
	{
		


		$pdo = $this->dbConnection();

		$requete = "INSERT INTO user (login,ROLE_idROLE,FirstName,lastName,email,pwd,adPvStreet,adPvNum,adPvZip,adPvCity,adPvCountry,adProStreet,
		adProNum,adProZip,adProCity,adProCountry,contPhonePro,contPhonePv,contPhoneGsm,contFacebook,contWebsite,sexGenre,shortDesc,longDesc,birthday,
		asbl,isActive,tva,firm) 
		VALUES 
		(:login,:ROLE_idROLE,:FirstName,:lastName,:email,:pwd,:adPvStreet,:adPvNum,:adPvZip,:adPvCity,:adPvCountry,:adProStreet,:adProNum,:adProZip,
		:adProCity,:adProCountry,:contPhonePro,:contPhonePv,:contPhoneGsm,:contFacebook,:contWebsite,:sexGenre,:shortDesc,:longDesc,:birthday,:asbl,
		:isActive,:tva,:firm)";
		
		$objects = $pdo->prepare($requete);

		$objects->execute(array
		('login'=>$login,'ROLE_idROLE'=>$ROLE_idROLE,'FirstName'=>$FirstName,'lastName'=>$lastName,'email'=>$email,'pwd'=>$pwd,
		'adPvStreet'=>$adPvStreet,'adPvNum'=>$adPvNum,'adPvZip'=>$adPvZip,'adPvCity'=>$adPvCity,'adPvCountry'=>$adPvCountry,'adProStreet'=>$adProStreet,
		'adProNum'=>$adProNum,'adProZip'=>$adProZip,'adProCity'=>$adProCity,'adProCountry'=>$adProCountry,'contPhonePro'=>$contPhonePro,
		'contPhonePv'=>$contPhonePv,'contPhoneGsm'=>$contPhoneGsm,'contFacebook'=>$contFacebook,'contWebsite'=>$contWebsite,'sexGenre'=>$sexGenre,
		'shortDesc'=>$shortDesc,'longDesc'=>$longDesc,'birthday'=>$birthday,'asbl'=>$asbl,'isActive'=>$isActive,'tva'=>$tva,'firm'=>$firm)
		) ;

	}

////////////////////////////////////////////////////////////////////////updateUser////////////////////////////////////////////////////////////////


	public function updateUser
	($id,$login, $ROLE_idROLE, $FirstName, $lastName, $email, $pwd, $adPvStreet, $adPvNum, $adPvZip, $adPvCity, $adPvCountry,$adProStreet, $adProNum, 
	$adProZip, $adProCity, $adProCountry, $contPhonePro, $contPhonePv, $contPhoneGsm, $contFacebook, $contWebsite, $sexGenre, $shortDesc, $longDesc, 
	$birthday, $asbl, $isActive, $tva, $firm)
		{
			
		$pdo = $this->dbConnection();
		$requete = "UPDATE user SET 
		login= :login, ROLE_idROLE = :ROLE_idROLE, FirstName = :FirstName, lastName = :lastName, email = :email, pwd = :pwd, adPvStreet = :adPvStreet, 
		adPvNum = :adPvNum,adPvZip = :adPvZip, adPvCity = :adPvCity, adPvCountry = :adPvCountry, adProStreet = :adProStreet, adProNum = :adProNum, 
		adProZip = :adProZip,adProCity = :adProCity, adProCountry = :adProCountry, contPhonePro = :contPhonePro, contPhonePv = :contPhonePv, 
		contPhoneGsm = :contPhoneGsm,contFacebook = :contFacebook, contWebsite = :contWebsite, sexGenre = :sexGenre, shortDesc = :shortDesc, 
		longDesc = :longDesc, birthday = :birthday, asbl = :asbl, isActive = :isActive, tva = :tva, firm = :firm 	
		WHERE id = :id";

		$objects = $pdo->prepare($requete);
		$objects->execute(array(
			'id'=>$id,'login'=>$login,'ROLE_idROLE'=>$ROLE_idROLE,'FirstName'=>$FirstName,'lastName'=>$lastName,'email'=>$email,'pwd'=>$pwd,
			'adPvStreet'=>$adPvStreet,'adPvNum'=>$adPvNum,'adPvZip'=>$adPvZip,'adPvCity'=>$adPvCity,'adPvCountry'=>$adPvCountry,'adProStreet'=>$adProStreet,
			'adProNum'=>$adProNum,'adProZip'=>$adProZip,'adProCity'=>$adProCity,'adProCountry'=>$adProCountry,'contPhonePro'=>$contPhonePro,'contPhonePv'=>$contPhonePv,
			'contPhoneGsm'=>$contPhoneGsm,'contFacebook'=>$contFacebook,'contWebsite'=>$contWebsite,'sexGenre'=>$sexGenre,'shortDesc'=>$shortDesc,'longDesc'=>$longDesc,
			'birthday'=>$birthday,'asbl'=>$asbl,'isActive'=>$isActive,'tva'=>$tva,'firm'=>$firm
		));
	}

//////////////////////////////////////////////////////////////////////deleteUser/////////////////////////////////////////////////////////////////


	public function deleteUser(){
		$pdo = $this->dbConnection();
		$requete = "DELETE FROM user WHERE id = :id";
		
		$objects = $pdo->prepare($requete);
		$objects->execute(array(
			'id'=>$_SESSION['id']
		));
	}


}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



// ++++ gateau +++ instance/objet
$con = new User();
 ?>