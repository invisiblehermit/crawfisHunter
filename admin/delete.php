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
		// Connect to DB
		require_once("../../dbconnect.php");
		// get the id of the record to delete 
		$id = $_GET['id']; // delete.php?id=#
		// Form a query to select the record
		$sql = "SELECT * FROM crawfish_menu WHERE id='$id' LIMIT 1 ";
		// Send the query to the DB. 
		$results = mysqli_query( $connection, $sql );
		// Fecth the results. No need for a loop there should only be one record. 
		$row = mysqli_fetch_array( $results );
		$name = $row['name'];
		
		if (!isset( $_GET['confirm'] ) ) {
			// Before deleting the record display a confirm message
			?>
            <p>Are you sure you want to delete <strong><?php echo $name; ?></strong> 
            <a href='<?php echo $_SERVER['PHP_SELF'] . "?id=$id&confirm=yes"; ?>'>Yes</a> 
            <a href='edit_list.php'>No</a></p>
			<?php
		} else {
			// Form a query to delete a record
			$sql = "DELETE FROM crawfish_menu WHERE id='$id' LIMIT 1 ";
			// Run the query 
			$results = mysqli_query( $connection, $sql );
			// Display a message. 
			echo "<p>$name has been deleted</p>";
		}
	?>
</div>

<?php 
	include("footer.php"); 
?>
    





