<?php 
	require_once 'dbconnect.php';

	$admin_id = $_POST['admin_id'];	

	/*Upadte New Image */
	$fileNameWithExt = $_FILES['dp']['name'];
	$fileNameWithoutExt = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
	$fileExt = pathinfo($fileNameWithExt, PATHINFO_EXTENSION);

	$newFileNameWithExt = $fileNameWithoutExt . time() . '.' . $fileExt;

	$targetDir = "../../storage/";
	$fileToUpload = $targetDir . $newFileNameWithExt;

	/*To Delete Previous One !*/
	$fileToDelete = '../../storage/' . $_POST['admin_pic']; 

	if (move_uploaded_file($_FILES['dp']['tmp_name'], $fileToUpload)) {
		
		$sql = "UPDATE admin SET admin_pic = '$newFileNameWithExt' WHERE admin_id = admin_id ";

		if ($conn->query($sql)) {
			
			/*Delte File*/
			unlink($fileToDelete);
			
			session_start();
			$_SESSION['admin_pic'] = $newFileNameWithExt;

			$resp['status'] = true;

 		}else{
			$resp['status'] = false;
 		}
	}else{
		$resp['status'] = false;
	}

	echo json_encode($resp);
?>