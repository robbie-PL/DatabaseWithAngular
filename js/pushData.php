<?php

	$data = json_decode(file_get_contents("php://input"));

	$host = "localhost";
	$user = "root";
	$pass = "mysql";
	$db = "project";

	$con = new mysqli($host, $user, $pass, $db);
	if($con->connection_error) {
		die("DB connection failed:" . $con->connection_error);
	}

	$sql = "INSERT INTO `blogs`(`title`,`description`)VALUES('$data->title','$data->description')";

	$qry = $con->query($sql);

	$sql = "SELECT * FROM `blogs` ORDER BY `id` DESC";

	$qry = $con->query($sql);

	$data = array();

	if($qry->num_rows > 0) {
		while($row = $qry->fetch_object()) {
			$data[] = $row;
		}
	} else {
		$data[] = null;
	}

	echo json_encode($data);

