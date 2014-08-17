<?php 
session_start();

if(isset($_SESSION['S1'])) {

$cnpj = $_POST["cnpj"];
//$cnpj = "01.000.000/0001-01";
$cnpj = str_replace(".","",$cnpj);
$cnpj = str_replace("/","",$cnpj);
$cnpj = str_replace("-","",$cnpj);
$cnpj = str_replace("\\","",$cnpj);

mysql_connect("10.0.20.3", "rotacontabil", "webca2011!") or
    die("Could not connect: " . mysql_error());
mysql_select_db("webca_rotacontabil");

mysql_query("INSERT INTO tbl_boleto (cnpj, nn, data) VALUES ('".$cnpj."', '".$_POST["nn"]."','".$_POST["mes"]."')");

header('Location: /administrator/boleto/index.php');
}
else
{
header('Location: /administrator/boleto/index.php');
}
?>
