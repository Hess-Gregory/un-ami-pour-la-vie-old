<?php
session_start();

// Initialisation des items active dans sideBar

        $pageHomeActive= "";
        $pageUsersAdd = "" ;        
        $pageUsersSelectAll = "" ;
        $pageUsersActive = "" ; 
        $pageUsersActive2 = "" ; 
        $pageUsersShow = "" ;

// Chargement du header

require_once("view/html/header.php");


// Switch des items active dans sideBar

if(isset($_GET["pageusers"])){
    require_once("controller/users/switch.php");
}
else {
    $pageHomeActive= "active";
}

// Chargement de la sidebar et topbar

require_once("view/menu/sidebar.php");
require_once("view/menu/topbar.php");

// Chargement du contenu 

require_once("view/html/content-start.php");

        // Switch chargement du contenu des pages

        if(isset($_GET["pageusers"])){
            require_once("controller/users/controller.php");
        }
        else {
            require_once("view/pages/home.php");
        }

// Fin du chargement du contenu

require_once("view/html/content-start.php");

// Chargement du footer

require_once("view/html/footer.php");
 ?>