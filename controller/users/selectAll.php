<?php 
require_once("model/User.php");
try
{
$pageusers = "active" ; 

	$title="Vos contacts et utlisateurs";
	$table = "<div class='card-body'><div class='table-responsive'><table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
	$table .= "	<thead><tr><th></th><th>id</th><th>Nom</th><th>Prénom</th><th>Login</th><th>Adresse Email</th><th>Role</th><th>Activation</th><th>Date Inscription</th><th></th></tr></thead><tfoot><tr><th></th><th>id</th><th>Nom</th><th>Prénom</th><th>Login</th><th>Adresse Email</th><th>Role</th><th>Activation</th><th>Date Inscription</th><th></th></tr></tfoot><tbody>";
	$users = $con->getUsers();
	foreach ($users as $user) {
		$isActive = $user["isActive"]; 
if ($isActive === "0"){
	$isActive = "NON";
}
else {
	$isActive = "OUI";
}
		$table .=  '<tr class="table-row" data-href="?pageusers=selectOne&user=' . $user["id"].'"><td><a class="btn-update" href="?pageusers=update&user=' . $user["id"].'">&#9998;</a></td>';
		$table .= '<td>' . $user["id"] . '</td>';
		$table .= '<td>' . $user['lastName'] . '</td>';
		$table .= '<td>' . $user['FirstName'] . '</td>';
		$table .= '<td>' . $user['login'] . '</td>';
		$table .= '<td>' . $user['email'] . '</td>';
		$table .= '<td>' . $user['roleName'] . '</td>';
		$table .= '<td>' . $isActive. '</td>';
		$newDate = date("d/m/Y", strtotime($user['addDate']));
		$newHour = date(" H:i", strtotime($user['addDate']));
		$table .= '<td> Le ' . $newDate . ' à ' . $newHour . '</td>';
		$table .= '<td><a class="btn-delete" href="?pageusers=delete&user=' . $user["id"].'">&#128465;</a></td></tr>';
	}
	$table.="</tbody></table></div></div>";
	require_once("view/pages/users/selectAll.php");
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
 ?>