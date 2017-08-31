<?php

    session_start();

    $id = $_GET["id"];

    require_once("mysql.php");


    $delete = $mysqli->
        	 query("DELETE FROM account where id = '$id'");

    $result = $mysqli->query("SELECT * FROM temple_monk WHERE user_id = '$id' ");
    $data = $result->fetch_assoc();
    $templeId = $data["temple_id"];
    
    $delete2 = $mysqli->
        	 query("DELETE FROM temple_monk where user_id = '$id'");

    $delete3 = $mysqli->
        	 query("DELETE FROM temple_need where temple_id = '$templeId'");
    
    $delete4 = $mysqli->
        	 query("DELETE FROM temple_no_need where temple_id = '$templeId'");
    
    
    echo "<script>alert('delete successfully!');</script>";
    echo "<script>location.href='../UserAdmin.php'</script>";

?>