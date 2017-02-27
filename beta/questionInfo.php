<?php

$string = json_decode(file_get_contents("php://input"), true);

$conn = mysqli_connect("sql2.njit.edu", "bm297", "WY2X2ekF", "bm297");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$tbl = "Question_bank";

$query = "select * from $tbl where Question='{$string}' limit 1";
$row = mysqli_query($conn, $query);
$elms = mysqli_fetch_array($row);

if($elms[2] == "Professor"){
	echo "professor";
} else if($elms[2] == "Student"){
	echo "student";
} else{
	echo "fail";
}
exit;


?>
