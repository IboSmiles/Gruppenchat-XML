<?php

$file="../members.xml";
$linecount = 0;
$handle = fopen($file, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
}

fclose($handle);
//$id = $_POST['id'] + 1;

$filepathname = "../members.xml";
$target = "1234";
$newline = "<member>
  <userid>".$_POST['userid_reg']."</userid>
  <passwort>".md5($_POST['pass_reg'])."</passwort>
</member>

";

$stats = file($filepathname, FILE_IGNORE_NEW_LINES);
$offset = array_search($target,$stats) +$linecount-2;
array_splice($stats, $offset, 0, $newline);
if(file_put_contents($filepathname, join("\n", $stats))){
  echo "FUNCTION";
}

 ?>
