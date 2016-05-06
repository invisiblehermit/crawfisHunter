<?php 
	require("pass.php");
	$page_title = "Delete Category";
	include("header.php"); 
?>

<div class="container delete_menu">
    <div>
    	<?php include("admin_links.php"); ?>
    </div>

	<?php 
		// Make a connection to DB
		require_once("../../dbconnect.php");
		
		// get the id of the category to delete
		$id = $_GET['id']; // delete.php?id=#
		
		// make a querty to select this category 
		$sql = "SELECT * FROM crawfish_menu_categories WHERE id='$id' LIMIT 1 ";
		
		// Run the query on the DB
		$results = mysqli_query( $connection, $sql );
		
		// Fetch the results. There should only be one no need for a loop.
		$row = mysqli_fetch_array( $results );
		$name = $row['name'];
		
		if (!isset( $_GET['confirm'] ) ) {
			// Before we click confirm print a message. 
			?>
            <p>Are you sure you want to delete Category <strong><?php echo $name; ?></strong> 
            <a href='<?php echo $_SERVER['PHP_SELF'] . "?id=$id&confirm=yes"; ?>'>Yes</a> 
            <a href='list_cats.php'>No</a></p>
			<?php
		} else {
			// Form a query to delete the item 
			$sql = "DELETE FROM crawfish_menu_categories WHERE id='$id' LIMIT 1 ";
			// Run the query on the DB. 
			$results = mysqli_query( $connection, $sql );
			// Echo a message 
			echo "<p>$name has been deleted</p>";
		}
	?>
	
</div>


<?php 
	include("footer.php"); 
?>
    






