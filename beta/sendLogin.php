<?php

$capture = file_get_contents("php://input");
$ucid = $capture["ucid"];
$password = $capture["password"];
$combination = array(
  "ucid" => $ucid,
  "password" => $password
);
$combination = json_encode($combination);

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/cs490/back.php");
curl_setopt($connection, CURLOPT_POST, 1);
curl_setopt($connection, CURLOPT_POSTFIELDS, $combination);
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$designation = curl_exec($connection);
curl_close($connection);

if ($designation == "fail") {
  $verification = fail;
  echo json_encode($verification);
}
else if ($designation == "professor") {
  $verification = true;
  echo json_encode($designation);
}
else if ($designation == "student") {
  $verification = true;
  echo json_encode($designation);
}

?>
