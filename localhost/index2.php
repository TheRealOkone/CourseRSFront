<!DOCTYPE html>
<html>
<head>
<script src='/arrows.1.0.0.js' type='text/javascript'></script>
</head>
<body>


<div id="hparent">
<?php

if(isset($_GET["diag"])){
  
    $diag = $_GET["diag"];
}


$sURL = "http://root:root@coursersback.herokuapp.com/api/v1/json?diagram=".$diag;
// $sPD = "";
// $aHTTP = array(
  // 'http' => 
    // array(
    // 'method'  => 'GET',
    // 'header'  => 'Content-type: application/x-www-form-urlencoded',
    // 'content' => $sPD
  // )
// );
// $context = stream_context_create($aHTTP);
// $handle = fopen($sURL, 'r', false, $context);
// $contents = '';
// while (!feof($handle)) {
  // $contents .= fread($handle, 8192);
// }
// fclose($handle);
$contents = file_get_contents($sURL);
echo("<script>console.log('PHP: ".$sURL."');</script>");
echo("<script>console.log('PHP: ".$contents."');</script>");
$array = json_decode($contents);

echo '<div id="parent" style=" text-align: center;">';



$num = [];
$chi = [];
foreach ($array as $key => $value) {
if($value->type == 1){
	$bcolor = 'yellow';
}
else{
	$bcolor = 'white';
}

if(in_array($value->id, $chi))
{
	echo('<div class="floppa'.$value->id.'" style="border: 1px black solid; background-color: '.$bcolor.'; width: 25%; text-align: center; margin: 50px auto; display: inline-block; ">');
}else{
	echo('<div class="floppa'.$value->id.'" style="border: 1px black solid; background-color: '.$bcolor.'; width: 25%; text-align: center; margin: 50px auto; ">');

}

if( count($value->childs) > 1){
	foreach ($value->childs as $v) {
		$chi[] = $v;
	}
}
echo ($key);
echo ('<br>');
echo ($value->id);
echo ($value->type);

foreach ($value->childs as $v) {
	if($v != 0){
		$num[] = "('.floppa".$value->id."', '.floppa".$v."')";
	}
}
echo ('<br>');

echo('</div>');
}
echo('</div>');
?>
<script type='text/javascript'>
var arrowsDrawer1 = $cArrows('#parent');
</script>
<?php
echo ("
<script type='text/javascript'>");

foreach ($num as $v) {
	echo ("arrowsDrawer1.arrow".$v.";");
}


echo ("
</script>
<br><br><br><br><br>
");
?>
</div>
</body>
</html>

