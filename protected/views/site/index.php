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
			<h4>Name</h4>
		</div>

		<div class="col-xs-1">
			<h4>YTD</h4>
		</div>

		<div class="col-xs-1">
			<h4>MTD</h4>
		</div>

		<div class="col-xs-1">
			<h4>Yesterday</h4>
		</div>

		<div class="col-xs-offset-3 col-xs-2">
			<h4>YTD</h4>
		</div>

		<div class="col-xs-2">
			<h4>MTD</h4>
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

				<div class="row detail hidden">
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
				<div class="row detail hidden">
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
						

					<?php endforeach ?>

				<?php endforeach ?>

				<div class="row hidden">

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
<<<<<<< HEAD
					
=======
>>>>>>> aab3bdc06a4040eaaf8fbbf768cbe2d47d1166db
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
					
				</div>

				<div class="col-xs-1">
					
				</div>

				<div class="col-xs-1">
					
				</div>

				<div class="col-xs-offset-4 col-xs-2">
					<h4><?php echo $user['totalpay']; ?></h4>
				</div>


			</div>

	</div>

</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src='js/sort.js'></script>
<script type="text/javascript" charset="utf-8">
$(function() {

	$("p.ytd").click(function() {
		$(".level1").toogle();
		//$(this).next().slideToggle(300);
		console.log('click');
	});

	///////////
	// Sort //
	///////////

	var toggleSort;
	$(".table-head h4").click(function() {
		var sortBy = $(this).text().toLowerCase();
		var sortFunc = null;
		if(sortBy === 'name') sortFunc = (toggleSort ? sortStringAsc : sortStringDesc);
		else sortFunc = (toggleSort ? sortIntAsc : sortIntDesc);

		var sorted = $('.sort-items .'+sortBy)
			.map(function(i, val){return val.innerHTML})
			.sort(sortFunc)
			.get();
		toggleSort = !toggleSort;
		console.log(sorted);
	});
});
</script>
