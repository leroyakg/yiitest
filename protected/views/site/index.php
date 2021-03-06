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
					<div class="row ytd-head table-head">
						<div class="col-xs-2 col-xs-offset-2">
							<h4 data-desc='0' class='month'>Month</h4>
						</div>
						<div class="col-xs-2">
							<h4 data-desc='0' class='production'>Production</h4>
						</div>
						<div class="col-xs-2">
							<h4 data-desc='0' class='payout'>Payout</h4>
						</div>
					</div>
					<!-- ============================================================== -->
					<div class="ytd-container">
						<?php foreach ($user['datesresume'] as $month): ?>
							<div class="data-ytd">
								<div class="row">
									<div class="col-xs-2 col-xs-offset-2">
										<p class='month'><?php echo $month['month'] ?></p>
									</div>
									<div class="col-xs-2 ytd-prod ">
										<p class="bg-warning production"><?php echo $month['monthprod'] ?></p>
									</div>
									<div class="col-xs-2">
										<p class='payout'><?php echo $month['monthpay'] ?></p>
									</div>
								</div>
							
								<!-- THIRD TABLE DETAIL MONTH DETAIL ========================================
								================================================================> -->
								<div class="third-row">
									<div class="row table-head">
										<div class="col-xs-2 col-xs-offset-2">
											<h4 data-desc='0' class='date'>Date</h4>
										</div>
										<div class="col-xs-2">
											<h4 data-desc='0' class='production'>Production</h4>
										</div>
										<div class="col-xs-2">
											<h4 data-desc='0' class='payout'>Payout</h4>
										</div>
									</div>
									<div>
										
									<?php foreach ($month['allmonth'] as $detail): ?>
									  <div class="client-third">  	
										<div class="row">
											<div class="col-xs-2 col-xs-offset-2">
												<p class='date'><?php echo $detail['month'] ?></p>
											</div>
											<div class="col-xs-2">
												<p class='production'><?php echo $detail['prod'] ?></p>
											</div>
											<div class="col-xs-2">
												<p class='payout'><?php echo $detail['payout'] ?></p>
											</div>
										</div>
									  </div>

									<?php endforeach ?>
									</div>
									<div class="row total-third">
										<div class="col-xs-2 col-xs-offset-2">
											<h4 data-desc='0'>Total: </h4>
										</div>
										<div class="col-xs-2">
											<h4 data-desc='0'><?php echo $month['monthprod'] ?></h4>
										</div>
										<div class="col-xs-2">
											<h4 data-desc='0'><?php echo $month['monthpay'] ?></h4>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div>

					<!-- SECOND ROW CLIENT DETAIL ========================================
					================================================================> -->
					<div class="row client-head table-head">
						<div class="col-xs-2 col-xs-offset-2">
							<h4 data-desc='0' class='client'>Client</h4>
						</div>
						<div class="col-xs-2">
							<h4 data-desc='0' class='production'>Production</h4>
						</div>
						<div class="col-xs-2">
							<h4 data-desc='0' class='payout'>Payout</h4>
						</div>
					</div>

					<div>
						<?php foreach ($user['clientsresume'] as $client): ?>
							<div class="data-client">
								<div class="row">
									<div class="col-xs-2 col-xs-offset-2">
										<p class='client'><?php echo $client['name'] ?></p>
									</div>
									<div class="col-xs-2 client-prod">
										<p class='production bg-warning'><?php echo $client['prod'] ?></p>
									</div>
									<div class="col-xs-2">
										<p class='payout'><?php echo $client['payout'] ?></p>
									</div>
								</div>

								<!-- THIRD TABLE DETAIL CLIENT DETAIL ========================================
									================================================================> -->
								<div class="third-row">
									<div class="row table-head">
										<div class="col-xs-2 col-xs-offset-2">
											<h4 data-desc='0' class='date'>Date</h4>
										</div>
										<div class="col-xs-2">
											<h4 data-desc='0' class='production'>Production</h4>
										</div>
										<div class="col-xs-2">
											<h4 data-desc='0' class='payout'>Payout</h4>
										</div>
									</div>
									<!-- EDIT THIS ===================================================================
									============================================================================== -->
									<div>
										<?php foreach ($client['clientdata'] as $detail): ?>
											<div class="client-third">
												<div class="row">
													<div class="col-xs-2 col-xs-offset-2">
														<p class='date'><?php echo $detail['month'] ?></p>
													</div>
													<div class="col-xs-2">
														<p class='production'><?php echo $detail['prod'] ?></p>
													</div>
													<div class="col-xs-2">
														<p class='payout'><?php echo $detail['payout'] ?></p>
													</div>
												</div>
											</div>
										<?php endforeach ?>
									</div>
									<div class="row total-third">
										<div class="col-xs-2 col-xs-offset-2">
											<h4>Total: </h4>
										</div>
										<div class="col-xs-2">
											<h4><?php echo $client['prod'] ?></h4>
										</div>
										<div class="col-xs-2">
											<h4><?php echo $client['payout'] ?></h4>
										</div>
									</div>
								</div>
							</div> <!-- .data-second-client -->
						<?php endforeach ?>
					</div>

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
