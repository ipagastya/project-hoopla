<?php 
	require('header.php');
?>
 <div class='container' style='margin-top: 100px;'>
        <div class='col-sm-3'></div>
        <div class='col-sm-6'>
          <form>
			<div id='form-row'>
              <label class="control-label col-sm-4" for="customerID">Customer's Name :</label>
			  <div class="col-sm-4">
				<input type="text" class='form-control' name="name" placeholder="Name">
			  </div>
			  <div class="col-sm-4"></div>
			</div>
              <br>
			<div id='form-row'>
             <label class="control-label col-sm-4" for="babyID">Baby's Name :</label>
			 <div class="col-sm-4">
              <input type="text" class='form-control' name="babyName" placeholder="Name">
			 </div>
			 <div class="col-sm-4"></div>
			</div>
              <br>
			<div id='form-row'>
             <label class="control-label col-sm-4" for="dobID">Baby's Date of Birth :</label>
			 <div class="col-sm-4">
              <input type="date" class='form-control' name="date" placeholder="dd/mm/yy">
			 </div>
			 <div class="col-sm-4"></div>
            </div>
			  <br>
			<div id='form-row'>
              <label class="control-label col-sm-4" for="numberID">Home Number / Mobile (WA) :</label>
			  <div class="col-sm-4">
				<input type="text" class='form-control' name="number" placeholder="Home Number">
			  </div>
			  <div class="col-sm-4">
				<input type="text" class='form-control' name="number" placeholder="Mobile Number(WA)">
			  </div>
              <br>
			</div>
            <div id='form-row'>
              <label class="control-label col-sm-4" for="lineID">Line ID :</label>
			  <div class="col-sm-4">
				<input type="text" class='form-control' name="date" placeholder="Line ID">
			  </div>
			  <div class="col-sm-4"></div>
            </div>
			  <br>
			<div id='form-row'>
              <label class="control-label col-sm-4" for="lineID">Email :</label>
			  <div class="col-sm-4">
				<input type="email" class='form-control' name="date" placeholder="Email">
			  </div>
			  <div class="col-sm-4"></div>
            </div>
			<br>
			<div id='form-row'>
              <label class="control-label col-sm-4" for="addressID">Address :</label>
			  <div class="col-sm-4">
				<input type="text" class='form-control' name="date" placeholder="Address">
			  </div>
            </div>
			<div class="col-sm-4"></div>
			<br>
			<div id='form-row'>
              <label class="control-label col-sm-4" for="cityID">City :</label>
			  <div class="col-sm-4">
				<select class="form-control" id="city" name="city">
						<option value=''>Select city</option>
						<?php
							// loop isi city dari db
						?>
					</select>
			  </div>
			  <div class="col-sm-4"></div>
            </div>
			<br>
			<div id='form-row'>
              <label class="control-label col-sm-4" for="provinceID">Province :</label>
			  <div class="col-sm-4">
				<select class="form-control" id="province" name="province">
						<option value=''>Select province</option>
						<?php
							// loop isi province dari db
						?>
					</select>
			  </div>
			  <div class="col-sm-4"></div>
            </div>
			<br>
			<div id='form-row'>
              <label class="control-label col-sm-4" for="zipID">ZIP Code :</label>
			  <div class="col-sm-4">
				<input type="text" class='form-control' name="date" placeholder="ZIP">
			  </div>
			  <div class="col-sm-4"></div>
            </div>
			<br>
			<div id='form-row'>
              <label class="control-label col-sm-4" for="zipID">Favorite / Least Favorite Toys :</label>
			  <div class="col-sm-4">
				<input type="text" class='form-control' name="date" placeholder="Favorite">
			  </div>
			  <div class="col-sm-4"></div>
            </div>
			<br>
			<div id='form-row'>
              <label class="control-label col-sm-4" for="zipID">Milestones to be developeds :</label>
			  <div class="col-sm-4">
				<input type="text" class='form-control' name="date" placeholder="Milestones">
			  </div>
			  <div class="col-sm-4"></div>
            </div>
			<br>              
          </form>
        </div>
    </div>
<?php
	require('footer.php');
?>