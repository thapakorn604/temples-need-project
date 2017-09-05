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
        echo "<script>alert('ไฟล์นี้มีผู้เคยอัพโหลดแล้ว');</script>";
        echo "<script>location.href='../AddTemple.php'</script>";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
         echo "<script>alert('ไฟล์มีขนาดใหญ่เกินไป (ต้องไม่เกิน 5MB)');</script>";
         echo "<script>location.href='../AddTemple.php'</script>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
         echo "<script>alert('ไฟล์ที่อัพต้องเป็นไฟล์รูปเท่านั้น (นามสกุลไฟล์ .jpg, .png ,.gif)');</script>";
        echo "<script>location.href='../AddTemple.php'</script>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('ไม่สามารถอัพโหลดไฟล์ได้');</script>";
        echo "<script>location.href='../AddTemple.php'</script>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        } else {
            echo "<script>alert('มีบางอย่างผิดพลาดขณะอัพโหลดไฟล์');</script>";
            echo "<script>location.href='../AddTemple.php'</script>";
        }



	require_once("mysql.php");

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

			echo "<script>alert('เพิ่มวัดสำเร็จ!');</script>";
      echo "<script>location.href='../User.php'</script>";

	} else {
		echo "<script>alert('ชื่อวัดนี้มีผู้ใช้แล้ว');</script>";
    echo "<script>location.href='../AddTemple.php'</script>";
	}

  echo "<script>alert('รูปมีขนาดใหญ่เกินไป หรือ ไฟล์ที่อัพโหลดไม่ใช่รูปภาพ');</script>";
  echo "<script>location.href='../AddTemple.php'</script>";
}

?>
