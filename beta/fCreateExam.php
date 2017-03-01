<html>
<body>

	<!-- WILL FILL LATER -->
	<p> > This file changed from html to php<br>
		> fCreateExam.php calls mCreateExam.php <br>
		> mCreateExam.php calls bCreateExam.php<br>
		> bCreateExam.php return a DB object to mCreateExam.php<br>
		> mCreateExam.php creates a table from DB object<br>
		> mCreateExam.php send the table to fCreateExam.html<br>
		> fCreateExam.html display the table with selection enabled<br>
		> fCreateExam.html then sends to mCreateExam an array of responses<br>
		> mCreateExam.html send the response_array to bCreateExam.php<br>
		> bCreateExam.php stores the response_array into a new table for later processing<br>
		> God damn, should've skipped typing those file extensions!

		>>> END
	</p>



<?php echo "hello world front"; ?>



	<!-- First call to mCreateExam -->
	<?php
	$connection = curl_init();
	curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/CS490-Exam-System/mCreateExam.php");
	curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($connection, CURLOPT_RETURNTRANSFER, 0);
	$result = curl_exec($connection);
	//$table = json_decode($result, 1);
	curl_close($connection);
	?>


</body>
</html>