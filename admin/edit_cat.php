<?php 
	
	require("pass.php");
	$page_title = "Edit Categories";
	include("header.php"); 
	
?>

<div class="container">
	<div>
		<?php include("admin_links.php"); ?>
    </div>


	<?php 
		// make connection to DB
		require_once( "../../dbconnect.php" );
		
		// Get the id of a category
		$id = $_GET['id']; // ?id=#
		
		// You clicked the Submit button
		if ( isset( $_POST['submit'] ) ) { 
		
			
			// Collect the data from the form and escape for safety. 
			$id				= mysqli_real_escape_string($connection, $_POST['id'] );
			$slug 			= mysqli_real_escape_string($connection, $_POST['slug_name'] );
			$category_name 	= mysqli_real_escape_string($connection, $_POST['category_name'] );
			$sort 			= mysqli_real_escape_string($connection, $_POST['sort'] );
			$description 	= mysqli_real_escape_string($connection, $_POST['description'] );
			
			
			// Form a query to update a record in the database. 
			$sql = "UPDATE 
						crawfish_menu_categories  
					SET 
						slug='$slug', name='$category_name', sort='$sort', description='$description'
					WHERE 
						id='$id'
					LIMIT 1 ";
			
			// Send the query 	
			$results = mysqli_query( $connection, $sql );
			
			// Check for an error. 
			echo "<p>" . mysqli_error($connection) . "</p>";
			
			?>
            
            <p>Category Updated</p>
            <a href='list_cats.php'>Back to Category list</a></p>
            
			<?php 
		} else {
			
			// You haven't pressed the submit button. So display the current record to edit. 
			// Form a query to select the record from the db. 
			$sql			= "SELECT * FROM crawfish_menu_categories WHERE id='$id' LIMIT 1";
			$results 		= mysqli_query( $connection, $sql ); 	// Run the query on the DB. 
			$myrow 			= mysqli_fetch_array( $results );		// Fecth the results
			// No need for a loop there should only be one record. 
			
			// Collect the data from the last query. 
			$id 			= $myrow['id'];
			$slug 			= $myrow['slug'];
			$category_name 	= $myrow['name'];
			$sort			= $myrow['sort'];
			$description	= $myrow['description'];
			
			?><!-- exit PHP -->
            
	<form method='post' action="<?php echo $_SERVER['PHP_SELF'] . "?id=$id"; ?>">
		<input type="hidden" name="id" value="<?php echo $id ?>">
		
		<p>
    	<label for="slug-name">Name (a URL friendly name):</label>
        <input id="slug-name" type='text' 
        class='text_input' name='slug_name' 
        value='<?php echo $slug; ?>' 
        placeholder="slug name">
        </p>
    	
    	<p>
    	<label for="category-name">Display Name:</label>
        <input id="category-name" type="text" 
        class='text_input' 
        name="category_name" 
        value='<?php echo $category_name; ?>' 
        placeholder="Category name">
        </p>
        
        <p>
        <label for="sort">Sort:</label>
        <input id="sort" type="text"
        class="text_input"  
        name="sort" 
        value="<?php echo $sort; ?>"
        placeholder="sort value">
        </p>
        
        <p>
         <label for="description">Sort:</label>
        <textarea id="description" type="text" 
        name="description"
        placeholder="description"><?php echo $description; ?></textarea>
        </p>
        
        <p>
        <input type="submit" name='submit'>
        </p>
    </form>
            <?php // reenter PHP
		}
	?>
</div>



<?php 
	include("footer.php"); 
?>


