
<?php
$ucid = $_POST["ucid"];
$password = $_POST["password"];
$capture = array(
	"ucid" => $ucid,
	"password" => $password
);
$capture = json_encode($capture);
$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/CS490-Exam-System/blogin.php");
curl_setopt($connection, CURLOPT_POSTFIELDS, $capture );
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$verification = curl_exec($connection);
$designation = json_decode($verification, 1);
curl_close($connection);
if ($verification == "professor") {
	header("location: WelcomeInst.html");
}
else if ($verification == "student") {
	header("location: WelcomeStd.html");
}
else {
	header("location: index.html");
}
?>