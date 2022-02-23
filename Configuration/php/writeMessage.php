<?php

$file="../../Groups/".$_POST['group']."/chat.xml";
$linecount = 0;
$handle = fopen($file, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
}

fclose($handle);
$id = $_POST['id'] + 1;

$filepathname = "../../Groups/".$_POST['group']."/chat.xml";
$target = "1234";
$newline = "<message id='".$id."'>
  <name>".$_POST['name']."</name>
  <inhalt>".$_POST['inhalt']."</inhalt>
</message>

";

$stats = file($filepathname, FILE_IGNORE_NEW_LINES);
$offset = array_search($target,$stats) +$linecount-2;
array_splice($stats, $offset, 0, $newline);
if(file_put_contents($filepathname, join("\n", $stats))){
  echo "FUNCTION";
}

 ?>
