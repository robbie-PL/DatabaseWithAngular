<?php

	$host = "localhost";
	$user = "root";
	$pass = "mysql";
	$db = "project";

	$con = new mysqli($host, $user, $pass, $db);
	if($con->connection_error) {
		die("DB connection failed:" . $con->connection_error);
	}

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

	$con->close();

	echo json_encode($data);