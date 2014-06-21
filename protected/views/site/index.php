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
	<!-- Main Detail Information -->
	<div class="first-row">
		<!-- Field Headers -->
		<div class="row table-head">

			<div class="col-xs-2">
				<h4 class='name' data-desc='0'>Name</span></h4>
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
		<?php foreach($data as $user): ?>
			<div class="data">
				<div class="row">
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
				
				<div class="second-row">
					<!-- SECOND ROW MONTH DETAIL ========================================
					================================================================> -->
					<div class="row">
						<div class="col-xs-2 col-xs-offset-2">
							<h4 class='month'>Month</h4>
						</div>
						<div class="col-xs-2">
							<h4 class='production'>Production</h4>
						</div>
						<div class="col-xs-2">
							<h4 class='payout'>Payout</h4>
						</div>
					</div>
					<!-- ============================================================== -->
					
					<?php foreach ($user['datesresume'] as $month): ?>
						<div class="data-second-ytd">
							<div class="row">
								<div class="col-xs-2 col-xs-offset-2">
									<p class='month'><?php echo $month['month'] ?></p>
								</div>
								<div class="col-xs-2 ytd-prod ">
									<p class="bg-warning production"><?php echo $month['prod'] ?></p>
								</div>
								<div class="col-xs-2">
									<p class='payout'><?php echo $month['payout'] ?></p>
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
											<p><?php echo $detail['prod'] ?></p>
										</div>
										<div class="col-xs-2">
											<p><?php echo $detail['payout'] ?></p>
										</div>
									</div>

								<?php endforeach ?>
								<div class="row total-third">
									<div class="col-xs-2 col-xs-offset-2">
										<h4>Total: </h4>
									</div>
									<div class="col-xs-2">
										<h4><?php echo $month['prod'] ?></h4>
									</div>
									<div class="col-xs-2">
										<h4><?php echo $month['payout'] ?></h4>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>

					<!-- SECOND ROW CLIENT DETAIL ========================================
					================================================================> -->
					<div class="row">
						<div class="col-xs-2 col-xs-offset-2">
							<h4 class='client'>Client</h4>
						</div>
						<div class="col-xs-2">
							<h4 class='production'>Production</h4>
						</div>
						<div class="col-xs-2">
							<h4 class='payout'>Payout</h4>
						</div>
					</div>
					<?php foreach ($user['clientsresume'] as $client): ?>
						<div class="data-second-client">
							<div class="row">
								<div class="col-xs-2 col-xs-offset-2">
									<h4 class='client'><?php echo $client['name'] ?></h4>
								</div>
								<div class="col-xs-2">
									<h4 class='production'><?php echo $client['prod'] ?></h4>
								</div>
								<div class="col-xs-2">
									<h4 class='payout'><?php echo $client['payout'] ?></h4>
								</div>
							</div>


							<!-- THIRD TABLE DETAIL CLIENT DETAIL ========================================
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
											<p><?php echo $detail['prod'] ?></p>
										</div>
										<div class="col-xs-2">
											<p><?php echo $detail['payout'] ?></p>
										</div>
									</div>

								<?php endforeach ?>
								<div class="row total-third">
									<div class="col-xs-2 col-xs-offset-2">
										<h4>Total: </h4>
									</div>
									<div class="col-xs-2">
										<h4><?php echo $month['prod'] ?></h4>
									</div>
									<div class="col-xs-2">
										<h4><?php echo $month['payout'] ?></h4>
									</div>
								</div>
							</div>
						</div> <!-- .data-second-client -->
					<?php endforeach ?>

				</div> <!-- second row -->
				<!-- Total Second -->
				<div class="row total-second">
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
			</div> <!-- data -->

		<?php endforeach ?>
	</div> <!-- Main Detail Information -->

	<div class="row total-first">
		<div class="col-xs-2">
			<h4>Total</h4>
		</div>

		<div class="col-xs-1">
			<h4><?php echo $user['totalprod']; ?></h4>
		</div>

		<div class="col-xs-1">
			<h4><?php echo $user['totalmprod']; ?></h4>
		</div>

		<div class="col-xs-2">
			<h4><?php echo $user['totalyprod']; ?></h4>
		</div>

		<div class="col-xs-offset-2 col-xs-2">
			<h4><?php echo $user['totalpay']; ?></h4>
		</div>

		<div class="col-xs-2">
			<h4><?php echo $user['totalmpay']; ?></h4>
		</div>
	</div>
</div> <!-- container -->
