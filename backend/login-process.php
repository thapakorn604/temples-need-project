<?php


	session_start();
	$username = $_POST["username"];
	$password = $_POST["password"];


	$password = ($password);


	require_once("mysql.php");

	$result = $mysqli->query("SELECT * FROM account WHERE username = '$username' ");

	if($result->num_rows > 0){

		$account = $result->fetch_assoc();

		if($password === $account["password"]){
			echo "<script>alert('sucessfully login');</script>";
			if($account["role"] === "admin"){
				echo "<script>location.href='../TempleAdmin.php'</script>";
			} else {
				echo "<script>location.href='../User.php'</script>";
			}
			$_SESSION["login_user"] = $username;
			$_SESSION["login_user_id"] = $account["id"];
			$_SESSION["login_user_role"] = $account["role"];
			session_write_close();
		}
		else{
			echo "<script>alert('username or password is incorrect');</script>";
			echo "<script>location.href='../login.php'</script>";
		}
	}else{
		echo "<script>alert('username or password is incorrect');</script>";
		echo "<script>location.href='../login.php'</script>";
	}


?>
