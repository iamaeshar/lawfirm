<?php 
	require_once 'dbconnect.php';

	$id = $_POST['id'];
	$sql1 = "SELECT gallery_img FROM gallery WHERE gallery_id = $id";
	$res = $conn->query($sql1);
	if ($res->num_rows > 0) {
		$row = $res->fetch_assoc();
		$fileName = $row['gallery_img'];

		$sql2 = "DELETE FROM gallery WHERE gallery_id = $id";
		if ($conn->query($sql2)) {
			$fileToDelete = '../../storage/'.$fileName;
			if (unlink($fileToDelete)) {
				$resp['status'] = true;
			}else {
				$resp['status'] = false;
			}
		}else {
			$resp['status'] = false;
		}

	}else {
		$resp['status'] = false;
	}

	echo json_encode($resp);
?>