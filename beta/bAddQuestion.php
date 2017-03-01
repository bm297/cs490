<?php

//$capture = json_decode(file_get_contents("php://input"), true);

$function_name = $_POST["function_name"];
$type = $_POST["type"];
$question = $_POST["question"];
$difficulty = $_POST["difficulty"];
$test_case = $_POST["test_case"];
$test_result = $_POST["test_result"];


//
//		THIS PART ONLY FOR BACKEND. DO NOT TOUCH.
//

// Create connection
$conn = mysqli_connect("sql2.njit.edu", "bm297", "WY2X2ekF", "bm297");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select table
$tbl = "Question_bank";

// Query
$query = "INSERT INTO $tbl (Fname, Type, Question, Difficulty, Test, Result) VALUES ('{$function_name}', '{$type}', '{$question}', '{$difficulty}', '{$test_case}', '{$test_result}')";

// Execute the query
mysqli_query($conn, $query);

echo "Question has been saved";

//
//		JSON ARRAY IS SET UP IN CASE YOU NEED IT
//

/*
$capture = array(
	"function_name" => $function_name,
	"question" => $question,
	"language" => $language,
	"difficulty" => $difficulty,
	"test_case" => $test_case,
	"test_result" => $test_result
);

// echo $capture; THIS ECHOS OBJECT TYPE e.g. ARRAY
$capture = json_encode($capture);
// echo $capture; THIS ECHOS THE ARRAY e.g. {'function_name': 'x', 'question': 'x' ...}


$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~ab674/cs490/middle.php");
curl_setopt($connection, CURLOPT_POSTFIELDS, $capture );
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$verification = curl_exec($connection);
$verification = json_decode($verification, 1);
curl_close($connection);
*/

?>
