<?php
/* @var $this SiteController 

$this->pageTitle=Yii::app()->name;
?> */
?>
<style type="text/css">
	.bg-warning, .table-head h4{
		cursor: pointer;
		-webkit-user-select: none;
	 	-moz-user-select: none;
	 	-ms-user-select: none;
	 	-o-user-select: none;
	 	user-select: none;
	}
</style>
<div class="container">
	<!-- Top Header Tags -->
	<div class="row">
		<div class="col-xs-offset-2 col-xs-4">
			<h4 class="text-center well">Production</h4>
		</div>
		<div class="col-xs-4 col-xs-offset-2">
			<h4 class="text-center well	">Payout</h4>
		</div>
	</div>
	<!-- Field Headers -->
	<div class="row table-head">

		<div class="col-xs-2">
			<h4 class='name' data-desc='0'>Name <span class="glyphicon glyphicon-chevron-up"></span></h4>
		</div>

		<div class="col-xs-1">
			<h4 class='ytd' data-desc='0'>YTD</h4>
		</div>

		<div class="col-xs-1">
			<h4 class='mtd' data-desc='0'>MTD</h4>
		</div>

		<div class="col-xs-2">
			<h4 class='yesturday' data-desc='0'>Yesterday</h4>
		</div>

		<div class="col-xs-offset-2 col-xs-2">
			<h4 class='ytd2' data-desc='0'>YTD</h4>
		</div>

		<div class="col-xs-2">
			<h4 class='mtd2' data-desc='0'>MTD</h4>
		</div>

	</div>
	<!-- Main Detail Information -->
	<div class="main">
		<?php foreach($data as $user): ?>
			<div class="data">
				<div class="row sort">
					<div class="col-xs-2">
						<p class='name'><?php echo $user['name']; ?></p>
					</div>
				
					<div class="col-xs-1">
						<p class='ytd bg-warning'><?php echo $user['YTD']; ?></p>
					</div>
				
					<div class="col-xs-1">
						<p class='mtd'><?php echo $user['MTD']; ?></p>
					</div>
				
					<div class="col-xs-2">
						<p class='yesturday'><?php echo $user['YYTD']; ?></p>
					</div>
				
					<div class="col-xs-offset-2 col-xs-2">
						<p class='ytd2'><?php echo $user['YTD2']; ?></p>
					</div>
				
					<div class="col-xs-2">
						<p class='mtd2'><?php echo $user['MTD2']; ?></p>	
					</div>
				</div>
				
				<!-- SECOND ROW MONTH DETAIL ========================================
				================================================================> -->
				<div class="second-row">
					<div class="row detail">
						<div class="col-xs-2 col-xs-offset-2">
							<h4>Month</h4>
						</div>
						<div class="col-xs-2">
							<h4>Production</h4>
						</div>
						<div class="col-xs-2">
							<h4>Payout</h4>
						</div>
					</div>
					<!-- ============================================================== -->
					
					<?php foreach ($user['datesresume'] as $month): ?>
						<div class="row detail">
							<div class="col-xs-2 col-xs-offset-2">
								<p><?php echo $month['month'] ?></p>
							</div>
							<div class="col-xs-2 detail-prod bg-warning">
								<p><?php echo $month['prod'] ?></p>
							</div>
							<div class="col-xs-2">
								<p><?php echo $month['payout'] ?></p>
							</div>
						</div>
					
						<!-- THIRD TABLE DETAIL MONTH DETAIL ========================================
						================================================================> -->
						<div class="third-row">
							<div class="row">
								<div class="col-xs-2 col-xs-offset-2">
									<h4>Date</h4>
								</div>
								<div class="col-xs-2">
									<h4>Production</h4>
								</div>
								<div class="col-xs-2">
									<h4>Payout</h4>
								</div>
							</div>
							<?php foreach ($month['allmonth'] as $detail): ?>
								<div class="row">
									<div class="col-xs-2 col-xs-offset-2">
										<p><?php echo $detail['month'] ?></p>
									</div>
									<div class="col-xs-2">
										<p class="bg-warning"><?php echo $detail['prod'] ?></p>
									</div>
									<div class="col-xs-2">
										<p><?php echo $detail['payout'] ?></p>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					
					<?php endforeach ?>
						
					<!-- Total -->
					<div class="row total">
						<div class="row">
							<div class="col-xs-2 col-xs-offset-2">
								<h4>Total:</h4>
							</div>
							<div class="col-xs-2">
								<h4><?php echo $user['YTD']; ?></h4>
							</div>
							<div class="col-xs-2">
								<h4><?php echo $user['YTD2']; ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php endforeach ?>
	</div> <!-- Main Detail Information -->

	<div class="row sort-items">
		<div class="col-xs-2">
			<h4>Total</h4>
		</div>

		<div class="col-xs-1">
			<h4><?php echo $user['totalprod']; ?></h4>
		</div>

		<div class="col-xs-1">
			
		</div>

		<div class="col-xs-1">
			
		</div>

		<div class="col-xs-1">
			
		</div>

		<div class="col-xs-offset-4 col-xs-2">
			<h4><?php echo $user['totalpay']; ?></h4>
		</div>
	</div>


</div> <!-- container -->

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src='js/sort.js'></script>
<script type="text/javascript" src='js/toggle.js'></script>
