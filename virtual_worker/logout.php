<?php
	//destroying the session and cookie on logout
	session_start();
	session_destroy();

	header('location: index.php');
?>