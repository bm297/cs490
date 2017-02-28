<?php

$capture = json_decode(file_get_contents("php://input"), true);

$columns = mysqli_num_fields($capture);
while($elem = mysqli_fetch_array($rows)){
  echo "<tr>";
  echo "<label><input type=\"checkbox\" id=\"cbox$count\" value=\"question$count\">"; // SKIP SPLIT SCREEN FOR NOW
  for($i = 0; $i < $cols; $i++){
		echo "<td>$elem[$i] </td>";
	}
  echo "</label>";
	echo "</tr>";
  $count+=1;
}

$question = $result["question"];
$answer = $result["answer"];
$difficulty = $result["difficulty"];
$category = $result["category"];
$name = $result["name"];
$testcase = $result["testcase"];
$testcaseresult = $result["testcaseresult"];
$grade = 0;
$feedback = "";
$file = "temporary.java";
file_put_contents($file, "class temporary {\n\n", FILE_APPEND);
file_put_contents($file, $answer, FILE_APPEND);

$namecheck = strpos($answer, $name);
if ($namecheck === false) {
  $grade += 0;
  $feedback .= "Incorrect name (+0)\n";
}
else {
  $grade += 1;
  $feedback .= "Correct name (+1)\n";
}

if ($category == "recursion") {
  $identifiercount = substr_count($answer, $name);
  if ($identifiercount > 1) {
    $grade += 1;
    $feedback .= "Recursive (+1)\n";
  }
  else {
    $grade += 0;
    $feedback .= "Not recursive (+0)\n";
  }
}
else if ($category == "forloop") {
  $identifiercount = substr_count($answer, "for");
  if ($identifiercount > 0) {
    $grade += 1;
    $feedback .= "For loop (+1)\n";
  }
  else {
    $grade += 0;
    $feedback .= "No for loop (+0)\n";
  }
}
else if ($category == "whileloop") {
  $identifiercount = substr_count($answer, "while");
  if ($identifiercount > 0) {
    $grade += 1;
    $feedback .= "While loop (+1)\n";
  }
  else {
    $grade += 0;
    $feedback .= "No while loop (+0)\n";
  }
}
else if ($category == "conditional") {
  $identifiercount = substr_count($answer, "if");
  if ($identifiercount > 0) {
    $grade += 1;
    $feedback .= "Conditional (+1)\n";
  }
  else {
    $grade += 0;
    $feedback .= "No Conditional (+0)\n";
  }
}
else if ($category == "indexing") {
  $identifiercount = substr_count($answer, "[");
  if ($identifiercount > 0) {
    $grade += 1;
    $feedback .= "Indexing used (+1)\n";
  }
  else {
    $grade += 0;
    $feedback .= "No indexing used (+0)\n";
  }
}
else {
  $grade += 0;
}

$returncheck = strpos($answer, "return");
if ($returncheck === false) {
  $grade += 0;
  $feedback .= "No result returned (+0)\n";
}
else {
  $grade += 1;
  $feedback .= "Result returned (+1)\n";
}

file_put_contents($file, "\n\n", FILE_APPEND);
file_put_contents($file, "public static void main(String[] args) {\n", FILE_APPEND);
file_put_contents($file, "System.out.println($name($testcase));\n", FILE_APPEND);
file_put_contents($file, "}\n\n}\n", FILE_APPEND);

exec("javac temporary.java");
$newfile = "temporary.class";
if (file_exists($newfile) == true) {
  $grade += 1;
  $feedback .= "Code compiles (+1)\n";
}
else {
  $grade -= 1;
  $feedback .= "Code does not compiles (-1)\n";
}

$output = shell_exec("java temporary");
if ($output == $testcaseresult) {
  $grade += 1;
  $feedback .= "Correct result (+1)";
}
else {
  $grade += 0;
  $feedback .= "Incorrect result (+0)";
}

$capture["grade"] = $grade;
$capture["feedback"] = $feedback;
// $capture = json_encode($capture);

echo $capture["feedback"];
echo "\n";
echo $capture["grade"];
echo "\n";

// file_put_contents($file, "");

// $connection = curl_init();
// curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/cs490/gradedQuestion.php");
// curl_setopt($connection, CURLOPT_POST, 1);
// curl_setopt($connection, CURLOPT_POSTFIELDS, $capture);
// curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
// $designation = curl_exec($connection);
// curl_close($connection);

?>
