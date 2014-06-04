<?
if(!isset($_SESSION)) 
{ 
session_start(); 
}
$db='fifabr_laboratorio';

//$conn=mysqli_connect('localhost','fifabr','cont123brjradm');
$conn=mysqli_connect('localhost','root','');

mysqli_select_db ( $conn , $db )
?>