<?php

$flag = true;
$flag = json_encode($flag);

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~ab674/cs490/getQuestions.php");
curl_setopt($connection, CURLOPT_POSTFIELDS, $flag );
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($connection);
$result = json_decode($result, 1);
curl_close($connection);

$cols = mysqli_num_fields($result);

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
$count = 1;
while($elem = mysqli_fetch_array($result)){
  echo "<tr>";
  echo "<label><input type=\"checkbox\" id=\"cbox$count\" value=\"question$count\">"; // SKIP SPLIT SCREEN FOR NOW
  for($i = 0; $i < $cols; $i++){
		echo "<td>$elem[$i] </td>";
	}
  echo "</label>";
	echo "</tr>";
  $count+=1;
}
echo "</tr>";
echo "</table>";

?>
