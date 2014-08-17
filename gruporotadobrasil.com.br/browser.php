<?php
$ubrowser = $_SERVER['HTTP_USER_AGENT'];
$ubrowser = strtoupper($ubrowser);
$iebrws  = strpos($ubrowser, 'CHROME');
$iebrws2 = strpos($ubrowser, 'FIREFOX');
if ($iebrws === false || $iebrws2 === false) {
	echo "Nao IE";
}
else {
	echo $ubrowser;
}
?>