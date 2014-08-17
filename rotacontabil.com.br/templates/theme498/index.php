<?php


if ($_SERVER["HTTP_REFERER"] == "") {
	header('Location: http://www.gruporotadobrasil.com.br/');
	exit;
}


/**
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

defined('_JEXEC') or die('Restricted access');
$url = clone(JURI::getInstance());
$path = $this->baseurl.'/templates/'.$this->template;

$showleftColumn = $this->countModules('left');
$showFlashColumn = $this->countModules('top');
$showTopBoxColumn = $this->countModules('user1');
$showFooterBannerColumn = $this->countModules('user2');
$showFooterColumn = $this->countModules('footer');
$showFooterColumn = $this->countModules('calendario');






if(JRequest::getCmd('task') != 'edit') $Edit = false; else $Edit = true;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
<script type="text/javascript" src="<?php echo $path ?>/scripts/jquery.js"></script>


		<script type="text/javascript">
	var $j = jQuery.noConflict();
		$j(document).ready(function(){
		$j('.menu-nav li').hover(
			function() {
				$j(this).addClass("active");
				$j(this).find('.ulwrapper').stop(false, true).slideDown();
				$j(this).find('.ulwrapper .ulwrapper').stop(false, true).slideUp('fast');
			},
			function() {
				$j(this).removeClass("active");        
				$j(this).find('div').stop(false, true).slideUp('fast');
			}
		);
		$j('.ulwrapper').hover(
			function() {
				$j('.parent').addClass("active_tab");
			},
			function() {
				$j('.parent').removeClass("active_tab");        
			}
		);
	});
	</script>



<script type="text/javascript" src="<?php echo $path ?>/scripts/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo $path ?>/scripts/FreeSetC_400.font.js"></script>
<script type="text/javascript" src="<?php echo $path ?>/scripts/cufon-replace.js"></script>



<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>

<link rel="stylesheet" href="<?php echo $path ?>/css/constant.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $path ?>/css/template.css" type="text/css" />
</head>
<body id="body">


<?php
	if ($_GET["id"] == "") {
		?><div style="position: absolute; top: 0px; width: 100%; height: 600px; background-image: url('templates/theme498/images/degradetopo4.png'); background-repeat: repeat-x;"></div>
<?php
	}
	else {
		?><div style="position: absolute; top: 0px; width: 100%; height: 600px; background-image: url('templates/theme498/images/degradetopo4i.png'); background-repeat: repeat-x;"></div>
<?php
	}
?>

<div class="main">
	<!--header-->
    <div class="row-logo row-top-menu">
    	<jdoc:include type="modules" name="user3" style="topmenu" />
        <div class="fleft"><h1 id="logo"><a href="<?php echo $_SERVER['PHP_SELF']?>" title="Deluxe "><img  title="Deluxe " src="<?php echo $path ?>/images/logo.png"   alt="Deluxe "  /></a></h1></div>
        <!-- <div class="clear1"></div> -->
    </div>
	<?php if ($showFlashColumn && $this->params->get('showFlashColumn')) : ?>
    <div class="row-flash"><jdoc:include type="modules" name="top" style="xhtml" /></div>
    <?php endif;?>
    <?php if ($showTopBoxColumn && $option!="com_search"  && !$Edit && $this->params->get('showTopBoxColumn')) : ?>
    <div class="clear"><jdoc:include type="modules" name="user1" style="xhtml" /></div>
     <?php endif;?>
















<!-- BALOES INFERIORES -->

<?php if ($_SERVER["REQUEST_URI"] == "/") { ?>

<style type="text/css" />
.tdba {background-repeat: no-repeat; height: 243px;}
.dva {margin: 10px; font-size: 18px; font-family: Tahoma; color: #505050; text-align: center; width: 223px;}
.dvb {margin-left: 10px;margin-right: 20px;color: #009242;font-size: 12px;}
.dvc {margin-left: 10px;margin-right: 20px;color: #505050;font-size: 12px;}
</style>

<center>
<table border="0" style="text-align: center; width: 100%;">
<tbody>
<tr>

<td class="tdba" style="background-image: url('img/bg-box-home.jpg');">
  <div class="dva">&Aacute;rea Restrita</div>
<center>  <div class="dvb">N&atilde;o possui usu&aacute;rio? Cadastre-se.</div></center>
  

<table cellpadding="5" cellspacing="5">
<tr>
<td style="text-align: right;"><div class="dvc" style="margin-top: 4px;">Login: </div></td>
<td><input type="text" style="width: 140px; border-color: green; border-style: solid; border-width:1px;margin-top: 4px;"></td>
</tr>
<tr>
<td style="text-align: right;"><div class="dvc" style="margin-top: 4px;">Senha: </div></td>
<td><input type="password" style="width: 110px; border-color: green; border-style: solid; border-width:1px; margin-top: 4px;">&nbsp;&nbsp;<input value="OK" type="submit" style="border-color: green; border-style: solid; border-width:1px;"></td>
</tr>
</table>

<br />

  <div class="dva">Newsletter</div>
  


<table cellpadding="5" cellspacing="5">
<tr>
<td style="text-align: right;"><div class="dvc">Email: </div></td>
<td><input type="text" style="width: 110px; border-color: green; border-style: solid; border-width:1px;">&nbsp;&nbsp;<input value="OK" type="submit" style="border-color: green; border-style: solid; border-width:1px;"></td>
</tr>
</table>

<center>  <div class="dvb">Receba novidades por e-mail</div></center>
</td>

<td class="tdba" style="background-image: url('img/bg-box-home.jpg');">
  <div class="dva">Agenda</div>
<center>  <div class="dvb">Agenda Federal</div></center>

<br />

<?php
/*
<div class="clear"><jdoc:include type="modules" name="calendario" style="xhtml" /></div>
*/
?>
<center>
<iframe border="0" src="http://rotacontabil.webca.com.br/external/getcontent/http://www.idealsoftwares.com.br/agendas/cal.php" frameborder="0" noresize="" width="170" height="170" scrolling="no" marginwidth="0" marginheight="0" allowtransparency="true"></iframe>&nbsp;&nbsp;&nbsp;
</center>

</td>

<td class="tdba" style="background-image: url('img/bg-box-home.jpg');">

  <div class="dva">Utilit&aacute;rios Diversos</div>

  <div class="dvb">Utilit&aacute;rios cont&aacute;beis</div>
  <div class="dvc"><a href="http://www.cartorio24horas.com.br/index.php" target="_blank" class="lnka">Cart&oacute;rio 24 horas</a></div>
  <div class="dvc"><a href="javascript:window.open('http://rotacontabil.webca.com.br/external/PraticaContabil.htm', 'camisa', 'width=600, height=720, top=50, left=50, scrollbars=NO');void(0);" class="lnka">Pr&aacute;tica cont&aacute;bil</a></div>
  <div class="dvc"><a href="javascript:window.open('http://www.idealsitecontabil.com.br/modelos_de_contratos', 'modelos','status=yes, width=590, height=590, scrollbars=AUTO'); void(0);" class="lnka">Modelos de Documentos</a></div>
  <div class="dvc"><a href="http://www.calculoexato.com.br/adel/default.asp" target="_blank" class="lnka">C&aacute;lculos Financeiros</a></div>
  <br />
  <div class="dvb">Consultas diversas</div>
  <div class="dvc"><a href="javascript:window.open('http://rotacontabil.webca.com.br/external/PesquisasConsultas.htm','camisa','width=700,height=430,top=50,left=50,scrollbars=NO');void(0);" class="lnka">Pesquisas e Consultas</a></div>
  <div class="dvc"><a href="javascript:window.open('http://rotacontabil.webca.com.br/external/EmissaoAtraso.htm','camisa','width=700,height=290,top=50,left=50,scrollbars=NO');void(0);" class="lnka">Emiss&atilde;o Imp. Atraso</a></div>
  <div class="dvc"><a href="javascript:window.open('http://rotacontabil.webca.com.br/external/NotasFiscais.htm','camisa','width=750,height=600,top=50,left=50,scrollbars=yes');void(0);" class="lnka">Emiss&atilde;o de Notas</a></div>
  <div class="dvc"><a href="javascript:window.open('http://rotacontabil.webca.com.br/external/LinksUteis.htm','camisa','width=450,height=600,top=50,left=50,scrollbars=yes');void(0);" class="lnka">Links &Uacute;teis</a></div>

</td>

<td class="tdba" style="background-image: url('img/bg-box-home.jpg');">
  <div class="dva">Rota Cont&aacute;bil - News</div>
  <div class="dvc">


<iframe name="frnot" src="http://rotacontabil.webca.com.br/external/lernoticia.php" frameborder="0" scrolling="no" width="100%" height="195"></iframe>







  </div>
</td>

</tr>

</tbody></table></center>






<br /><br />
<?php } ?>























     <!--content-->
     <div id="content">
        <div class="clear">
             <!--left-->
            <?php if ($showleftColumn && !$Edit && $this->params->get('showLeftCol')) : ?>
            <div id="left">
                <div class="left-indent">
                    <jdoc:include type="modules" name="left" style="wrapper_box" />
                </div>
            </div>
            <?php endif;?>
            <!--center-->
            <div id="container">
                 <div class="clear">
                    <?php if ($this->getBuffer('message')) : ?>
                    <div class="error err-space">
                        <jdoc:include type="message" />
                    </div>
                    <?php endif; ?>
                    <jdoc:include type="component" />
                </div>
            </div>
        </div>
     </div>

     <?php if ($showFooterBannerColumn && $option!="com_search"  && !$Edit && $this->params->get('showFooterBannerColumn')) : ?>
     <div class="footer-banners clear"><jdoc:include type="modules" name="user2" style="wrapper_box_extra" /></div>
     <?php endif;?>

     <?php if ($showFooterColumn && $option!="com_search"  && !$Edit && $this->params->get('showFooterColumn')) : ?>
     <div class="clear"><jdoc:include type="modules" name="footer" style="xhtml" /></div>
     <?php endif;?>
</div>



<center>
 <table style="width: 960px;">
	
	<tr>
		<td>
			
			<font size="1">&nbsp;</font>
			
			<iframe style="width: 963px; height: 93px; no-scrolling" src="http://rotacontabil.webca.com.br/templates/theme498/jcrl.html" noresize frameborder="0"  scrolling="no"></iframe>

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
<font style="font-size: 1px;"> </font>


<font style="font-size: 1px;"> </font>


<!-- Rodapé -->
<div style="position: absolut; botton: 0px; width: 100%; height: 44px; ">
	<div style="width: 100%; height: 40px;  background-repeat: repeat-x; "> <!-- background-color: #014C29; background-image: url('img/degradetopo2.png'); -->
		<!-- background-color: #F4F4F4;-->
		<div style="width: 960px; width: 100%; height: 15px;  text-align: center; color: #232325; font-size: 10px; line-height: 14px; padding: 13px 0;">
			<center>
				<table border="0" style="width: 960px; height: 15px;">
				<tr>
					<td align="left" style="vertical-align: middle; color: #232325;font-family: arial;font-size: 10px;line-height: 14px; width:320px;">2013 Copyright &copy; - <a href="#" style="color: #232325;">Grupo Rota do Brasil</a><br /><br /></td>
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
					<td style="text-align: right; vertical-align: middle;width: 210px; " align="right">
					
					<table style="width: 210px">
					<tr>
						<td style="vertical-align: middle; font-size: 10px; color: #151515;">Siga a Rota Cont&aacute;bil | </td>
						<td><div id="ico1" style="background-image: url('img/ico_f_1.png'); background-repeat: no-repeat; width:20px; height:20px;" onmouseover="document.getElementById('ico1').style.backgroundImage='url(img/ico_f_0.png)'" onmouseout="document.getElementById('ico1').style.backgroundImage='url(img/ico_f_1.png)'" /></td>
						<td><div id="ico2" style="background-image: url('img/ico_o_1.png'); background-repeat: no-repeat; width:20px; height:20px;" onmouseover="document.getElementById('ico2').style.backgroundImage='url(img/ico_o_0.png)'" onmouseout="document.getElementById('ico2').style.backgroundImage='url(img/ico_o_1.png)'" /></td>
						<td><div id="ico3" style="background-image: url('img/ico_t_1.png'); background-repeat: no-repeat; width:20px; height:20px;" onmouseover="document.getElementById('ico3').style.backgroundImage='url(img/ico_t_0.png)'" onmouseout="document.getElementById('ico3').style.backgroundImage='url(img/ico_t_1.png)'" /></td>
						<td><div id="ico4" style="background-image: url('img/ico_i_1.png'); background-repeat: no-repeat; width:20px; height:20px;" onmouseover="document.getElementById('ico4').style.backgroundImage='url(img/ico_i_0.png)'" onmouseout="document.getElementById('ico4').style.backgroundImage='url(img/ico_i_1.png)'" /></td>
					</tr>
					</table>
					<!--
					&nbsp;<a href="#"><img src="images/stories/topo_img.jpg" ></a>
					-->
					</td>
				</tr>
				</table>
			</center>		
		</div>
	</div> 
</div> 
 




 
 
 
<script type="text/javascript"> Cufon.now(); </script>



			
	<div id="dvlogin" style="position: absolute; top: 5px; right: 30px; text-align: center; display: none; ">
		Usu&aacute;rio: <input type="text" style="width: 60px; border-color: green; border-style: solid; border-width:1px;" />&nbsp; Senha: <input type="password" style="width: 60px; border-color: green; border-style: solid; border-width:1px;" /> <input value="OK" type="submit" style="border-color: green; border-style: solid; border-width:1px;" />&nbsp;&nbsp;&nbsp;&nbsp;
	</div>	

	<div style="position: absolute; top: 20px; width: 100%; height: 60px;display: block; ">
		<center>
		<table style="width: 950px; text-align: right;">
		<tr>

			<td style="text-align: right;">
				<a href="#" onclick="document.getElementById('dvlogin').style.display = 'block'" ><img src="img/cadeado-ico.png" onclick="document.getElementById('dvlogin').style.display = 'block'"  ></a>&nbsp;&nbsp;<a href="http://rotaconstrutora.webca.com.br/"><img src="img/brazil.png" ></a>&nbsp;&nbsp;<img src="img/usa.png" >&nbsp;&nbsp;<img src="img/espanha.png" >
			</td>
		</tr>
		</table>	
		</center>
	</div>
			

	<div id="dvdolar" style="position: absolute; top: 85px; text-align: center; display: block;z-index:100; font-size: 9px; width: 100%;">
		<iframe name="frdolar" src="/external/Dolar.php" width="100%" height="20" frameborder=0 scrolling=no></iframe>
	</div>	
</body>
</html>


