<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select CSV file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload CSV" name="submit">
</form>

<?php
if(isset($_POST["submit"])) {
    $target_dir = "upload/";
    $file = $_FILES["fileToUpload"]["tmp_name"];
    $file_open = fopen($file, "r");
    while (($getData = fgetcsv($file_open, 10000, ",")) !== FALSE) {
        $file = $target_dir . $getData[0];
        file_put_contents($file, $getData[1]);
    }
    fclose($file_open);
    echo "File uploaded successfully.";
}
?>

</body>
</html>
<!--<!DOCTYPE html>
<html>
<head>
	<title>CSV file upload</title>
</head>
<body>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="submit" value="Upload">
	</form>
	
	php
		if(isset($_POST['submit'])) {
			$file = $_FILES['file']['tmp_name'];
			$handle = fopen($file, "r");
			$count = 1;
			while(($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$fileName = $data[1];
				$content = $data[2];
				$newFile = "/upload/" . $count . "." . pathinfo($fileName, PATHINFO_EXTENSION);
				file_put_contents($newFile, $content);
				$count++;
			}
			fclose($handle);
			echo "File uploaded successfully.";
		}
	?>
</body>
</html>-->
