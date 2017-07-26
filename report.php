<?php
require('header.php');
include "config.php";
?>
<div class= "container">
    <h4>Subscription Report</h4>
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
			<th rowspan="2">Month/Year</th>
			<th colspan="4">New Customer</th>
			<th colspan="4">Expired Subscription</th>
			<th colspan="4">Extending Subscription</th>
			<th>Nett Subscribers</th>
			<th rowspan="2">Subscription Commited</th>
            </tr>
            <tr>
			<th>Total</th>
			<th>1 MO</th>
			<th>3 MO</th>
			<th>6 MO</th>
			<th>Total</th>
			<th>1 MO</th>
			<th>3 MO</th>
			<th>Total</th>
			<th>3 MO</th>
			<th>6 MO</th>
			<th>Total</th>
            </tr>
            <?php
                $query = "SELECT * FROM MONTH";
                $result = mysqli_query($conn, $query);                          
				if(!$result) {
                    print("Couldn't execute query");
                    die(mysqli_connect_error());
                }
            
                while($row = mysqli_fetch_row($result)) {
			    $currentMonth = $row[2];
			    $currentYear = $row[3];
			    $new1month = 0;
			    $new3month = 0;
			    $new6month = 0;
			    $exp1month = 0;
			    $exp3month = 0;
			    $exp6month = 0;
			    $ext1month = 0;
			    $ext3month = 0;
			    $ext6month = 0;

			    $query1new = "SELECT COUNT(*)
					FROM SUBSCRIPTION
					WHERE EXTRACT(MONTH FROM date_added) = '$currentMonth'
					    AND EXTRACT(YEAR FROM date_added) = '$currentYear'
					    AND subs_plan = 1
					    AND LOWER(status) = 'new'";
			
			    $query3new = "SELECT COUNT(*)
					FROM SUBSCRIPTION
					    AND subs_plan = 3
					    AND LOWER(status) = 'new'";
			
			    $query6new = "SELECT COUNT(*)
					FROM SUBSCRIPTION
					WHERE EXTRACT(MONTH FROM date_added) = '$currentMonth'
					    AND EXTRACT(YEAR FROM date_added) = '$currentYear'
					    AND subs_plan = 6
					    AND LOWER(status) = 'new'";

		   	    $result1new = mysqli_query($conn, $query1new);
			    if(!$result1new) {
				print("Couldn't execute query1new");
				die(mysqli_connect_error());
			    }
			    $row1new = mysqli_fetch_row($result1new);
			    $new1month = $row1new[0];

			    $result3new = mysqli_query($conn, $query3new);
			    if(!$result3new) {
				print("Couldn't execute query3new");
				die(mysqli_connect_error());
			    }
			    $row3new = mysqli_fetch_row($result3new);
			    $new3month = $row3new[0];
			
			    $result6new = mysqli_query($conn, $query6new);
			    if(!$result6new) {
				print("Couldn't execute query6new");
				die(mysqli_connect_error());
			    }
			    $row6new = mysqli_fetch_row($result6new);
			    $new6month = $row6new[0];
				        
			    $totalnew = $new1month + $newmonth + $new6month;
			    echo"	<tr>
			    			<td>$totalnew</td>
			    			<td>$new1month</td>
						<td>$new3month</td>
						<td>$new6month</td>
			    		</tr>";
                    
                }
            ?>
        </table>
    </div>
</div>
<?php
    require('footer.php');
?>
