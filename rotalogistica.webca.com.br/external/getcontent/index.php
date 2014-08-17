<center>
<?php
	ini_set("display_errors",1);
	ini_set("display_startup_errors",1);
	error_reporting("E_ALL");
	$gurl = str_replace("/external/getcontent/","",$_SERVER["UNENCODED_URL"]);
	//$gurl = "http://www.idealsoftwares.com.br/agendas/cal.php";
	//$_GET["p"];
	$homepage = file_get_contents("$gurl");
	
	if ($_SERVER["UNENCODED_URL"] == '/external/getcontent/http://www.idealsoftwares.com.br/agendas/cal.php') {
		$homepage = str_replace("Agenda Federal - ","Mes: ",$homepage);
		$homepage = str_replace("TI-IDEAL","Rota Contabil",$homepage);
	}
	else {	
		$homepage = str_replace("Agenda Federal - ","Mes: ",$homepage);
		$homepage = str_replace("TI-IDEAL","Rota Contabil",$homepage);
		$homepage = str_replace('<div id="site">','<div id="site" style="z-index: -200;">',$homepage);
		$homepage = str_replace("</body>",'<div style="position: absolut; top: 0px; left: 0px; width: 300px; height: 80px; z-index: -1; background-color: #FFFFFF;"><img src="http://rotacontabil.webca.com.br/templates/theme498/images/logo.png"></div></body>',$homepage);
	}
	
	echo $homepage;
?>



</center>