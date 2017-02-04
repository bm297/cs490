<?php

$ucid = "UCID";
$password = "PASSWORD";
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
curl_setopt($connection, CURLOPT_POST, 1);
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$njitresult = curl_exec($connection);
curl_close($connection);

$token = strpos($njitresult, "not found");

if ($token) {
  $verification["foundatnjit"] = false;
  echo json_encode($verification);
  echo "\n";
}
else {
  $verification["foundatnjit"] = true;
  echo json_encode($verification);
  echo "\n";
}

?>
