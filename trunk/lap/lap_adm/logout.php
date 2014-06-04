<?php

/**
* file: logout.php
*
* 	This file logs out the currently logged in user by destroying all of the session variables and
* 	then deleting the session.
*
/***************************************************************************
*  This program is free software; you can redistribute it and/or
*  modify it under the terms of the GNU General Public
*  License as published by the Free Software Foundation; either
*  version 2.1 of the License, or (at your option) any later version.
*
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
*  General Public License for more details.
*
*  You should have received a copy of the GNU General Public
*  License along with This program; if not, write to:
*    Free Software Foundation, Inc.
*    59 Temple Place
*    Suite 330
*    Boston, MA  02111-1307  USA
*
* Copyright 2006 OneOrZero
* info@oneorzero.com
* http://www.oneorzero.com
* Developers: OneOrZero Team / Contributors: OneOrZero Community
****************************************************************************/

require_once "common.php";
require_once "init_server_settings.php";
require_once "$database.class.php";
require_once "init_ooz.php";

session_start();
// Remove the whos online entry for this user if it exists
$sql = "DELETE FROM $whosonline_table WHERE user = '$_SESSION[user]'";
$db->query($sql);

// Synchronise LDAP and local DB
if ($auth_method != 'DB') {
	$sql = "UPDATE $users_table SET password = '".md5($ldap_bindpwd)."' WHERE user_name = '$_SESSION[user]'";
	$db->query($sql);
}
session_unset();
session_destroy();
if ($ssl == 'On') {
    $referer = eregi_replace("http", "https", $HTTP_REFERER);
} else {
    $referer = $site_url . "/index.php";
}

header("Location: $referer");

?>
