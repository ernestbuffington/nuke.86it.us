<?php
if(isset($_REQUEST['op'])) { $op = $_REQUEST['op']; } else { $op = ''; }

switch ($op) {
    case "autotheme":
    	$_REQUEST['op'] = "main";
    	$_REQUEST['module'] = "AutoTheme";
    default:
    	if ($_REQUEST['module'] == "AutoTheme") {
        	include("modules/AutoTheme/admin.php");
        	$func = "AutoTheme_admin_".$_REQUEST['op'];
        	$vars = array_merge($_GET, $_POST);
        	$func($vars);
    	}
    	break;
}
