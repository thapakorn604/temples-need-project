<?php

    $templeName = $_POST["nameTemple"];
	  $phone = $_POST["phone"];
    $address = $_POST["address"];
    $description = $_POST["description"];
    $item1 = $_POST["item1"];
    $item1_id = $_POST["item1_id"];
    $item2 = $_POST["item2"];
    $item2_id = $_POST["item2_id"];
    $noitem1 = $_POST["noitem1"];
    $noitem2 = $_POST["noitem2"];

	require_once("mysql.php");

    $query = $mysqli->
        	 query("SELECT * FROM temple where name = '$templeName'");

    $data = $query->fetch_assoc();

    $Id = $data["temple_id"];

    echo "<script>alert('edit successfully!');</script>";

    echo "<script>location.href='../Monk.php'</script>";


?>
