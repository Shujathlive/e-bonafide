<?php $certificate = $_GET['cno'];


echo preg_replace ("/^\//", "", $certificate);
$str = "Hello World!";
echo $str . "<br>";
echo ltrim($str,"Hello");

?>