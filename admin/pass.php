<?php
	session_start(); 
	
	// $_SESSION['test'] = "chocolate chip";
	// echo $_SESSION['test']; // prints chocolate chip
	
	// If not logged in this redirects to index.php
	if ( $_SESSION['loggedin'] != true ) {
		header( "Location: index.php" );
		exit();
	}
?>