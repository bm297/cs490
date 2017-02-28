<?php

$flag = true;
$flag = json_encode($flag);

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~ab674/cs490/sendRelease.php");
curl_setopt($connection, CURLOPT_POSTFIELDS, $flag );
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($connection);
$result = json_decode($result, 1);
curl_close($connection);

?>
