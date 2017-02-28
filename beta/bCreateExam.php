<html>
<head>
	<title>Create Exam</title>
	<body>
		<?php

//
//		THIS PART ONLY FOR BACKEND. DO NOT TOUCH.
//

// Create connection
$conn = mysqli_connect("sql2.njit.edu", "bm297", "WY2X2ekF", "bm297");

// Select table
$tbl = "Question_bank";

// Query
$query = "select * from $tbl";

// Execute the query
$rows = mysqli_query($conn, $query);

//
// echo $rows; DO NOT USE
//

$cols = mysqli_num_fields($rows); # Returns 5


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
	echo "</table>";


	?>
	</body>
</head>  
</html>
