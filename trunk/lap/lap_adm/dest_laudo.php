<?
session_start();
session_destroy("id"); 

printf("<script>alert('Concluido.');
window.location='ex_aberto.php';</script>");
?>
