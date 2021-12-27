<html>
<head>
<meta content="text/html;" "charset=utf-8">
<script src='/arrows.1.0.0.js' type='text/javascript'></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div>
<ul id="navbar">
<li><a href="http://localhost/index.php">Выбор диаграммы</a></li>
<li><a href="http://localhost/diagram.php">Отображение диаграммы</a></li>
<li><a href="http://localhost/about.html">О нас</a></li>
</ul>
</div>
<div id="hparent">

<?php

$sURL = "http://root:root@localhost:8080/api/v1/jsondiag";
$sPD = "";
$aHTTP = array(
  'http' =>
    array(
    'method'  => 'GET',
    'header'  => 'Content-type: application/x-www-form-urlencoded',
    'content' => $sPD
  )
);
$context = stream_context_create($aHTTP);
$handle = fopen($sURL, 'r', false, $context);
$contents = '';
while (!feof($handle)) {
  $contents .= fread($handle, 8192);
}
fclose($handle);

$array = json_decode($contents);

echo('<ul id="flopbar">');

foreach ($array as $value) {
	echo('<li><a href="http://localhost/diagram.php?diag='.$value->id.'">Загрузить диаграмму №'.$value->id.'</a></li>');
}

echo('</ul>');
?>


</div>

 <footer class="footer">
    <div class="container foocontent">
        <div class="footer-logo-block">
            <a href="/">
                <img src="MIREA_Gerb_Colour.png" width="100px" alt="">
            </a>
            <div class="footer-copy">
                <span>©2021 Остранков К.Д.</span>
								<br>
				<span><a class="github" href="https://github.com/okone211/RKCHIR_site">Github</a></span>
            </div>

        </div>
        <div class="footer-nav">
            <ul>
<li><a href="http://localhost/index.php">Выбор диаграммы</a></li>
<li><a href="http://localhost/diagram.php">Отображение диаграммы</a></li>
<li><a href="http://localhost/about.html">О нас</a></li>
            </ul>
        </div>
        <div class="footer-contact">
        <div class="widget widget_text"><div class="widget-content">			
		<div class="textwidget">
		<div class="footer__address">
<div class="address-line">119454, ЦФО, г. Москва,</div>
<div class="address-line">Проспект Вернадского, д. 78 </div>
</div></div></div></div>
		<div class="widget widget_text">
		<div class="widget-content">
		<div class="textwidget">
		<p>
		<a href="mailto:ostrankov.k.d@edu.mirea.ru" class="footer__mail">ostrankov.k.d@edu.mirea.ru</a>
		</p>
		</div></div></div>
		<div class="widget widget_text"><div class="widget-content">
		<div class="textwidget"><p><a href="tel:+74954813325" class="footer__tel">+7 499 215-65-65 </a></p>
</div>
		</div></div>                    </div>
    </div>
</footer>
</body>
</html>