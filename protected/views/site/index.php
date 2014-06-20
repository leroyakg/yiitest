<?php
/* @var $this SiteController 

$this->pageTitle=Yii::app()->name;
?> */
?>

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
			<h4 class='name'>Name</h4>
		</div>

		<div class="col-xs-1">
			<h4 class='ytd'>YTD</h4>
		</div>

		<div class="col-xs-1">
			<h4 class='mtd'>MTD</h4>
		</div>

		<div class="col-xs-1">
			<h4 class='yesturday'>Yesterday</h4>
		</div>

		<div class="col-xs-offset-3 col-xs-2">
			<h4 class='ytd2'>YTD</h4>
		</div>

		<div class="col-xs-2">
			<h4 class='mtd2'>MTD</h4>
		</div>

	</div>
	<!-- Main Detail Information -->
	<div class="sort">
		<?php $count = 0; ?>
		<?php foreach($data as $user): ?>
			<?php $count = $count + 1; ?>
			<div class="row sort-items">
				<div class="col-xs-2">
					<p class='name'><?php echo $user['name']; ?></p>
				</div>

				<div class="col-xs-1">
					<?php echo '<p class="bg-warning" data-placement="top" data-tooltip="tooltip" title="Click for more info" data-toggle="collapse" data-target="#detail-header'.$count.', #detail-list'.$count.', #detail-total'.$count.'">'.$user['YTD']; ?></p>
				</div>

				<div class="col-xs-1">
					<p class='mtd'><?php echo $user['MTD']; ?></p>
				</div>

				<div class="col-xs-1">
					<p class='yesturday'><?php echo $user['YYTD']; ?></p>
				</div>

				<div class="col-xs-offset-3 col-xs-2">
					<p class='ytd2'><?php echo $user['YTD2']; ?></p>
				</div>

				<div class="col-xs-2">
					<p class='mtd2'><?php echo $user['MTD2']; ?></p>	
				</div>
				
				<!-- SECOND ROW MONTH DETAIL ========================================
				================================================================> -->
				<!-- <div class="row detail"> -->

				<?php echo '<div class="row collapse detail-header" id="detail-header'.$count.'">' ?>
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
				
				<?php echo '<div class="collapse detail-list" id="detail-list'.$count.'">' ?>
				<!-- ============================================================== -->
					<?php $count2 = 0; ?>
					<?php foreach ($user['datesresume'] as $month): ?>
					<?php $count2 = $count2 + 1; ?>
					<div class="row detail">
						<div class="col-xs-2 col-xs-offset-2">
							<p><?php echo $month['month'] ?></p>
						</div>
						<div class="col-xs-2">
							<?php echo '<p class="bg-warning" data-toggle="collapse" data-target="#detail2-header'.$count2.',#detail2-list'.$count2.'">'.$month['prod'] ?> </p>  
						</div>
						<div class="col-xs-2">
							<p><?php echo $month['payout'] ?></p>
						</div>
					</div>

					<!-- THIRD TABLE DETAIL MONTH DETAIL ========================================
					================================================================> -->
						<?php echo '<div class="row collapse detail2-header" id="detail2-header'.$count2.'">' ?>
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

						<?php echo '<div class="collapse detail2-list" id="detail2-list'.$count2.'">' ?>
						<?php foreach ($month['allmonth'] as $detail): ?>
							<div class="row">
								<div class="col-xs-2 col-xs-offset-2">
									<p><?php echo $detail['month'] ?></p>
								</div>
								<div class="col-xs-2">
									<p><?php echo $detail['prod'] ?></p>
								</div>
								<div class="col-xs-2">
									<p><?php echo $detail['payout'] ?></p>
								</div>
							</div>
							
						<?php endforeach ?>
						<div class="row detail2-total">
								<div class="col-xs-2 col-xs-offset-2">
									<h5>Total</h5>
								</div>
								<div class="col-xs-2">
									<h5>20</h5>
								</div>
								<div class="col-xs-2">
									<h5>30</h5>
								</div>
							</div>
					</div>
					<?php endforeach ?>
				</div>
				<?php echo '<div class="row collapse" id="detail-total'.$count.'">' ?>
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

		<?php endforeach ?>

		<div class="row sort-items">
				<div class="col-xs-2">
					<h4>Total</h4>
				</div>

				<div class="col-xs-1">
					<h4><?php echo $user['totalprod']; ?></h4>
				</div>

				<div class="col-xs-1">
					<h4><?php echo $user['totalmprod']; ?></h4>
				</div>

				<div class="col-xs-1">
					<h4><?php echo $user['totalyprod']; ?></h4>
				</div>

				<div class="col-xs-offset-3 col-xs-2">
					<h4><?php echo $user['totalpay']; ?></h4>
				</div>

				<div class="col-xs-2">
					<h4><?php echo $user['totalmpay']; ?></h4>
				</div>
			<div class="col-xs-1">
				
			</div>

			<div class="col-xs-offset-4 col-xs-2">
				<h4><?php echo $user['totalpay']; ?></h4>
			</div>
		</div>

	</div> <!-- Main Detail Information -->

</div> <!-- container -->

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src='js/sort.js'></script>
<script type="text/javascript" charset="utf-8">
$(function() {

});
</script>
