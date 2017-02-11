<?php

$ucid = $_POST["ucid"];
$password = $_POST["password"];
$capture = array(
	"ucid" => $ucid,
	"password" => $password
);
$capture = json_encode($capture);

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~ab674/cs490/middle.php");
curl_setopt($connection, CURLOPT_POSTFIELDS, $capture );
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$verification = curl_exec($connection);
$verification = json_decode($verification, 1);
curl_close($connection);

if ($verification["foundatnjit"]) {
	header("location: one.html");
}
else if ($verification["foundatbackend"]) {
	header("location: two.html");
}
else {
	header("location: three.html");
}

?>
