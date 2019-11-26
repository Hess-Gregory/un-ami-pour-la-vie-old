  <?php 
  $pageusers = "" ; 
if(isset($_GET["pageusers"])){
	switch ($_GET["pageusers"]) {
		case 'home':
            require_once("view/pages/home.php");
			break;
		case 'selectAll':
			require_once("controller/users/selectAll.php");
            $pageusers = "active" ; 
			break;
		case 'selectOne':
			require_once("controller/users/selectOne.php");
            $pageusers = "active" ; 
			break;
		case 'add':
			require_once("controller/users/add.php");
            $pageusers = "active" ; 
			break;
		case 'update':
			require_once("controller/users/update.php");
            $pageusers = "active" ; 
			break;
		case 'delete':
			require_once("controller/users/delete.php");
            $pageusers = "active" ; 
			break;
		default:
			require_once("view/pages/notfound.php");
			break;
	}
}
else {
	require_once("view/pages/home.php");
}
?>
