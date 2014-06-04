<?php
include('Portuguese.lang.php');
include('conn.php');
include('common.php');
//include('mysql_class.php');
/**
* file:	whosonline.php
* 
* 		Keeps track of who is online and displays that info at the bottom of each page.
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

// this is the delay time before the db is updated when a user is no longer online.
$timeoutseconds = 60;
$timestamp = time();
$timeout = $timestamp - $timeoutseconds;
$whosonline_table = "ooz_whosonline"; 
// set the user variable so we can access it for database queries
if ($_SESSION[user] == '' || !isset($_SESSION[user]))
    $user = 'guest123';
else
    $user = $_SESSION[user];
// $sql = "INSERT IGNORE INTO $whosonline_table VALUES ('$timestamp', '$user', '$$_SERVER[REMOTE_ADDR]','$_SERVER[PHP_SELF]')";
$sql = "DELETE FROM $whosonline_table WHERE timestamp = '$timestamp'";
mysql_query($sql);
$sql = "INSERT INTO $whosonline_table VALUES ('$timestamp', '$user', '$_SERVER[REMOTE_ADDR]','$_SERVER[PHP_SELF]')";
mysql_query($sql);
$sql = "DELETE FROM $whosonline_table WHERE timestamp<$timeout";
mysql_query($sql);
$sql = "SELECT DISTINCT ip, user FROM $whosonline_table order by user";
$result = mysql_query($sql);

$i = 0;
while ($row = mysql_fetch_array($result)) {
    $users[$i] = $row[user]; //create array with user names in it.
    $i++;
} 
// get the count of the number of guests online.
$guest_count = 0;
$k = 0;
for($j = 0; $j < sizeof($users); $j++) {
    if ($users[$j] == 'guest123') { // if the user is guest123, add one to the guest count
        $guest_count++;
    } else {
        $online[$k] = $users[$j]; //create the array of user names of those online
        $k++;
    } 
} 
// now $array has a list of all the users that aren't guests.
if (sizeof($online) != 1) {
    echo $lang_thereare . sizeof($online) . $lang_usersand;
} else {
    echo $lang_thereis . sizeof($online) . $lang_userand;
} 

if ($guest_count != 1)
    echo $guest_count . $lang_guests;
else
    echo $guest_count . $lang_guest;

echo "$lang_whosonline: ";
$j = 0;
// now cycle through and print out the names of the people online.
for($i = 0; $i < sizeof($online); $i++) {
    if ($j == 0) {
        if (isSupporter($online[$i])) {
            echo "<b>$online[$i]</b>";
        } else {
            echo "$online[$i]";
        } 
        $j++;
    } else {
        if (isSupporter($array[$i])) {
            echo ", <b>$online[$i]</b>";
        } else {
            echo ", $online[$i]";
        } 
    } 
} 

?>
