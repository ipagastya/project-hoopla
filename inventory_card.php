<?php 
	require('header.php');
?>
<div class="container">
	<form class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-3" for="date">Date :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="date" name="date">
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="activities">Activities :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="activities" name="activities">
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="status">Status :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="status" name="status">
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="notes">Notes :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="notes" name="notes">
			</div>
			<div class="col-sm-4"></div>
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
</div>
<?php 
	require('footer.php');
?>