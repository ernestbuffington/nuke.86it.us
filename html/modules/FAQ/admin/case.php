<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* http://www.phpnuke.coders.exchange                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}

$module_name = "FAQ";
include_secure("modules/$module_name/admin/language/lang-".$currentlang.".php");

switch($op) {

    case "FaqCatSave":
    case "FaqCatGoSave":
    case "FaqCatAdd":
    case "FaqCatGoAdd":
    case "FaqCatEdit":
    case "FaqCatGoEdit":
    case "FaqCatDel":
    case "FaqCatGoDel":
    case "FaqAdmin":
    case "FaqCatGo":
    include ("modules/$module_name/admin/index.php");
    break;

}

?>
