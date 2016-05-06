<?php
 	// Require pass.php to password protect this page. 
	require( "pass.php" );
	$page_title = "Add New Category";
	include("header.php");
?>	

<div class="container">

	
    <div>
    	<?php 
    		// Inlcude the admin links.
    		include("admin_links.php"); 
    	?>
    </div>
	
	<?php
		// Connect to DB
		require_once('../../dbconnect.php');
		
		// Check if the form has been submitted. 
		if( isset($_POST['submit']) ) {
			// form submitted
			// Escape data for input to database. 
			$category_slug 	= mysqli_real_escape_string($connection, $_POST['category_slug']);
			$category_name 	= mysqli_real_escape_string($connection, $_POST['category_name']);
			$sort 			= mysqli_real_escape_string($connection, $_POST['sort_order']);
			
			// echo "<h1>$category_slug $category_name $sort</h1>";
			
			// Form a query to insert a new record. 
			// Use INSERT to create a new record in the crawfish_menu_categories table for fields: slug, name, sort
			$sql = "INSERT INTO crawfish_menu_categories ( slug, name, sort ) 
			VALUES( '$category_slug', '$category_name', '$sort' )";
			
			// Submit the query to the database. 
			mysqli_query( $connection, $sql );
			// Print an error of there is a problem. 
			echo mysqli_error($connection);
		?>
	        
	        <!-- Display a message after inserting a new record -->
	        <p>A new crawfish_menu Category has been added to the database</p>
	        <p><a href='<?php echo $_SERVER['PHP_SELF']; ?>'>Add another Category</a> 
	        <a href='list_cats.php'>Back to Category list</a></p>
	        
	    <?php
		} else {
			// Form was not submited so show it. 
		?>
			<!-- html -->
	<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
	
		<p>
			<label for='category-slug'>Slug Name (a URL friendly name):</label>
			<input id='category-slug' 
				class='text_input' type="text" 
				name='category_slug' 
				placeholder="Category slug name">
		</p><!-- $_POST['name'] -->
	    
        <p><label for='category_name'>Category Name:</label>
	    <input id='category-name' 
	    class='text_input' type="text" 
	    name='category_name'  
	    placeholder="Category name"></p><!-- $_POST['display_name'] -->
	    
	    <p><label for='sort-order'>Sort:</label>
	    <input id="sort-order" type="text" name="sort_order" placeholder="sort value"></p>
	   	
        <p><input class='submit_button' type="submit" name='submit' /></p>
	</form>
	<?php } ?>
	
</div>
	
	

<?php 
	include("footer.php"); 
?>

