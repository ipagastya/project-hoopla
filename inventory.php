<?php 
	require('header.php');
?>
<div class="container">
	<form class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-3" for="toyname">Toy Name :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="toyname" name="toyname">
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="prodcode">Product Code :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="prodcode" name="prodcode">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="status">Inventory Status :</label>
			<div class="col-sm-3">
				 <select class="form-control" id="status" name="status">
				    <option>Available</option>
					<option>Rented</option>
				    <option>Broken</option>
					<option>Missing Part</option>
				  </select>
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="datereturn">Next Return Date :</label>
			<div class="col-sm-3">
				<input type="date" class="form-control" id="datereturn" name="datereturn">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="manufacturer">Manufacturer :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="manufacturer" name="manufacturer">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="batteryopt">Battery :</label>
			<div class="col-sm-3">
				 <select class="form-control" id="batteryopt" name="batteryopt">
				    <option>Yes</option>
				    <option>No</option>
				  </select>
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="cat1">Toy Category 1 :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="cat1" name="cat1">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="cat2">Toy Category 2 :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="cat2" name="cat2">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="mfage">Manufacturing Age :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="mfage" name="mfage">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="hooplaage">Hoopla Age :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="hooplaage" name="hooplaage">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="motorskill">Fine Motor Skill :</label>
			<div class="col-sm-3">
				<select class="form-control" id="motorskill" name="motorskill">
				    <option>Yes</option>
				    <option>No</option>
				  </select>
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="linguisticskill">Linguistic Skill :</label>
			<div class="col-sm-3">
				<select class="form-control" id="linguisticskill" name="linguisticskill">
				    <option>Yes</option>
				    <option>No</option>
				  </select>
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="cognitiveskill">Cognitive Skill :</label>
			<div class="col-sm-3">
				<select class="form-control" id="cognitiveskill" name="cognitiveskill">
				    <option>Yes</option>
				    <option>No</option>
				  </select>
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="socialskill">Social & Emotional Skill :</label>
			<div class="col-sm-3">
				<select class="form-control" id="socialskill" name="socialskill">
				    <option>Yes</option>
				    <option>No</option>
				  </select>
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="imagination">Imagination :</label>
			<div class="col-sm-3">
				<select class="form-control" id="imagination" name="imagination">
				    <option>Yes</option>
				    <option>No</option>
				  </select>
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="practicalskill">Practical Life Skill :</label>
			<div class="col-sm-3">
				<select class="form-control" id="practicalskill" name="practicalskill">
				    <option>Yes</option>
				    <option>No</option>
				  </select>
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="acquisition">Acquisition Price :</label>
			<div class="col-sm-3">
				<select class="form-control" id="acquisition" name="acquisition">
				    <option>Yes</option>
				    <option>No</option>
				  </select>
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="retail">Retail Price :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="hooplaage" name="hooplaage">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="retailstoresource">Retail Store Sourced :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="hooplaage" name="hooplaage">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
				<button class="btn btn-primary greenbutton" type="submit"><a href='#' style='text-decoration: none; color:white;'>Submit</a></button>
			</div>
			<div class="col-sm-6"></div>
		</div>
	</form>
	<br>
	<br>
	<div align="right">
		<button class="btn btn-primary addbutton" type="submit"><a href='inventory_card.php' style='text-decoration: none; color:white;'>Update Card</a></button>
	</div>
	<br>
	<h4>Inventory Card</h4>
	<br>
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Date</th>
				<th>Activities</th>
				<th>Status</th>
				<th>Notes</th>
			</tr>
			<?php
				// loop untuk isi db
			?>
		</table>
	</div>
	<br>
	<br>
	<br>
	
</div>
<br>
<br>
<br>
<?php
	require_once('footer.php');
?>