<?php 
	require('header.php');
?>
<div class= "container">
	<button class="addbutton" data-toggle="collapse" data-target="#form-filter"><span class="glyphicon glyphicon-th"></span> Filter Subscription Table</button>
	<form class="form-horizontal collapse" id="form-filter">
		<div class="form-group">
			<label class="control-label col-sm-3" for="start-date">Final Pickup Date :</label>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="start-date">Start Date</label>
			<div class="col-sm-3">
				<input type="date" class="form-control" id="start-date" name="start-date">
			</div>
			<label class="control-label col-sm-3" for="end-date">End Date</label>
			<div class="col-sm-3">
				<input type="date" class="form-control" id="end-date" name="end-date">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="name">Customer Name :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="name" name="name">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="note">Payment Note :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="note" name="note">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="sub-plan">Subscription Plan :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="sub-plan" name="sub-plan">
			</div>
			<label class="control-label col-sm-1" for="sub-plan">Month</label>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<div class="col-sm-3"></div>
			<button class="greenbutton control-label col-sm-1" type="submit"><b class="submit-text">Submit</b></button>
			<div class="col-sm-8"></div>
		</div>
	</form>
	<br>
	<div align="right">
		<button class="addbutton" type="button" data-toggle="modal" data-target="#modalSubscription"><span class="glyphicon glyphicon-plus"></span> Add Subscription</button>
	</div>
	<div class="modal fade" id="modalSubscription" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Create New Subscription</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-sm-4" for="customerName">Customer Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="customerName" name="customerName">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="status">New/Extension :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="status" name="status">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="plan">Subscription Plan :</label>
							<div class="col-sm-5">
								<input type="number" class="form-control" id="plan" name="plan">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="plan">No of Toys/Month :</label>
							<div class="col-sm-5">
								<input type="number" class="form-control" id="plan" name="plan">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="first-deliv">First Delivery Date :</label>
							<div class="col-sm-5">
								<input type="date" class="form-control" id="first-deliv" name="first-deliv">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="sub-price">Subscription Price :</label>
							<div class="col-sm-5">
								<input type="number" class="form-control" id="sub-price" name="sub-price">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="sub-promo">Subscription Promo :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="sub-promo" name="sub-promo">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="deliv-price">Delivery Price :</label>
							<div class="col-sm-5">
								<input type="number" class="form-control" id="deliv-price" name="deliv-price">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="deliv-promo">Delivery Promo :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="deliv-promo" name="deliv-promo">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="deposit">Deposit Amount :</label>
							<div class="col-sm-5">
								<input type="number" class="form-control" id="deposit" name="deposit">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="pay-term">Payment Terms :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="pay-term" name="pay-term">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="refund-date">Deposit Refund Date :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="refund-date" name="refund-date">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="deposit-status">Deposit Status :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="deposit-status" name="deposit-status">
							</div>
							<div class="col-sm-3"></div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default addbutton" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<h4>Subscription Schedule</h4>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>Customer's Name</th>
				<th>New/Ext</th>
				<th>Subscription Plan</th>
				<th>No of Toys / Month</th>
				<th>First Delivery Date</th>
				<th>Final Pick Up Date</th>
				<th>Payment Note</th>
				<th>Details</th>
			</tr>
			<?php 
				// from content db
			?>
		</table>
	</div>
	
</div>
<?php
	require('footer.php');
?>