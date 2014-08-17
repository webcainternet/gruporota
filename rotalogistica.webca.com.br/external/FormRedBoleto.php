<html>

<head>

<script type="text/javascript">
function load()
{
document.getElementById('myform').submit();
}
</script>

</head>

<body onload="load()">
Aguarde!
<div style="display: none;">
	<form id="myform" action="http://www.sicoob.com.br/site/segunda_via_boleto/consulta_dadosBoleto" method="post">
			<input id="cooperativaCliente" name="cooperativaCliente" value="4095/1510-5" maxlength="13" size="20" type="hidden" />   
		<fieldset>
			<legend>Nosso n&uacute;mero:</legend>
			<input id="nossoNumero" name="nossoNumero" value="<?php echo $_GET["id"]; ?>" maxlength="9" size="20" type="hidden" />   
		</fieldset>
		<fieldset><input value="Buscar Boleto" type="submit" onClick="javascript: pageTracker._trackPageview('/boleto/lista_de_boletos_por_dados_do_boleto');" /></fieldset>
	</form>
</div>
</body>