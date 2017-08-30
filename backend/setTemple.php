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

	require_once("mysql.php");

    $check = $mysqli->
        	 query("SELECT * FROM temple where name = '$templeName'");

    if ($check->num_rows < 1){

			$result = $mysqli->query("INSERT INTO `temple`(`name`, `tel`,`address`,`description`)
                                    VALUES ('$templeName', '$phone', '$address','$description')");

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

	echo "<script>location.href='../Monk.php'</script>"

?>
