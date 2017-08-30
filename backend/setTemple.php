<?php

    session_start();

    $templeName = $_POST["nameTemple"];
	$phone = $_POST["phone"];
    $address = $_POST["address"];
    $description = $_POST["description"];
    $item1 = $_POST["item1"];
    // $item2 = $_POST["item2"];
    $noitem1 = $_POST["noitem1"];
    // $noitem2 = $_POST["noitem2"];

$image_name = $_FILES["image"]["name"];
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

	require_once("mysql.php");

    if($uploadOk == 1){
    $check = $mysqli->
        	 query("SELECT * FROM temple where name = '$templeName'");

    if ($check->num_rows < 1){

			$result = $mysqli->query("INSERT INTO `temple`(`name`, `tel`,`address`,`description`,`image`)
                                    VALUES ('$templeName', '$phone', '$address','$description','$image_name')");

            $result2 = $mysqli->query("SELECT*FROM `temple` WHERE `name`= '$templeName' ");
            $data = $result2->fetch_assoc();
            var_dump($data);
            $TempleId = $data["temple_id"];

            $addNeedItem = $mysqli->query("INSERT INTO `temple_need`(`id`, `temple_id`, `item_need`)
                                    VALUES ('', $TempleId, '$item1')");

            $addNoNeedItem = $mysqli->query("INSERT INTO `temple_no_need`(`id`, `temple_id`, `item_no_need`)
                                    VALUES ('', $TempleId, '$noitem1')");

            $user_id = $_SESSION["login_user_id"];
            $result3 = $mysqli->query("INSERT INTO `temple_monk`(`id`, `user_id`, `temple_id`)
                                    VALUES ('', $user_id, '$TempleId')");
			echo "<script>alert('add successfully!');</script>";

	} else {
		echo "<script>alert('The temple's name already exists!');</script>";
	}

}else {
  echo "<script>alert('รูปมีขนาดใหญ่เกินไป หรือ ไฟล์ที่อัพโหลดไม่ใช่รูปภาพ');</script>";
  echo "<script>location.href='../setTemple.php'</script>";
}

	echo "<script>location.href='../Monk.php'</script>";

?>
