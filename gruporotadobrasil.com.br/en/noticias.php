<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Grupo Rota do Brasil</title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<script type="text/javascript" src="jsor-jcarousel/lib/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jsor-jcarousel/lib/jquery.jcarousel.min.js"></script>
<link rel="stylesheet" type="text/css" href="jsor-jcarousel/skins/tango/skin.css" />

<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel();
	slideShow();
});


function slideShow() {

	//Set the opacity of all images to 0
	$('#gallery a').css({opacity: 0.0});
	
	//Get the first image and display it (set it to full opacity)
	$('#gallery a:first').css({opacity: 1.0});
	
	//Set the caption background to semi-transparent
	$('#gallery .caption').css({opacity: 0.7});

	//Resize the width of the caption according to the image width
	$('#gallery .caption').css({width: $('#gallery a').find('img').css('width')});
	
	//Get the caption of the first image from REL attribute and display it
	$('#gallery .content').html($('#gallery a:first').find('img').attr('rel'))
	.animate({opacity: 0.7}, 400);
	
	//Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
	setInterval('gallery()',3000);
	
}

function gallery() {
	
	//if no IMGs have the show class, grab the first image
	var current = ($('#gallery a.show')?  $('#gallery a.show') : $('#gallery a:first'));

	//Get next image, if it reached the end of the slideshow, rotate it back to the first image
	var next = ((current.next().length) ? ((current.next().hasClass('caption'))? $('#gallery a:first') :current.next()) : $('#gallery a:first'));	
	
	//Get next image caption
	var caption = next.find('img').attr('rel');	
	
	//Set the fade in effect for the next image, show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);

	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
	
	//Set the opacity to 0 and height to 1px
	$('#gallery .caption').animate({opacity: 0.0}, { queue:false, duration:0 }).animate({height: '1px'}, { queue:true, duration:300 });	
	
	//Animate the caption, opacity to 0.7 and heigth to 100px, a slide up effect
	$('#gallery .caption').animate({opacity: 0.7},100 ).animate({height: '100px'},500 );
	
	//Display the content
	$('#gallery .content').html(caption);
	
	
}

</script>
<style type="text/css">
	body{
		font-family:arial
	}

	.clear {
		clear:both
	}

	#gallery {
		position:relative;
		height:360px
	}
	#gallery a {
		float:left;
		position:absolute;
	}
	
	#gallery a img {
		border:none;
	}
	
	#gallery a.show {
		z-index:500
	}

	#gallery .caption {
		z-index:600; 
		background-color:#000; 
		color:#ffffff; 
		height:100px; 
		width:100%; 
		position:absolute;
		bottom:0;
	}

	#gallery .caption .content {
		margin:5px
	}
	
	#gallery .caption .content h3 {
		margin:0;
		padding:0;
		color:#1DCCEF;
	}
	
	
	.linoticias  {
		list-style-type:none;
		margin-bottom: 10px;
		color: red;
	}
</style>
</head>
<body style="margin: 0px 0px 0px 0px; background-image: url('img/degradetopo5.png'); background-repeat: repeat-x;">

<div style="position: absolut; top: 0px; width: 100%; height: 3px; background-color: #014C29;"></div> 

<center>
	<table style="width: 960px;">
	<tr>
		<td>
			<br />
			<table style="width: 100%; height: 90px;">
			<tr>
				<td rowspan="2">&nbsp;</td>
				<td rowspan="2" align="left" id="tdlogo" style="background-image: url('img/logo_gruporotal_pb.png'); background-repeat: no-repeat; width: 135px; height: 70px;"><a href="/" style="text-decoration:none"><div style="width: 100%; height: 70px;">&nbsp;</div></a></td>
				<td align="right" style="font-size: 9px;">
<!-- Bandeiras -->
					<table>
					<tr>
						<td>
							<div id="dvlogin" style=" text-align: center; display: none;">
								User: <input type="text" style="width: 60px; border-color: green; border-style: solid; border-width:1px;" />&nbsp; Pass: <input type="password" style="width: 60px; border-color: green; border-style: solid; border-width:1px;" /> <input value="OK" type="submit" style="border-color: green; border-style: solid; border-width:1px;" />&nbsp;&nbsp;&nbsp;&nbsp;
							</div>					
						</td>
						
						<td>
							<a href="#"><img src="img/cadeado-ico.png" onclick="document.getElementById('dvlogin').style.display = 'block'"  ></a>&nbsp;&nbsp;<a href="/noticias.php"><img src="img/brazil.jpg" ></a>&nbsp;&nbsp;<a href="/en/noticias.php"><img src="img/usa.jpg" ></a>&nbsp;&nbsp;<img src="img/espanha.png" >
						</td>
					</tr>
					</table>	
				</td>
			</tr>
			<tr>
				<td align="right">
					<!--
					<table style="color: #3A3A3D; font-size: 16px; line-height: 18px; text-decoration: none !important;">
					<tr>
						<td><div id="mn1" onmouseover="document.getElementById('mn1').style.backgroundImage='url(img/bgmenu.png)'" onmouseout="document.getElementById('mn1').style.backgroundImage='url()'" style="vertical-align: middle; height: 25px;">Hist�rico</div></td>
						<td style="width: 20px;">&nbsp;</td>
						<td><div id="mn2" onmouseover="document.getElementById('mn2').style.backgroundImage='url(img/bgmenu.png)'" onmouseout="document.getElementById('mn2').style.backgroundImage='url()'" style="vertical-align: middle; height: 25px;">Objetivos</div></td>
						<td style="width: 20px;">&nbsp;</td>
						<td><div id="mn3" onmouseover="document.getElementById('mn3').style.backgroundImage='url(img/bgmenu.png)'" onmouseout="document.getElementById('mn3').style.backgroundImage='url()'" style="vertical-align: middle; height: 25px;">Qualidade</div></td>
						<td style="width: 20px;">&nbsp;</td>
						<td><div id="mn4" onmouseover="document.getElementById('mn4').style.backgroundImage='url(img/bgmenu.png)'" onmouseout="document.getElementById('mn4').style.backgroundImage='url()'" style="vertical-align: middle; height: 25px;">Certifica��es</div></td>
					</tr>
					</table>
					-->
					
										<table style="color: #003F1F; font-size: 16px; line-height: 18px; text-decoration: none !important;">
					<tr>
						<td style="width: 50px;"><div id="mn10" onmouseover="document.getElementById('mn10').style.fontWeight = 'bold'" onmouseout="document.getElementById('mn10').style.fontWeight = ''" style="vertical-align: middle; height: 25px;"><a href="index.html" style="color: #003F1F; font-size: 16px; line-height: 18px; text-decoration: none !important;">Home</a></div></td>
						<td style="width: 20px;">&nbsp;</td>
						<td style="width: 70px;"><div id="mn1" onmouseover="document.getElementById('mn1').style.fontWeight = 'bold'" onmouseout="document.getElementById('mn1').style.fontWeight = ''" style="vertical-align: middle; height: 25px;"><a href="l1.html" style="color: #003F1F; font-size: 16px; line-height: 18px; text-decoration: none !important;">History</a></div></td>
						<td style="width: 20px;">&nbsp;</td>
						<td style="width: 75px;"><div id="mn2" onmouseover="document.getElementById('mn2').style.fontWeight = 'bold'" onmouseout="document.getElementById('mn2').style.fontWeight = ''" style="vertical-align: middle; height: 25px;"><a href="l2.html" style="color: #003F1F; font-size: 16px; line-height: 18px; text-decoration: none !important;">Objectives</a></div></td>
						<td style="width: 20px;">&nbsp;</td>
						<td style="width: 80px;"><div id="mn5" onmouseover="document.getElementById('mn5').style.fontWeight = 'bold'" onmouseout="document.getElementById('mn5').style.fontWeight = ''" style="vertical-align: middle; height: 25px;"><a href="noticias.php" style="color: #003F1F; font-size: 16px; line-height: 18px; text-decoration: none !important;">&nbsp;&nbsp;&nbsp;&nbsp;<b>News</b></a></div></td>
						<td style="width: 20px;">&nbsp;</td>
						<td style="width: 60px;"><div id="mn3" onmouseover="document.getElementById('mn3').style.fontWeight = 'bold'" onmouseout="document.getElementById('mn3').style.fontWeight = ''" style="vertical-align: middle; height: 25px;"><a href="l3.html" style="color: #003F1F; font-size: 16px; line-height: 18px; text-decoration: none !important;">Quality</a></div></td>
						<td style="width: 20px;">&nbsp;</td>
						<td style="width: 100px;"><div id="mn4" onmouseover="document.getElementById('mn4').style.fontWeight = 'bold'" onmouseout="document.getElementById('mn4').style.fontWeight = ''" style="vertical-align: middle; height: 25px;"><a href="l4.html" style="color: #003F1F; font-size: 16px; line-height: 18px; text-decoration: none !important;">Certifications</a></div></td>
					</tr>
					</table>
				</td>
			</tr>
			</table>
			
		</td>
	</tr>
	
	
	
	<tr>
		<td style="background-color: #B9D7BC;"><!-- 014C29 -->
			<img src="img/banner_int.png" width="100%">

			<!--
			<div class="clear"></div>
			-->
		</td>
	</tr>
	
	
	<?php
	$idpost = $_GET["id"];

	mysql_connect("10.0.20.3", "webca_rotanotici", "12qw12qw") or
		die("Could not connect: " . mysql_error());
	mysql_select_db("webca_rotanoticias");

	$todas = "";
	
	if ($idpost == "") {
		$result = mysql_query("SELECT * FROM jos_content WHERE state = 1 AND catid = 2 ORDER BY created DESC");
		
		$todas = "<ul>";
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) { 
			$idnot = $row[0];
			$noticia = $row[1];
			$texto = $row[4];
			$data = $row[10];

			$titulo = "Last news";
			$todas .= "<li class=\"linoticias\"><div><a style=\"text-decoration: none; color: #003f1f\" href=\"noticias.php?id=".$idnot."\">".$noticia."</a></div></li>";
		}
		$todas .= "</ul>";
		mysql_free_result($result);
	} else {
		$result = mysql_query("SELECT * FROM jos_content WHERE state = 1 AND id = ".$idpost." ORDER BY created DESC");
		
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) { 
			$titulo = $row[1];
			$texto = $row[4];
			$data = $row[10];

			$todas .= "<div>".$data."</div><div>".$texto."</div>";
		}

		mysql_free_result($result);
	}
	
	
?>

	
	<tr>
		<td align="left"><br />	
			<div style="background-color: #F8F8F8; border-color: #EAEAEA; border-style: solid;">
				<div style="margin: 25px; color: #5E5E60; font-size: 12px;" align="left">
					<div style="color: #5E5E60; font-size: 18px;" align="left"><?php echo $titulo; ?></div>
					<br /><p>
					<?php echo $todas; ?>
					<br /></p>
				</div>
			</div>		
		</td>
	</tr>
	
	<!--
	<tr>
		<td>
			<div style="position: absolut; top: 0px; width: 960px; height: 3px; background-color: #D1D1D1;"></div>
		</td>
	</tr>
	-->
	
	
	<tr>
		<td>
			
			<font size="1">&nbsp;</font>
			
						
						
			<div id="wrap">

			  <ul id="mycarousel" class="jcarousel-skin-tango">
				<li><a target="_new" href="http://www.rotaconstrutora.com.br/"><img src="http://gruporota.webca.com.br/img/logos_212_color/logo_construtora.png" width="212" alt="" border="0" /></a></li>
				<li><a target="_new" href="http://www.fundacaorotadobrasil.org/"><img src="http://gruporota.webca.com.br/img/logos_212_color/logo_engenharia.png" width="212" alt="" border="0" /></a></li>
				<li><a target="_new" href="http://www.rotacontabil.com.br/"><img src="http://gruporota.webca.com.br/img/logos_212_color/logo_contabil.png" width="212" alt="" border="0" /></a></li>
				<li><a target="_new" href="http://www.fundacaorotadobrasil.org/"><img src="http://gruporota.webca.com.br/img/logos_212_color/logo_fundacao.png" width="212" alt="" border="0" /></a></li>
				<li><a target="_new" href="http://www.fundacaorotadobrasil.org/"><img src="http://gruporota.webca.com.br/img/logos_212_color/logo_logistica.png" width="212" alt="" border="0" /></a></li>
			  </ul>

			</div>


			<!--
			<table style="width: 100%; text-align: center; vertical-align: middle;">
			<tr>
				<td style="width: 160px;"><center><a href="http://www.rotaconstrutora.com.br/" target="_blank"><div id="dv01" onmouseover="document.getElementById('dv01').style.backgroundImage='url(img/logos_194_color/logo_construtora.jpg)'" onmouseout="document.getElementById('dv01').style.backgroundImage='url(img/logos_194_preto/logo_construtora.jpg)'" style="background-image: url(img/logos_194_preto/logo_construtora.jpg); background-repeat: no-repeat; width: 194px; height: 38px; "></div><a></center></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td style="width: 33%;"><center><a href="http://www.rotacontabil.com.br/" target="_blank"><div id="dv04" onmouseover="document.getElementById('dv04').style.backgroundImage='url(img/logos_194_color/logo_engenharia.jpg)'" onmouseout="document.getElementById('dv04').style.backgroundImage='url(img/logos_194_preto/logo_engenharia.jpg)'" style="background-image: url(img/logos_194_preto/logo_engenharia.jpg); background-repeat: no-repeat; width: 194px; height: 38px; "></div></center></td>
				<td style="width: 33%;"><center><a href="http://www.rotacontabil.com.br/" target="_blank"><div id="dv02" onmouseover="document.getElementById('dv02').style.backgroundImage='url(img/logos_194_color/logo_contabil.jpg)'" onmouseout="document.getElementById('dv02').style.backgroundImage='url(img/logos_194_preto/logo_contabil.jpg)'" style="background-image: url(img/logos_194_preto/logo_contabil.jpg); background-repeat: no-repeat; width: 194px; height: 38px; "></div></center></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td style="width: 160px;"><center><a href="http://www.fundacaorotadobrasil.org/" target="_blank"><div id="dv05" onmouseover="document.getElementById('dv05').style.backgroundImage='url(img/logos_194_color/logo_fundacao.jpg)'" onmouseout="document.getElementById('dv05').style.backgroundImage='url(img/logos_194_preto/logo_fundacao.jpg)'" style="background-image: url(img/logos_194_preto/logo_fundacao.jpg); background-repeat: no-repeat; width: 194px; height: 38px; "></div></center></td>
			</tr>
			</table>
			-->
		</td>
	</tr>
	
	
	</table>
</center>



<!-- Rodap� -->
<div style="position: absolut; botton: 0px; width: 100%; height: 44px;">
	<div style="width: 100%; height: 40px;  background-repeat: repeat-x; "> <!-- background-color: #014C29; background-image: url('img/degradetopo2.png'); -->
		<!-- background-color: #F4F4F4;-->
		<div style="width: 960px; width: 100%; height: 15px;  text-align: center; color: #232325; font-size: 10px; line-height: 14px; padding: 13px 0;">
			<center>
				<table style="width: 960px; height: 15px;">
				<tr>
					<td align="left" style="vertical-align: middle; color: #232325">Designed by WebCA Internet - <a href="#" style="color: #232325;">Grupo Rota do Brasil</a><br /><br /></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td align="left">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="315" height="35" id="integrandoodesenv" align="middle">
							<param name="allowScriptAccess" value="sameDomain" />
							<param name="allowFullScreen" value="false" />
							<param name="movie" value="swf/integrandoodesenv.swf" />
							<param name="quality" value="high" />
							<param name="bgcolor" value="#ffffff" />	
							<embed src="swf/integrandoodesenv.swf" quality="high" bgcolor="#ffffff" width="315" height="35" name="integrandoodesenv" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" />
						</object>
						<br /><br />
					</td>
					<td align="right">
					
					<!-- Redes sociais -->
					
					<table>
					<tr>
						<td>Follow Group Route of Brazil | </td>
						<td><div id="ico1" style="background-image: url('img/ico_f_1.png'); background-repeat: no-repeat; width:20px; height:20px;" onmouseover="document.getElementById('ico1').style.backgroundImage='url(img/ico_f_0.png)'" onmouseout="document.getElementById('ico1').style.backgroundImage='url(img/ico_f_1.png)'" /></td>
						<td><div id="ico2" style="background-image: url('img/ico_o_1.png'); background-repeat: no-repeat; width:20px; height:20px;" onmouseover="document.getElementById('ico2').style.backgroundImage='url(img/ico_o_0.png)'" onmouseout="document.getElementById('ico2').style.backgroundImage='url(img/ico_o_1.png)'" /></td>
						<td><div id="ico3" style="background-image: url('img/ico_t_1.png'); background-repeat: no-repeat; width:20px; height:20px;" onmouseover="document.getElementById('ico3').style.backgroundImage='url(img/ico_t_0.png)'" onmouseout="document.getElementById('ico3').style.backgroundImage='url(img/ico_t_1.png)'" /></td>
						<td><div id="ico4" style="background-image: url('img/ico_i_1.png'); background-repeat: no-repeat; width:20px; height:20px;" onmouseover="document.getElementById('ico4').style.backgroundImage='url(img/ico_i_0.png)'" onmouseout="document.getElementById('ico4').style.backgroundImage='url(img/ico_i_1.png)'" /></td>
					</tr>
					</table>
					
					
					</td>
				</tr>
				</table>
			</center>		
		</div>
	</div> 
</div> 

</body>
</html>