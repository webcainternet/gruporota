<html>
<head>
<link rel="stylesheet" href="/template/theme498/css/constant.css" type="text/css" />
<link rel="stylesheet" href="/template/theme498/css/template.css" type="text/css" />
</head>
<body id="body">

			<div id="dvdolar" style="position: absolute; top: 0px; text-align: center; display: block;z-index:100; font-size: 8px; width: 100%; color: #dddddd;">
				<center><table style="width: 960px; "><tr><td style="text-align: right;color: #303030;">
				<?php
				if(!$fp=fopen("http://www4.bcb.gov.br/pec/taxas/batch/taxas.asp?id=txdolar&id=txdolar" ,"r" )) {
				?>
				<script type="text/javascript">
					document.getElementById('dvdolar').style.backgroundImage='url(img/ico_f_0.png)'/
				</script>
				<?php
				//exit ;
				}

				$conteudo = '';
				while(!feof($fp)) { // leia o conteúdo da p&aacute;gina
				$conteudo .= fgets($fp,1024);
				}
				fclose($fp);

				preg_match("/([0-9],[0-9]{2,}).*([0-9],[0-9]{2,})/", $conteudo, $saida);
				$taxaCompra = $saida[1];
				$taxaVenda = $saida[2];
				echo "<div style=\"font-size: 12px; padding-right: 20px;\">
				<img src='/img/icodolar.png' alt='' border=0 /> D&oacute;lar - Taxa de compra: <b>$taxaCompra</b> | Taxa de venda : <b>$taxaVenda</b>
				</div>";
				?> 
				</td></tr></table></center>
			</div>
</body>