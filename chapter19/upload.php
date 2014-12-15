<html>
<head>
<title>Uploading...</title>
</head>
<body>
<h1>Uploading file....</h1>
<?php
	$userfile = $_FILES['userfile'];
	$error = $userfile['error'];
	if($error>0){
		echo "Problem:";
		switch ($error) {
			case 1:
				echo "file exceeded upload_max_filesize";
				break;
			case 2:
				echo "file exceeded max_file_size";
			case 3:
				echo "file only partially uploaded";
				break;
			case 4:
				echo "no file uploaded";
				break;
			case 6:
				echo "can not upload file:no temp directory specified";
				break;
			case 7:
				echo "upload failed:can not write to disk";
				break;
		}
		exit();
	}
	// if($userfile['type']!='text/plain'){
		// echo "Problem:file is not plain text";
		// exit();
	// }
	$upfile = "/uploads/".$userfile['name'];
	if(is_uploaded_file($userfile['tmp_name'])){
		if(!move_uploaded_file($userfile['tmp_name'], $upfile)){
			echo "Problem:can not save file to destination directory";
			exit();
		}
	}else{
		echo "Possible file upload attack.Filename:";
		echo $userfile['name'];
		exit();
	}
	echo "file uploaded successfully<br/><br/>";

	$contents = file_get_contents($upfile);
	echo "<p>Preview of uploaded file contents:<br/><br/></p>";
	echo nl2br($contents);
?>
</body>
</html>
