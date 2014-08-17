<!-- Cabecalho -->
<html>
<head><title></title></head>
<body style="position: absolute; top: 0px; width: 100%; height: 600px; background-image: url('/templates/theme498/images/degradetopo4i.png'); background-repeat: repeat-x;">


<center><br />&nbsp;<br />&nbsp;
<table border="1" width="700" heigth="500" style="background-attachment: scroll;background-clip: border-box;background-color: #F8F8F8;background-image: none;background-origin: padding-box;border-color: #5E5E60;border-bottom-width: 0px;border-collapse: collapse;border-left-color: #5E5E60;border-left-width: 0px;border-right-color: #5E5E60;border-right-width: 0px;border-top-color: #5E5E60;border-top-width: 0px;color: #5E5E60;display: block;font-family: Arial, Helvetica, sans-serif;font-size: 13px;">
<tr>
<td>
<img src="/templates/theme498/images/logo.png" alt="" />
<center>
<h3>Administra&ccedil;&atilde;o de boletos</h3>










<?php 
session_start();

if ($_POST["senha"] == "12qw12qw") {
	$_SESSION["S1"] = "1";
}

if(isset($_SESSION['S1'])) {
?>

<div style="font-size: 13px;color: #5E5E60;">
<form method="POST" action="inserir.php">
Nosso numero: <input type=text name=nn /> CNPJ: <input type=text name=cnpj />

<select size="1" name="mes">
<option selected value="JAN/2012">JAN/2012</option>
<option value="FEV/2012">FEV/2012</option>
<option value="MAR/2012">MAR/2012</option>
<option value="ABR/2012">ABR/2012</option>
<option value="MAI/2012">MAI/2012</option>
<option value="JUN/2012">JUN/2012</option>
<option value="JUL/2012">JUL/2012</option>
<option value="AGO/2012">AGO/2012</option>
<option value="SET/2012">SET/2012</option>
<option value="OUT/2012">OUT/2012</option>
<option value="NOV/2012">NOV/2012</option>
<option value="DEZ/2012">DEZ/2012</option>
<option value="JAN/2013">JAN/2013</option>
<option value="FEV/2013">FEV/2013</option>
<option value="MAR/2013">MAR/2013</option>
<option value="ABR/2013">ABR/2013</option>
<option value="MAI/2013">MAI/2013</option>
<option value="JUN/2013">JUN/2013</option>
<option value="JUL/2013">JUL/2013</option>
<option value="AGO/2013">AGO/2013</option>
<option value="SET/2013">SET/2013</option>
<option value="OUT/2013">OUT/2013</option>
<option value="NOV/2013">NOV/2013</option>
<option value="DEZ/2013">DEZ/2013</option>
</select>

<input type=submit value=" + "  />
</form>

<br />
<br />


<table style="font-size: 13px;color: #5E5E60;">
<tr>
	<td width="100"><i>Remover</i></td>
	<td width="200"><i>CNPJ</i></td>
	<td width="120"><i>Nosso numero</i></td>
	<td><i>Data</i></td>
</tr>

<?php
mysql_connect("10.0.20.3", "rotacontabil", "webca2011!") or
    die("Could not connect: " . mysql_error());
mysql_select_db("webca_rotacontabil");

$result = mysql_query("SELECT id,cnpj,nn,data FROM `tbl_boleto` ORDER BY id DESC ");

while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
?>

<tr>
	<td><a href="remover.php?id=<?php echo $row[0]; ?>"><input type=submit value=" - "  /></a></td>
	<td><?php echo $row[1]; ?></td>
	<td><?php echo $row[2]; ?></td>
	<td><?php echo $row[3]; ?></td>
</tr>
	
<?php
}

mysql_free_result($result);
?>
</table>
</div>

<br />

<?php
}
else {
?>






<form action="index.php" method="post">
Acesso: <input type=password name=senha /><input type=submit value="Login"  />
</form>

<?php } ?>















<!-- Rodape -->
</center>
<br /><br /><br />
<table>
<td align="left" style="vertical-align: middle; color: #232325;font-family: arial;font-size: 10px;line-height: 14px;">&nbsp;&nbsp;&nbsp;2012 Copyright © - <a href="#" style="color: #232325;">Grupo Rota do Brasil</a><br><br></td></table>
</td>
</tr>
</table>
</body>
</html>
