<?php 
	require('header.php');
?>
 <div class="container">
		<form class="form-horizontal">
			<div class="form-group">
				<label class="control-label col-sm-2" for="customerID">Customer's Name :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="customerID" name="customerID" placeholder="Customer's Name">
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="babyID">Baby's Name :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="babyID" name="babyID" placeholder="Baby's Name">
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="dobID">Baby's Date of Birth :</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="dobID" name="dobID">
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="numberID">Home Number / Mobile Number (WA) :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="homeNumberID" name="homeNumberID" placeholder="Home Number">
				</div>
				<div class="col-sm-5">
				<input type="text" class="form-control" id="mobileNumberID" name="mobileNumberID" placeholder="Mobile Number">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="lineID">Line ID :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="lineID" name="lineID" placeholder="Line ID">
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="dobID">Email :</label>
				<div class="col-sm-5">
					<input type="email" class="form-control" id="emailID" name="emailID" placeholder="Email">
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="address">Address :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="address" name="address" placeholder="Address">
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="city">City :</label>
				<div class="col-sm-5">	
					<select class="form-control" id="city" name="city">
						<option value=''>Select city</option>
						<?php
							// loop isi city dari db
						?>
					</select>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="province">Province :</label>
				<div class="col-sm-5">	
					<select class="form-control" id="province" name="province">
						<option value=''>Select province</option>
						<?php
							// loop isi province dari db
						?>
					</select>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="mobile">ZIP :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="zipID" name="zipID" placeholder="ZIP Code">
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="home">Favorite/Least Favorite Toys :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="favoriteID" name="favoriteID" placeholder="Favorite">
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="deliv-date">Milestones to be developed :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="milestoneID" name="milestoneID" placeholder="Milestones">
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
			<div class="col-sm-3"></div>
			<button class="greenbutton control-label col-sm-1" type="submit"><b class="submit-text">Submit</b></button>
			<div class="col-sm-8"></div>
		</div>
		</form>
	</div>
<?php
	require('footer.php');
?>