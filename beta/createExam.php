<?php

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~ab674/cs490/sendBlankExam.php");
curl_setopt($connection, CURLOPT_POSTFIELDS, $capture );
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($connection);
$result = json_decode($result, 1);
curl_close($connection);

?>
