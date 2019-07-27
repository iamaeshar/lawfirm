<?php 
	require 'dbconnect.php';

	$img_desc = $_POST['desc'];
	
	$fileNameWithExt = $_FILES['img']['name'];
	$fileNameWithoutExt = strtolower(pathinfo($fileNameWithExt,PATHINFO_FILENAME));
	$fileExt = strtolower(pathinfo($fileNameWithExt,PATHINFO_EXTENSION));

	/*Renaming File Name*/
	$newFileNameWithExt = $fileNameWithoutExt.time().'.'.$fileExt;
	
	$targer_dir = '../../storage/';
	$fileToUpload = $targer_dir.$newFileNameWithExt;

	if (move_uploaded_file($_FILES['img']['tmp_name'], $fileToUpload)) {

		$sql = "INSERT INTO gallery(gallery_img,gallery_img_desc) VALUES('$newFileNameWithExt','$img_desc')";
		if ($conn->query($sql)) {
			$resp['status'] = true;
		}else{
			$resp['status'] = false;
		}
	}else{
		$resp['status'] = false;
	}

	echo json_encode($resp);
?>