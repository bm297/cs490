<?php

$capture = file_get_contents("php://input");

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/CS490-Exam-System/blogin.php");
curl_setopt($connection, CURLOPT_POST, 1);
curl_setopt($connection, CURLOPT_POSTFIELDS, $capture);
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$designation = curl_exec($connection);
curl_close($connection);

if ($designation == "fail") {
  $verification = fail;
  echo json_encode($designation);
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
