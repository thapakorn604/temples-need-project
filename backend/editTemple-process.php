<?php
session_start();

    $templeName = $_POST["nameTemple"];
	  $phone = $_POST["phone"];
    $address = $_POST["address"];
    $description = $_POST["description"];
    $item1 = $_POST["item1"];
    $item1_id = $_POST["item1_id"];
    $noitem1 = $_POST["noitem1"];




	require_once("mysql.php");

    $query = $mysqli->
        	 query("SELECT * FROM temple where name = '$templeName'");

    $data = $query->fetch_assoc();
    $Id = $data["temple_id"];


    $image_name = $_FILES["image"]["name"];

    if ($data["image"]!=$image_name) {
      $delimg = $data["image"];
                 @unlink("../uploads/$delimg");
    }

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

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {


        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('ไม่สามารถอัพโหลดไฟล์ได้');</script>";

    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        } else {
            echo "<script>alert('มีบางอย่างผิดพลาดขณะอัพโหลดไฟล์');</script>";
        }


    $result = $mysqli->query("UPDATE `temple` SET `name`= '$templeName',`tel`='$phone',`address`='$address',`description`='$description',`image`='$image_name' WHERE `temple_id`= '$Id' ");

    $setNeedItem = $mysqli->query("UPDATE `temple_need` SET `item_need` = '$item1' WHERE `temple_id` = '$Id' ");

    $setNoNeedItem = $mysqli->query("UPDATE `temple_no_need` SET `item_no_need` = '$noitem1' WHERE `temple_id` = '$Id' ");


    echo "<script>alert(แก้ไขสำเร็จ!');</script>";

    echo "<script>location.href='../User.php'</script>";

}

?>
