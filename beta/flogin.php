<?php

$ucid = $_POST["ucid"];
$password = $_POST["password"];
$capture = array(
	"ucid" => $ucid,
	"password" => $password
);
$capture = json_encode($capture);

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/CS490-Exam-System/msendLogin.php");
curl_setopt($connection, CURLOPT_POSTFIELDS, $capture );
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$designation = curl_exec($connection);
$designation = json_decode($designation, 1);
curl_close($connection);

if ($designation == "professor") {
	header("location: fWelcomeInst.html");
}
else if ($designation == "student") {
	header("location: fWelcomeStd.html");
}
else {
	header("location: ffailedindex.html");
}

?>
