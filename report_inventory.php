<?php
	require('header.php');
	include "config.php";

	$queryTest = "SELECT *
			FROM MONTH AS M
			WHERE MONTH(NOW()) = M.month AND YEAR(NOW()) = M.year";
				
	$resultTest = mysqli_query($conn, $queryTest);                          

	if(!$resultTest) {
		print("Couldn't execute test query");
		die(mysqli_connect_error());
	}

	if(mysqli_num_rows($resultTest) < 1) {
		$queryInsert = "INSERT INTO MONTH VALUES (DEFAULT, MONTH(NOW()), YEAR(NOW()))";
		if(!($resultInsert = mysqli_query($conn, $queryInsert))){
			print("Month Error");
			die(mysqli_connect_error());
               	}
	}

	
?>
<div class= "container">
	<form action="libs/download_inventory">
		<div class='form-group'>
			<button class="greenbutton control-label" type="submit" name="download-inv">
				<center>Download Report</center>
			</button>
		</div>
	</form>
	<h4>Available Inventory (This Week)</h4>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Product Code</th>
					<th>Toy Name</th>
					<th>Availability</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if(!isset($_GET['page'])) {
						$offset = 0;
						$page = 1;
					} else {
						$page = $_GET['page'];
						$offset = ($page - 1) * 10;
					}

					$query = "SELECT * FROM INVENTORY_AVAILABLE";
					$result = mysqli_query($conn, "$query LIMIT 10 OFFSET $offset");
					$resultFull = mysqli_query($conn, $query);                      

					if(!$result) {
					    print("Couldn't execute inventory query");
					    die(mysqli_connect_error());
					} else if(!$resultFull) {
					    print("Couldn't execute complete inventory query");
					    die(mysqli_connect_error());
					}
					
					while($row = mysqli_fetch_row($result)) {
						echo "	<tr>
								<td>".$row[0]."</td>
								<td>".$row[1]."</td>
								<td>".$row[2]."</td>
							</tr>";
					}
				?>
			</tbody>
		</table>
	</div>	
	<div>
		<ul class="pagination pagination-sm">
			<?php
            	$rows = mysqli_num_rows($resultFull);
                $pages = 0;
                if($page > 2) {
                	$count = $page - 2;
           		} else {
           			$count = 1;
           		}

                if($rows <= 10) {
               		$pages = 1;
                } else if (($rows % 10 ) == 0) {
                	$pages = $rows / 10;
                } else {
                	$pages = floor($rows / 10) + 1;
            	}

            	if($pages > 1 && $page != 1) {
            		$prev = $page - 1;
            		echo "<li><a href='report_inventory?page=$prev'><</a></li>";
            	} 

            	if($count != 1) {
            		echo "<li><a>...</a></li>";
            	}
            	while ($count <= $pages && $count <= ($page + 2)) {
            		if($count == $page) {
            			echo "<li class='active'><a href='report_inventory?page=$page'>$count</a></li>";
            		} else {
                		echo "<li><a href='report_inventory?page=$count'>$count</a></li>";
              		}
                	$count = $count + 1;
                }

                if($count != $pages + 1) {
                	echo "<li><a>...</a></li>";
                }

                if($pages > 1 && $page < $pages) {
            		$next = $page + 1;
            		echo "<li><a href='report_inventory?page=$next'>></a></li>";
            	}
            ?>
        </ul>
    </div>	
</div>
<?php
    require('footer.php');
?>
