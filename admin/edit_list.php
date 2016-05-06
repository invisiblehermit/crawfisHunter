<?php 
	require("pass.php");
	$page_title = "List Categories";
	include("header.php"); 
?>
<div class="container">
<div>
<?php include("admin_links.php"); ?>
</div>
<ul>	
	<?php 
		// Make a connection to the database. 
		require_once("../../dbconnect.php");
		
		// Form a query to select the crawfish_menu items, and organize them on categories. 
		$sql = "SELECT
					crawfish_menu.name,
					crawfish_menu.price,
					crawfish_menu.id,
					crawfish_menu_categories.name as category
				
				FROM
					crawfish_menu, crawfish_menu_categories
					
				WHERE 
					crawfish_menu.category = crawfish_menu_categories.id
				
				ORDER BY 
					crawfish_menu_categories.name, 
					crawfish_menu.name";
		
		// Run the query on the DB. 	
		$results = mysqli_query( $connection, $sql );
		// Print an error if there is one. 
		echo mysqli_error($connection);
		$current_category = "";
		
		// Loop through the results. 
		while( $row = mysqli_fetch_array($results) ) {
			$name 		= htmlentities( $row['name'] );
			$price		= $row['price'];
			$category 	= $row['category'];
			$id 		= $row['id'];
			
			if ( $category != $current_category ) {
				echo "<li><h3>$category</h3></li>";
				$current_category = $category;
			}
			
			echo "<li>
			<a href='edit.php?id=$id&category=$category'>edit</a> 
			<a href='delete.php?id=$id'>delete</a>
			$name $price $category
			</li>";
		}
	?>
</ul>
</div>


<?php 
	include("footer.php"); 
?>








