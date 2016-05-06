<?php	
	session_start();
	if ( isset( $_POST['submit'] ) ) {
		$u = $_POST['username'];
		$p = $_POST['password'];
		
		/***********************************************************/
		// The code block below would be used if you stored user names
		// and passwords in your data base. 
		
		/*require( "dbconnect.php" );
		$sql = "SELECT * FROM users WHERE name='$u' AND password='$p' ";
		$results = mysql_query( $sql );
		if ( mysql_numrows( $result ) == 1 ) {
			session_start();
			$_SESSION['loggedin'] = true;
			header ( "Location: edit_menu.php" );
			exit();
		}*/
		
		/***********************************************************/
		
		if ( $u == "admin" && $p == "12345" ) { 
			session_start();
			$_SESSION['loggedin'] = true;
			// Use the lines below to redirect to another page. 
			// header ( "Location: list.php" );
			// exit();
		}
	}
?>		

<?php 
	$page_title = "Login";
	include("header.php"); 
?>
	
	<div class="container">
	
	<div id="user_login">
	
	<?php 
		if ( $_SESSION['loggedin'] == true ) {
			include("admin_links.php");
		} else {
			?>
			<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
				<p><label for="username">User Name:</label>
				<input id="username" type='text' placeholder=" Username" name='username'></p>
				<p><label for="password">Password:</label>
				<input id="password" type='password' placeholder=" Password" name='password' ></p>
				<input type='submit' name='submit' value='Login' />
			</form>
            <?php 	
		}
	?>

	</div>


	</div>


	<?php 
	include("footer.php"); 
?>

