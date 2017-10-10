<?php
error_reporting(0); 
    session_start();

    $id = $_GET["id"];

    require_once("mysql.php");

    $imgdel = $mysqli ->
      query("SELECT * FROM temple where temple_id ='$id' ");

      $data = $imgdel->fetch_assoc();
      $delimg = $data["image"];
                 @unlink("../uploads/$delimg");

    $delete = $mysqli->
        	 query("DELETE FROM temple where temple_id = '$id'");


    $delete2 = $mysqli->
        	 query("DELETE FROM temple_monk where temple_id = '$id'");

    $delete3 = $mysqli->
        	 query("DELETE FROM temple_need where temple_id = '$id'");

    $delete4 = $mysqli->
        	 query("DELETE FROM temple_no_need where temple_id = '$id'");

    echo "<script>alert('ลบวัดเรียบร้อย!');</script>";

    if($_SESSION["login_user_role"] == 'admin'){

        echo "<script>location.href='../index.php'</script>";
    } else {
        echo "<script>location.href='../index.php'</script>";
    }

?>
