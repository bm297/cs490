<?php

$capture = file_get_contents("php://input");

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/cs490/addCompletedExam.php");
curl_setopt($connection, CURLOPT_POST, 1);
curl_setopt($connection, CURLOPT_POSTFIELDS, $capture);
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$designation = curl_exec($connection);
curl_close($connection);

?>
