<?php

$capture = json_decode(file_get_contents("php://input"), true);
$ucid = $capture["ucid"];
$password = $capture["password"];
$combination = array(
  "ucid" => $ucid,
  "password" => $password
);
$combination = json_encode($combination);
$verification = array(
  "foundatnjit" => false,
  "foundatbackend" => false
);

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://cp4.njit.edu/up/Logout?uP_tparam=frm&frm=");
curl_exec($connection);
curl_setopt($connection, CURLOPT_URL, "https://cp4.njit.edu/cp/home/login");
curl_setopt($connection, CURLOPT_POSTFIELDS, http_build_query(array(
  "user" => $ucid,
  "pass" => $password,
  "uuid" => "0xACA021"
)));
curl_setopt($connection, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($connection, CURLOPT_REFERER, "https://cp4.njit.edu/cp/home/login");
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

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/cs490/back.php");
curl_setopt($connection, CURLOPT_POSTFIELDS, $combination);
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$foundatbackend = curl_exec($connection);
curl_close($connection);

if ($foundatbackend == "fail") {
  $verification["foundatbackend"] = false;
  echo json_encode($verification);
}
else {
  $verification["foundatbackend"] = true;
  echo json_encode($verification);
}

?>
