<?php

 	session_start();
 	session_destroy();
 	echo "<script>alert('successfully Logout');</script>";
 	echo "<script>location.href='../index.php'</script>";

?>