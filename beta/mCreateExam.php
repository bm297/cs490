<?php



//
//	This connection receives a DB OBJECT
//

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/CS490-Exam-System/bCreateExam.php");
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($connection);
//$db_object = json_decode($result);
curl_close($connection);



// Rename db_object as $rows
//$rows = db_object;

echo $result;


/*
// 
$cols = mysqli_num_fields($rows); # Returns 5
echo $cols;

	echo "<table>";

	echo "<tr>";
	echo "<td>Function Name</td>";
	echo "<td>Language</td>";
	echo "<td>Question</td>";
	echo "<td>Difficulty</td>";
	echo "<td>Test Case</td>";
	echo "<td>Test Result</td>";
	echo "</tr>";

	echo "<tr>";

	while($elem = mysqli_fetch_array($rows)){
		echo "<tr>";
		for($i = 0; $i < $cols; $i++){
			echo "<td>$elem[$i] </td>";
		}
		echo "</tr>";
	}

	echo "</tr>";	
	echo "</table>";*/

?>