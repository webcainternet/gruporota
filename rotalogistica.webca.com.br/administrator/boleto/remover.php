<?php 
session_start();

if(isset($_SESSION['S1'])) {
echo "logado";

mysql_connect("10.0.20.3", "rotacontabil", "webca2011!") or
    die("Could not connect: " . mysql_error());
mysql_select_db("webca_rotacontabil");

mysql_query("DELETE FROM tbl_boleto WHERE id = '".$_GET["id"]."'");

header('Location: /administrator/boleto/index.php');
}
else
{
header('Location: /administrator/boleto/index.php');
}
?>
