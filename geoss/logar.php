<?php
session_start();
include_once("class.database.php");

$db = Database::getConnection(); 

function post($key) {
    if (isset($_REQUEST[$key]))
        return $_REQUEST[$key];
    return false;
}

$user = post('user');
$password = post('password');
$contrat_acesso = post('contrat_acesso');

$resp = new stdClass();	
$resp->success = false;

$query="SELECT * FROM cad_usuarios WHERE (login_nome = '$user') and (senha = '$password') and (contrat_acesso='$contrat_acesso')";
$login = $db->query($query);

if ($login->num_rows == 1) {
$_SESSION['user'] = $user;
$resp->success = true;
}
else {
$resp->success = false;
}

echo json_encode($resp);

?>