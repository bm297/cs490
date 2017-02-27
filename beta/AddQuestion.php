<?php

$functionname = $_POST["funname"];
$type = $_POST["type"];
$message = $_POST["message"];
$tci = $_POST["tci"];
$tcr = $_POST["tcr"];
$capture = array(
	"funname" => $funname,
	"type" => $type,
	"message" => $message,
	"tci" => $tci,
	"tcr" => $tcr
);
$capture = json_encode($capture);

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "http://web.njit.edu/~ab674/cs490/sendQuestion.php");
curl_setopt($connection, CURLOPT_POSTFIELDS, $capture );
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$verification = curl_exec($connection);
$verification = json_decode($verification, 1);
curl_close($connection);


?>
