<?php 
	// Require pass.php to password protect this page. 
	require("pass.php");
	$page_title = "List Categories";
	include("header.php"); 
?>

<div class="container">
	<!-- include the admin links -->
	<div>
		<?php include("admin_links.php"); ?>
	</div>

<!-- block creates a list of categories with links for edit and delete -->
<ul>	
	<?php 
		// Make a connection
		require_once("../../dbconnect.php");
		// Form a query to select categories. 
		$sql = "SELECT * FROM crawfish_menu_categories ORDER BY name";
		// Run the query
		$results = mysqli_query( $connection, $sql );
		$current_category = "";
		
		// Loop through the results. 
		while( $row = mysqli_fetch_array($results) ) {
			// Collect the values 
			$name 			= htmlentities( $row['slug'] );
			$display_name 	= htmlentities( $row['name'] );
			$sort			= htmlentities( $row['sort'] );
			$id 			= $row['id'];
			// Print a list
			echo "<li>
			<a href='edit_cat.php?id=$id'>edit</a> 
			<a href='delete_cat.php?id=$id'>delete</a>
			$display_name $name $sort
			</li>";
		}
	?>
</ul>
</div>


<?php 
	include("footer.php"); 
?>












