<?php
session_start();
$arh=array("zip","rar","7-zip","phar" );
$path=$_FILES['userfile']['name'];
//$path_file=$_FILES['userfile']['tmp_name'];
//copy($path_file,'/test');

$_SESSION['path']=$path;
//$_SESSION['path_file']=$path_file;
$ext = pathinfo($path, PATHINFO_EXTENSION);
echo 'Расширение нашего файла - '. $ext;
if (in_array($ext, $arh))
{
echo "<h4>Необходима архивация файла. Нажмите кнопку снизу<h4> <br>";
echo '<a href=/arhive.php>Unzip</a>';
}
else
{
echo "<h4>Нее, только архивы. Возврат на главную страницу через 5 секунд<h4><br>";
sleep(5);
 header('Refresh: 5; URL=/index.php'); 
}
/*if(isset ($_POST['submit']))
{
	

$path = $_POST['userfile'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
echo $ext;
}
else
{
	echo ("errors");
}*/
?>