<?php
	// Start a session to access session variables. 
	session_start();
	if ( $_SESSION['loggedin'] != true ) {
		
	} else { 
		// Destroy the session 
		session_destroy();
		// Remove the cookie associated with the session. 
		setcookie( session_name(), '', time() - 4200, '/' );
	}
	// Redirect to index.php
	header( "Location: index.php" );
?>