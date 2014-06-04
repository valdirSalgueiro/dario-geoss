<?php
/**
 * file:	database.class.php
 *
 * 	This file contains the mysql database class.
 *
 * /***************************************************************************
 *   This program is free software; you can redistribute it and/or
 *   modify it under the terms of the GNU General Public
 *   License as published by the Free Software Foundation; either
 *   version 2.1 of the License, or (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 *   General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public
 *   License along with This program; if not, write to:
 *     Free Software Foundation, Inc.
 *     59 Temple Place
 *     Suite 330
 *     Boston, MA  02111-1307  USA
 *
 * Copyright 2006 OneOrZero
 * info@oneorzero.com
 * http://www.oneorzero.com
 * Developers: OneOrZero Team / Contributors: OneOrZero Community
 */

class MySQL {
    var $db_host;
    var $db_user;
    var $db_pwd;
    var $db_name;
    var $queries = 0;
    var $connections = 0;
    var $link;

    function set($db_host, $db_user, $db_pwd, $db_name)
    {

        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pwd = $db_pwd;
        $this->db_name = $db_name;
  
    }

    function connect()
    {
        // connect to mysql
        $this->link = mysql_connect($this->db_host, $this->db_user, $this->db_pwd)
        or die("Could not connect to mysql server: " . mysql_error());
        // connect to the database
        mysql_select_db($this->db_name, $this->link)
        or die("Database: database not found");
        $this->connections++;
        // return $db_link for other functions
        // return $link;
    }

    function query($sql)
    {
        //echo $sql . "<br>";
        if (!isset($this->link)) {
            $this->connect();
        }
        $result = mysql_query($sql, $this->link)
        or die("Invalid query: " . mysql_error());
        // used for other functions
        $this->queries++;
        return $result;
    }

    function fetch_array($result)
    {
        // create an array called $row
        $row = mysql_fetch_array($result);
        // return the array $row or false if none found
        return $row;
    }

    function num_rows($result)
    {
        // determine row count
        $num_rows = mysql_num_rows($result);
        // return the row count or false if none foune
        return $num_rows;
    }

    function insert_id()
    {
        // connect to the database
        // $link = $this->connect();
        // Get the ID generated from the previous INSERT operation
        $last_id = mysql_insert_id($this->link);
        // return last ID
        return $last_id;
    }

    function num_fields($result)
    {
        $result = mysql_num_fields($result);
        return $result;
    }
}

?>