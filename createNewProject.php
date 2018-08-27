<?php 

   include 'dbConnect.php';

	header("Content-Type: application/json; charset=UTF-8");
	$obj = json_decode($_POST["x"], false);

	 //print_r($obj);

	$sql = "INSERT into projects (name, formsubmitted, total, lastupdated, createdon, description, count, profile) values ('$obj->name', '$obj->formsubmitted', '$obj->total', '$obj->lastupdated', '$obj->createdon', '$obj->description', '$obj->count', '$obj->profile')";

	$result = mysqli_query($conn, $sql);
	$lastInsertId = mysqli_insert_id($conn);

	if ($result) {
		echo "<script>";
        echo "$('#addProject .processingMsg').animate({opacity:0});";
		echo "$('#addProject .successMsg').animate({opacity:1}).delay(3000).animate({opacity: 0});";
        echo "resetCreateNewProjectForm();";
        echo "$('.screenDisabler').hide();";
		echo "</script>";
	}
	else 
		printf("error: %s\n", mysqli_error($conn));

?>