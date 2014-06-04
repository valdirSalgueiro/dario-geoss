<?php

/**
* file: style.php
*
* 		This file contains the style sheet.
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

// if the user is not logged in, set the default style sheet.
// otherwise, grab the selected theme from the database.

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE> <?php echo $helpdesk_name;
?></TITLE>
<STYLE type="text/css" media="all">

	BODY {background: <?php echo $theme['bgcolor'];

?> ; color: black;}

	a:link {text-decoration: none; color: <?php echo $theme['link'];

?>;}
	a:visited {text-decoration: none; color: <?php echo $theme['link'];

?>;}
	a:active {text-decoration: none; color: <?php echo $theme['link'];

?>;}
	a:hover {text-decoration: underline; color: <?php echo $theme['link'];

?>;}

	a.kbase:link {text-decoration: underline; font-weight: bold; color: <?php echo $theme['text'];

?>;}
	a.kbase:visited {text-decoration: underline; font-weight: bold; color: <?php echo $theme['text'];

?>;}
	a.kbase:active {text-decoration: underline; font-weight: bold; color: <?php echo $theme['text'];

?>;}
	a.kbase:hover {text-decoration: underline; font-weight: bold; color: <?php echo $theme['text'];

?>;}


	table.border {background: #8C8984; color: black;}
	td {color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
	tr {color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
	td.back {background: #FFFFFF; }
	td.back2 {background: #EEEEEE; }

	td.date {background: #EEEEEE; font-family: Arial; font-size: 12px; color: #000000; }

	td.hf {background: #D0D0D0; font-family: Arial; font-size: 12px; color: #000000; }

	a.hf:link {text-decoration: none; font-weight: normal; font-family: Arial; font-size: 12px; color: #000000; }

	a.hf:visited {text-decoration:none; font-weight: normal; font-family:Arial; font-size: 12px; color:#000000;

}

	a.hf:active {text-decoration: none; font-weight: normal; font-family: Arial; font-size: 12px; color: #000000;}

	a.hf:hover {text-decoration: underline; font-weight: normal; font-family: Aria; font-size: 12px; color: #000000;}

	td.info {background: #336666; font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #FFFFFF;}

	a.info:link {text-decoration: none; font-weight: normal; font-family: Arial; font-size: 12px; color: #FFFFFF;}

	a.info:visited {text-decoration:none; font-weight: normal; font-family: Arial; font-size: 12px; color: #FFFFFF;}

	a.info:active {text-decoration: none; font-weight: normal; font-family: Arial; font-size: 12px; color: #FFFFFF;}

	a.info:hover {text-decoration: underline; font-weight: normal; font-family: Arial; font-size: 12px; color: #FFFFFF;}

<?php

if (eregi("IE", $HTTP_USER_AGENT)) {

    ?>
	select, option, textarea, input {border: 1px solid #8C8984; font-family: Verdana, arial, helvetica, sans-serif; font-size: 	11px; font-weight: bold; background: #EEEEEE; color: #000000;} <?php
} else {

    ?>
	select, option, textarea, input {font-family: Verdana, arial, helvetica, sans-serif; font-size:	11px; background: #EEEEEE;

    color: #000000;}
<?php
}

?>

	td.cat {background: #EEEEEE; font-family: Arial; font-size: 12px; color: #000000;}

	td.stats {background: #EEEEEE; font-family: Arial; font-size: 10px; color: #000000;}

	td.error {background: #EEEEEE; color: #ff0000; font-family: Arial; font-size: 12px;}

	td.subcat {background: #EEEEEE; color: #000000; font-family: Arial; font-size: 12px;}



	input.box {border: 0px;}

	table.border2 {background: #6974b5;}
	td.install {background:#dddddd; color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 12px;}
	table.install {background: #000099;}
	td.head	{background:#6974b5; color: #ffffff; font-family: Arial, Helvetica, sans-serif; font-size: 12px;}
	a.install:link {text-decoration: none; font-weight: normal; font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #6974b5;}
	a.install:visited {text-decoration:none; font-weight: normal; font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #6974b5;}
	a.install:active {text-decoration: none; font-weight: normal; font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000099;}
	a.install:hover {text-decoration: underline; font-weight: normal; font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000099;}

</STYLE>
<script type="text/javascript" src="<?php echo $supporter_site_url;

?>/timer.js"></script>
</HEAD>
