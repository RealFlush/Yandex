<?php
function fileext ($file) {
$p = pathinfo($file);
return $p['extension'];
}

require_once('pclzip/pclzip.php'); 
session_start();
$path=$_SESSION['path'];
//echo $path;
$basedir = getcwd();
$basedir = str_replace('\\','/',$basedir);  
$p_out=$basedir."/downloads/";

$zip = new PclZip($p_out.$path);

echo "<br><b>Starting to decompress...</b><br>";
if ($zip->extract() == 0) {
die("Error : ".$zip->errorInfo(true));
echo '<br> <a href="/index.php">MainPage</a> <br>';
}
else{
	
//$zip->extract();
echo "Archive sucessfuly extracted!<br>\n";
echo "<h2>Analyse is coming...<h2><br>";
sleep(5);
 header('Refresh: 5; URL=/analyze.php'); 
 //$file = basename($basedir, ".csv");
 $haystack = $path;
$needle   = '.';
$path=substr($path,0,strripos($haystack, $needle)).".csv";
$_SESSION['path']=$path;
//echo($path);
 //echo $file;
}

?>