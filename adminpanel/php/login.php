<?php 
	require_once 'dbconnect.php';

	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$sql = "SELECT admin_name,admin_pic,admin_id FROM admin WHERE admin_user_id ='$user' AND admin_pass = '$pass'";

	$res = $conn->query($sql);
	if ($res-> num_rows > 0) {
		$row = $res->fetch_assoc();
		
		session_start();
		$_SESSION['admin_name'] = $row['admin_name'];
		$_SESSION['admin_pic'] = $row['admin_pic'];
		$_SESSION['admin_id'] = $row['admin_id'];
		
		$resp['status']  = true;
	}else{
		$resp['status']  = false;
	}
	echo json_encode($resp);
?>