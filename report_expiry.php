<?php
	require('header.php');
	include "config.php";
	include "libs/month_update.php";	
?>
<div class="jumbotron">
	<center>
	<br><br><h2 class="leckerli">Report</h2><br>
	<form action="libs/download_expiry">
		<div class='form-group'>
			<button class="filterbtn control-label" type="submit" name="download-exp"><span class="glyphicon glyphicon-download"></span>
				 Download Report
			</button>
		</div>
	</form>
	</center>
</div>
<div class= "container">
	<h4>Expiring Subscriptions</h4>
	<ul class="nav nav-tabs">
		<li val ="1" class="weeknav active"><a href="#">Week 1</a></li>
		<li val ="2" class="weeknav"><a href="#">Week 2</a></li>
		<li val ="3" class="weeknav"><a href="#">Week 3</a></li>
		<li val ="4" class="weeknav"><a href="#">Week 4</a></li>
	</ul>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Week</th>
					<th>Week Range</th>
					<th>Customer Name</th>
					<th>Expiry Date</th>
					<th>Days Left</th>
				</tr>
			</thead>
			<tbody id="expbody">
				<?php
					if(!isset($_GET['page'])) {
						$offset = 0;
						$page = 1;
					} else if ($_GET['page'] < 1) {
						echo "<script>location.href='report_expiry?page=1';</script>";
					} else {
						$page = $_GET['page'];
						$offset = ($page - 1) * 10;
					}

					$query = "SELECT * FROM CUSTOMER_EXPIRY WHERE Week = 1";
					$result = mysqli_query($conn, "$query LIMIT 10 OFFSET $offset");
					$resultFull = mysqli_query($conn, $query);                          

					if(!$result) {
					    print("Couldn't execute expiry query");
					    die(mysqli_connect_error());
					} else if(!$resultFull) {
					    print("Couldn't execute complete expiry query");
					    die(mysqli_connect_error());
					}

					while($row = mysqli_fetch_row($result)){
						echo "	<tr>
									<td>".$row[0]."</td>
									<td>".$row[1]."</td>
									<td>".$row[2]."</td>
									<td>".$row[3]."</td>
									<td>".$row[4]."</td>
								</tr>";
					}

				?>
			</tbody>
		</table>
	</div>	
	<div>
		<ul class="pagination pagination-md">
			<?php
            	$rows = mysqli_num_rows($resultFull);
                $pages = 0;
                if($page > 5) {
                	$count = $page - 5;
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
            		echo "<li><a href='report_inventory?page=1'>1</a></li>";
            		echo "<li><a>...</a></li>";
            	}
            	while ($count <= $pages && $count <= ($page + 5)) {
            		if($count == $page) {
            			echo "<li class='active'><a href='report_inventory?page=$page'>$count</a></li>";
            		} else {
                		echo "<li><a href='report_inventory?page=$count'>$count</a></li>";
              		}
                	$count = $count + 1;
                }

                if($count != $pages + 1) {
                	echo "<li><a>...</a></li>";
                	echo "<li><a href='report_inventory?page=$pages'>$pages</a></li>";
                }

                if($pages > 1 && $page < $pages) {
            		$next = $page + 1;
            		echo "<li><a href='report_inventory?page=$next'>></a></li>";
            	}
            ?>
        </ul>
    </div>		
</div>
<script src="libs/jquery/dist/jquery.min.js"></script>
	<script>
		$(".weeknav").click(function(){
			$(".weeknav").removeClass("active");
			$(this).addClass("active");
			var week = $(this).attr('val');

			$.ajax({
				type: "POST",
				data: {week: week},
				url: "libs/repexp.php",
				success: function(response){
					$("#expbody").html(response);
				}
			});
		});
	</script>
<?php
    require('footer.php');
?>
