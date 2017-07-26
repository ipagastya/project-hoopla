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
                <th colspan="3">New Customer</th>
                <th colspan="3">Expired Subscription</th>
                <th colspan="3">Extending Subscription</th>
                <th>Nett Subscribers</th>
                <th rowspan="2">Subscription Commited</th>
            </tr>
            <tr>
                <th>Total</th>
                <th>1 MO</th>
                <th>3 MO</th>
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
                    
                    $query3 = "SELECT COUNT(*)
                                FROM SUBSCRIPTION
                                WHERE EXTRACT(MONTH FROM date_added) = $currentMonth
                                    AND EXTRACT(YEAR FROM date_added) = $currentYear
                                    AND subs_plan = 3";
                    
                    $result3 = mysqli_query($conn, $query3);
                    if(!$result3) {
                        print("Couldn't execute query3");
                        die(mysqli_connect_error());
                    }
                    $row3 = mysqli_fetch_row($result3);
                    echo"<tr><td>" . $row3[0] . "</td></td>";
                    
                }
            ?>
        </table>
    </div>
</div>
<?php
    require('footer.php');
?>
