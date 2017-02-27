<?php

$capture = json_decode(file_get_contents("php://input"), true);

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/cs490/addBlankExam.php");
curl_setopt($connection, CURLOPT_POST, 1);
curl_setopt($connection, CURLOPT_POSTFIELDS, $capture);
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

if ($capture == true) {
  $capture = json_encode($capture);
  $result = curl_exec($connection);
  curl_close($connection);
  echo json_encode($result);
}
else {
  $capture = json_encode($capture);
  $result = curl_exec($connection);
  curl_close($connection);
  echo json_encode($result);
}

?>
