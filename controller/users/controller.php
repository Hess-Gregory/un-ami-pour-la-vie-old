<?php 
	switch ($_GET["pageusers"]) {
		case 'home':
            require_once("view/pages/home.php");
			break;
		case 'selectAll':
			require_once("controller/users/selectAll.php");
			break;
		case 'selectOne':
			require_once("controller/users/selectOne.php");
			break;
		case 'add':
			require_once("controller/users/add.php");
			break;
		case 'update':
			require_once("controller/users/update.php");
			break;
		case 'delete':
			require_once("controller/users/delete.php");
			break;
		default:
			require_once("view/pages/notfound.php");
			break;
    }
?>    