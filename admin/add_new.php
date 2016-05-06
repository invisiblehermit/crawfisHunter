<?php 
	// Require Pass.php to password protect this page.
	require("pass.php");
	$page_title = "Add New crawfish_menu Item";
	include("header.php"); 
?>


<div class="container">
    <div>
    	<?php 
    		// Include the admin links
    		include("admin_links.php"); 
    	?>
    </div>


	<?php
		// This block of code is run when the page is loaded. 
		// If the submit button was pressed the code in the iff statement below is run.
		// This block of code collects the data from the form below and adds a new record in the crawfish_menu table.  
		if( isset($_POST['submit']) ) {
			// form submitted connect to DB
			require_once('../../dbconnect.php');
			
			// Collect form data and escape it for safety. 
			$name 			= mysqli_real_escape_string($connection, $_POST['name'] );
			$price 			= mysqli_real_escape_string($connection, $_POST['price'] );
			$description 	= mysqli_real_escape_string($connection, $_POST['description'] );
			$category_id	= mysqli_real_escape_string($connection, $_POST['category_id'] );
			
			// Form an SQL query to insert a new record
			// INSERT a new record into the crawfish_menu table. 
			$sql = "INSERT INTO crawfish_menu ( name, price, description, category ) 
			VALUES('$name', '$price', '$description', '$category_id')";
			
			// Send the query to the DB. 
			mysqli_query( $connection, $sql );
			// Check for an error. 
			echo mysqli_error($connection);
	?>
        
        
        <p>A new crawfish_menu item has been added to the database</p>
        <p><a href='<?php echo $_SERVER['PHP_SELF']; ?>'>Add another</a></p>
        
        <?php
	} else {
		// show form 
		?>
		<!-- html -->
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
	
	<p>
		<label for='name'>Name:</label>
    	<input id='name' class='text_input' type="text" name='name' placeholder="Name">
    </p><!-- $_POST['name'] -->
   
   
    <p>
    	<label for='price'>Price:</label>
    	<input id='price' class='text_input' type="text" name='price' placeholder="Price"></p><!-- $_POST['price'] -->
    <p>
    	<label for='description'>Description:</label>
    	<textarea id='description' name='description' placeholder="Description"></textarea>
    </p><!-- $_POST['description'] --> 
       
    <p><label for='category'>Category:</label>
    <select id='category' name='category_id'>
    	<?php 
    		// Make a drop down list of categories. 
    		require_once("../../dbconnect.php");
    		// Set up a query
    		$sql = "SELECT * FROM crawfish_menu_categories ORDER BY name";
    		// Send the query
    		$results = mysqli_query( $connection, $sql );
    		// Check for an error. 
    		echo mysqli_error($connection);
    		// Loop through the results and make some options. 
    		while( $row = mysqli_fetch_array( $results ) ) {
    			$id 		= $row['id'];
    			$display 	= $row['name'];
    			echo "<option value='$id'>$display</option>";
    		}
    	?>
    </select></p>
 	<p><input class='submit_button' type="submit" name='submit'></p>
</form>
        <?php
	}

?>

</div>

<?php 
    include("footer.php"); 
?>



