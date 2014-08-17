<?php
if(!$fp=fopen("http://www4.bcb.gov.br/pec/taxas/batch/taxas.asp?id=txdolar&id=txdolar" ,"r" )) {
echo "Erro ao abrir a página de cotação" ;
exit ;
}

$conteudo = '';
while(!feof($fp)) { // leia o conteúdo da página
$conteudo .= fgets($fp,1024);
}
fclose($fp);

preg_match("/([0-9],[0-9]{2,}).*([0-9],[0-9]{2,})/", $conteudo, $saida);
$taxaCompra = $saida[1];
$taxaVenda = $saida[2];
echo "
<h3>Cota&ccedil;&atilde;o atual do d&oacute;lar</h3>
Taxa de compra: <b>$taxaCompra</b><br>
Taxa de venda : <b>$taxaVenda</b><br>
</pre>
";
?> 