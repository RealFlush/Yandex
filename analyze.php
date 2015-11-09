<?php
session_start();
error_reporting(E_ALL | E_STRICT);
//ini_set('default_charset','UTF-8');
$path=$_SESSION['path'];
require 'stemmer_utf.php';
require 'work_csv.php';
require 'readfile.php';
require_once(dirname(__FILE__) . '/phpmorphy/src/common.php');
$opts = array(
	'storage' => PHPMORPHY_STORAGE_FILE,
	'with_gramtab' => false,
	'predict_by_suffix' => true, 
	'predict_by_db' => true
);


$dir = dirname(__FILE__) . '/phpmorphy/dicts';

// Create descriptor for dictionary located in $dir directory with russian language
$dict_bundle = new phpMorphy_FilesBundle($dir, 'rus');
try {
	$morphy = new phpMorphy($dict_bundle, $opts);
} catch(phpMorphy_Exception $e)
 {
	die('Error occured while creating phpMorphy instance: ' . $e->getMessage());
}
//$csv = new CSV($path);
// $csv_lines  = $csv->getCSV($path);
$handle = fopen($path, "r");
//$row = 1;
 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
 	{
$insertValues = array();
foreach( $data as $v ) {
$insertValues[]=addslashes(trim($v));

$values=implode(',',$insertValues);
$word=$morphy->lemmatize($values);
	

//print_r($morphy->getBaseForm($value));
//$z=$morphy->getBaseForm($values);
}

    }

    fclose($handle);


	
?>