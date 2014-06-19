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
		<?php foreach($data as $user): ?>
			<div class="row sort-items">
				<div class="col-xs-2">
					<p class='name'><?php echo $user['name']; ?></p>
				</div>

				<div class="col-xs-1">
					<p class='ytd'><?php echo $user['YTD']; ?></p>
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
			</div>

				<!-- SECOND ROW MONTH DETAIL ========================================
				================================================================> -->

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
					<div class="col-xs-2">
						<p><?php echo $month['prod'] ?></p>
					</div>
					<div class="col-xs-2">
						<p><?php echo $month['payout'] ?></p>
					</div>
				</div>

				<!-- THIRD TABLE DETAIL MONTH DETAIL ========================================
				================================================================> -->
				<div class="container">
					<div class="row hidden">
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

					<div class="row hidden">
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
						
					<br>

					<?php endforeach ?>
				</div>

				<?php endforeach ?>
				<hr>

				<div class="row">

					<div class="row">
						<div class="col-xs-2 col-xs-offset-2">
							<strong>Total:</strong>
						</div>
						<div class="col-xs-2">
							<strong><?php echo $user['YTD']; ?></strong>
						</div>
						<div class="col-xs-2">
							<strong><?php echo $user['YTD2']; ?></strong>
						</div>
					</div>
					<br>
					<br>
					<br>
			</div>

		<?php endforeach ?>
	</div>

</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src='js/jquery.jsort.0.4.min.js'></script>

<script type="text/javascript" charset="utf-8">
$(function() {
	
	//$(".detail").hide();
	//$(".level1").hide();

	$("p.ytd").click(function() {
		$(".level1").toogle();
		//$(this).next().slideToggle(300);
		console.log('click');
	});

	var toggle2;
	$(".table-head h4").click(function(){
		
		var c = $(this).attr('class');
		console.log(c)
		$('.sort').jSort({
			sort_by: '.'+c,
			item: '.sort-items',
			order: toggle2 ? 'asc' : 'desc'
		});
		toggle2 = !toggle2;
	});
});
</script>
