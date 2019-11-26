<?php

switch ($_GET["pageusers"]) {
    case 'home':
        $pageHomeActive= "active";
        break;        
    case 'selectAll':
        $pageUsersActive = "active" ; 
        $pageUsersShow = "show" ;
        $pageUsersSelectAll = "active" ;
        break;
    case 'selectOne':
        $pageUsersActive = "active" ; 
        $pageUsersShow = "show" ;
        break;
    case 'add':
        $pageUsersActive = "active" ; 
        $pageUsersShow = "show" ;
        $pageUsersAdd = "active" ;
        break;
    case 'update':
        $pageUsersActive = "active" ; 
        $pageUsersShow = "show" ;
        break;
    case 'delete':
        $pageUsersActive = "active" ; 
        $pageUsersShow = "show" ;
        break;
    default:
        break;
}

?>