<?php
// Abhinav Bassi
// ab674
// CS 490 102
// Alpha
$capture = json_decode(file_get_contents("php://input"), true);
$ucid = $capture["ucid"];
$password = $capture["password"];

// Backend array
$string = array("ucid" => $ucid, "password" => $password);

$verification = array(
  "foundatnjit" => false,
  "foundatbackend" => false
);
$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://cp4.njit.edu/cp/home/login");
curl_setopt($connection, CURLOPT_POSTFIELDS, http_build_query(array(
  "user" => $ucid,
  "pass" => $password,
  "uuid" => "0xACA021"
)));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($connection, CURLOPT_POST, 1);
$njitresult = curl_exec($connection);
curl_close($connection);
if (!$njitresult) {
  $verification["foundatnjit"] = true;
}
else {
  $verification["foundatnjit"] = false;
}

// Backend connection
$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/cs490/back.php");
curl_setopt($connection, CURLOPT_POSTFIELDS, $string);
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$foundatbackend = curl_exec($connection);
curl_close($connection);
// $foundatbackend = json_decode($foundatbackend);
if ($foundatbackend) {
  $verification["foundatbackend"] = true;
  echo json_encode($verification);
}
else {
  $verification["foundatbackend"] = false;
  echo json_encode($verification);
}
?>