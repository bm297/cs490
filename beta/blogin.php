<?php

$string = json_decode(file_get_contents("php://input"), true);
$ucid = $string["ucid"];
$password = md5($string["password"]);

//echo $string['ucid'];
//echo md5($string['password']);

// Create connection
$conn = mysqli_connect("sql2.njit.edu", "bm297", "WY2X2ekF", "bm297");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select table
$tbl = "CS490";

// Query
$query = "select * from $tbl where Username='{$ucid}' and Password='{$password}' limit 1";

$row = mysqli_query($conn, $query);
$elms = mysqli_fetch_array($row);
// echo $elms[0];	Check Username
// echo $elms[1];	Check password
// echo $elms[2];  Check UserLevel


if($elms[2] == "Professor"){
	echo "professor";
} else if($elms[2] == "Student"){
	echo "student";
} else{
	echo "fail";
}
exit;

?>
