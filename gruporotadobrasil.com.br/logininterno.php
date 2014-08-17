<?php
	$puser = $_POST["postlogin"];
	$psenha = $_POST["postpassword"];

	

$ubrowser = $_SERVER['HTTP_USER_AGENT'];
$ubrowser = strtoupper($ubrowser);
$iebrws  = strpos($ubrowser, 'CHROME');
$iebrws2 = strpos($ubrowser, 'FIREFOX');
$iebrws3 = strpos($ubrowser, 'SAFARI');
if ($iebrws === false && $iebrws2 === false && $iebrws3 === false) {
	//ie
	?>

<html>
<head>
<META http-equiv="refresh" content="0;URL=http://www.gruporotadobrasil.com/">
</head>
<body> </body>
</html>

	<?php
}
else {
	//NAO ie
	header("Location: http://".$puser.":".$psenha."@www.gruporotadobrasil.com/");
}
?>