<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- TEXTO E LINKS ESQUERDA -->

<style type="text/css" />
.tda {height: 30px; vertical-align: middle; font-size: 18px; font-family: Tahoma; color: #505050; text-align: left; width: 240px; text-decoration: none;}
.tdb {color: #009242;font-size: 12px; text-align: left; text-decoration: none;}
.tbt {text-align: justify; text-justify: newspaper; }
.chr {width: 80%;color: #C9C9C9; background-color: #C9C9C9; height: 1px; border: 0px;}
.lnka { color: #009242; font: normal 12px Arial, Helvetica, sans-serif; text-decoration: none; }
.lnkb { color: #505050; font: normal 12px Arial, Helvetica, sans-serif; text-decoration: none; text-align: justify; }
</style>



<div class="lnkb">

<marquee id="scroller" onmouseover="scroller.stop()" onmouseout="scroller.start()" scrollamount="1" scrolldelay="2" direction="up" width="100%" height="195" frameborder="0" border="1">
<?php
foreach ( simplexml_load_file ("http://www.classecontabil.com.br/noticias/rss")->channel->item as $item )
echo sprintf("<a class=\"lnka\" href=\"%s\" target=\"_blank\">%s<a/><br/>%s<br/><br/>", $item->link, $item->title, $item->description);
//echo sprintf("<a class=\"lnka\">%s<a/><br/>%s<br/><br/>", $item->title, $item->description);
?>
</marquee>
</div>



<!--

http://www.contabeis.com.br/noticias/rss
http://www.contabeis.com.br/artigos/rss
http://www.contabeis.com.br/forum/rss

-->