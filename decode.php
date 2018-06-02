<?php
error_reporting(E_ERROR | E_PARSE);
require __DIR__ . "/vendor/autoload.php";
use Zxing\QrReader;

$url = $_GET["u"];
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
  echo "Invalid URL"; 
} else {
  $img = 'tmpfile.png';
  file_put_contents($img, file_get_contents($url));
  $qrcode = new QrReader($img);
  echo $text = $qrcode->text(); //return decoded text from QR Code
}