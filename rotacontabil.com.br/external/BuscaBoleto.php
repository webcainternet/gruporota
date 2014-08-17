<body>
<div style="color: #5E5E60; font: normal 13px/18px Arial, Helvetica, sans-serif; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; line-height: 18px;">
<?php 
$cnpj = $_POST["cnpj"];
//$cnpj = "01.000.000/0001-01";
$cnpj = str_replace(".","",$cnpj);
$cnpj = str_replace("/","",$cnpj);
$cnpj = str_replace("-","",$cnpj);
$cnpj = str_replace("\\","",$cnpj);

echo "Busca por: " . $cnpj . "<br /><br />";
if ($cnpj == 'teste1') {
	echo "Nosso numero: 227-3 (03/2012)";
}
else
{ ?>

	<?php
	mysql_connect("10.0.20.3", "rotacontabil", "webca2011!") or
		die("Could not connect: " . mysql_error());
	mysql_select_db("webca_rotacontabil");

	$result = mysql_query("SELECT id,cnpj,nn,data FROM `tbl_boleto` WHERE cnpj = '".$cnpj."'");

	$virg=0;
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		if ($virg == 0) { echo "Nosso numero: <a href='/external/FormRedBoleto.php?id=".$row[2]."' target='_blank'>".$row[2]."</a> (".$row[3].")"; $virg++; }
		else { echo ", <a href='/external/FormRedBoleto.php?id=".$row[2]."' target='_blank'>".$row[2]."</a> (".$row[3].")"; }
	}

	mysql_free_result($result);
	
	if ($virg==0) { echo "Nenhum resultado encontrado!"; }
} ?>

</div>