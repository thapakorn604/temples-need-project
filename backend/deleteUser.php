<?php

    $id = $_GET["id"];

    require_once("mysql.php");

    $query = $mysqli->
        	 query("SELECT*FROM temple_monk where temple_id = '$id'");
    
    $data = $query->fetch_assoc();

    $userId = $data["user_id"];

    $delete = $mysqli->
        	 query("DELETE FROM temple where temple_id = '$id'");
    
    $delete2 = $mysqli->
        	 query("DELETE FROM temple_monk where temple_id = '$id'");

    $delete3 = $mysqli->
        	 query("DELETE FROM temple_need where temple_id = '$id'");
    
    $delete4 = $mysqli->
        	 query("DELETE FROM temple_no_need where temple_id = '$id'");
    
    $deleteAccount = $mysqli->
        	 query("DELETE FROM account where id = '$userId'");
    
    echo "<script>alert('delete successfully!');</script>";
    echo "<script>location.href='../Admin.php'</script>";

?>