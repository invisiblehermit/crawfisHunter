<?php 
	require("pass.php");
	$page_title = "Edit crawfish_menu item";
	include("header.php"); 
?>

<div class="container">
    <div>
    	<?php include("admin_links.php"); ?>
    </div>

	<?php 
		
		// Make a connection to the database
		require_once( "../../dbconnect.php" );
		$id = $_GET['id']; // edit.php?id=#
		
		// Check if the form was submitted
		if ( isset( $_POST['submit'] ) ) { // You clicked the Submit button
			// Collect the form data and escape it. 
			$id			= mysqli_real_escape_string($connection, $_POST['id'] );
			$name 		= mysqli_real_escape_string($connection, $_POST['name'] );
			$price 		= mysqli_real_escape_string($connection, $_POST['price'] );
			$description= mysqli_real_escape_string($connection, $_POST['description'] );
			$category	= mysqli_real_escape_string($connection, $_POST['category'] );
			
			// Form a query to update a record. 
			$sql = "UPDATE crawfish_menu  
			SET name='$name', price='$price', description='$description', category='$category'
			WHERE id='$id'
			LIMIT 1";
			
			// Run the query on the database. 
			$results = mysqli_query( $connection, $sql );
			// Display an error if there is a problem.
			echo "<p>" . mysqli_error($connection) . "</p>";
			?>
            
            <p>Product Updated</p>
            <a href='edit_list.php'>Back to list</a></p>
            
			<?php 
		} else {
			// Select a record from the database. 
			$results 	= mysqli_query( $connection, "SELECT * FROM crawfish_menu WHERE id='$id' LIMIT 1" );
			// Fetch the results, there should only be one item no need for a loop. 
			$myrow 		= mysqli_fetch_array( $results );
			$id 		= $myrow['id'];
			$name 		= $myrow['name'];
			$description= $myrow['description'];
			$price		= $myrow['price'];
			$category	= $myrow['category'];
			?><!-- exit PHP -->
            
	<form method='post' action="<?php echo $_SERVER['PHP_SELF'] . "?id=$id"; ?>">
		<input type="hidden" name="id" value="<?php echo $id ?>">
    	
    	<p>
    	<label for="name">Name:</label>
        <input id="name" type='text' 
        class='text_input' name='name' 
        value='<?php echo $name; ?>'
        placeholder="Name">
        </p>
    	
    	<p>
    	<label for="price">Price:</label>
        <input id="price" 
        	type="text" 
        	class='text_input' 
        	name="price" 
        	value='<?php echo $price; ?>' 
        	placeholder="price">
        </p>
        
        <p>
        <label for="description">Description:</label>
        <textarea id="description" name="description" placeholder="Description">
        	<?php echo $description; ?>
        </textarea>
        </p>
        
        <p>
			<label for="category">Category:</label>
			<select id="category" name="category">
				<?php 
					// Get the categories and make a drop down crawfish_menu.
					// Make a query to select crawfish_menu categories. 
					$sql = "SELECT * FROM crawfish_menu_categories ORDER BY name";
					// Run the query. 
					$results = mysqli_query( $connection, $sql );
					// Loop through the results and form a list of options. 
					while( $row = mysqli_fetch_array( $results ) ) {
						$id 		= $row['id'];
						$display 	= $row['name'];
						// Here we look for the category that matches this crawfish_menu item and selct it. 
						if ( $category == $id ) {
							echo "<option selected='selected' value='$id'>$display</option>";
						} else {
							echo "<option value='$id'>$display</option>";
						}
					}
				?>
			</select>
        </p>
        
        <p>
        	<input type="submit" name='submit' />
        </p>
        
    </form>
            <?php } ?>
    </div>


<?php 
	include("footer.php"); 
?>





