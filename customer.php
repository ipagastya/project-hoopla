<?php 
	require('header.php');
?>
 <div class='container' style='margin-top: 100px;'>
      <div class='row'>
        <div class='col-sm-3'></div>
        <div class='col-sm-6'>
          <form>
			<div id='form-row'>
              <h6 style='color:black'>Customer's Name </h6>
              <input type="text" class='form-control' name="name" placeholder="Name">
			</div>
              <br>
			<div id='form-row'>
              <h6 style='color:black'>Baby's Name </h6>
              <input type="text" class='form-control' name="babyName" placeholder="Name">
			</div>
              <br>
			<div id='form-row'>
              <h6 style='color:black'>Baby's Date of Birth </h6>
              <input type="date" class='form-control' name="date" placeholder="dd/mm/yy">
            </div>
			  <br>
			<div id='form-row'>
              <h6 style='color:black'>Home Number / Mobile (WA) </h6>
              <input type="text" class='form-control' name="number" placeholder="please insert the number">
			  <input type="text" class='form-control' name="number" placeholder="please insert the number">
              <br>
			</div>
            <div id='form-row'>
              <h6 style='color:black'>Line ID </h6>
              <input type="text" class='form-control' name="date" placeholder="Line ID">
            </div>
			  <br>
			<div id='form-row'>
              <h6 style='color:black'>Email </h6>
              <input type="email" class='form-control' name="date" placeholder="Email">
            </div>
			<br>
			<div id='form-row'>
              <h6 style='color:black'>Address </h6>
              <input type="text" class='form-control' name="date" placeholder="Address">
            </div>
			<br>
			<div id='form-row'>
              <h6 style='color:black'>City </h6>
              <input type="text" class='form-control' name="date" placeholder="City">
            </div>
			<br>
			<div id='form-row'>
              <h6 style='color:black'>Province </h6>
              <input type="text" class='form-control' name="date" placeholder="Province">
            </div>
			<br>
			<div id='form-row'>
              <h6 style='color:black'>ZIP </h6>
              <input type="text" class='form-control' name="date" placeholder="ZIP">
            </div>
			<br>
			<div id='form-row'>
              <h6 style='color:black'>Favorite/Least Favorite Toys </h6>
              <input type="text" class='form-control' name="date" placeholder="Favorite">
            </div>
			<br>
			<div id='form-row'>
              <h6 style='color:black'>Milestones to be developeds </h6>
              <input type="text" class='form-control' name="date" placeholder="Milestones">
            </div>
			<br>              
          </form>
        </div>
      </div>
    </div>
<?php
	require('footer.php');
?>