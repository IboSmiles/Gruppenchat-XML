<?php
session_start();
$file="../groups.xml";
$linecount = 0;
$handle = fopen($file, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
}

fclose($handle);
//$id = $_POST['id'] + 1;

$filepathname = "../groups.xml";
$target = "1234";
$newline = " <group>
  <name>".$_POST['name']."</name>
  <members>".$_SESSION['login'].",".$_POST['members']."</members>
  <admins>".$_SESSION['login']."</admins>
  <passwort>".md5($_POST['pass'])."</passwort>
  </group>


";

$stats = file($filepathname, FILE_IGNORE_NEW_LINES);
$offset = array_search($target,$stats) +$linecount-2;
array_splice($stats, $offset, 0, $newline);
if(file_put_contents($filepathname, join("\n", $stats))){
  echo "FUNCTION";
}
$path = "../../Groups/".$_POST['name'];

mkdir($path);
$myfile = fopen("$path/chat.xml", "w") or die("Unable to open file!");
$txt = "<?xml version='1.0' encoding='UTF-8'?>
        <chat>

        <message id='1'>
          <name>Server</name>
          <inhalt>Welcome</inhalt>
        </message>


        </chat>
  ";
fwrite($myfile, $txt);

fclose($myfile);
 ?>
