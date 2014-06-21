<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */


	public function actions()
	{
		return array(
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$data = array();

		//TODAY'S DATE
	     $start =  date("Y-m-d");

	     //TODAY'S YEAR
	     $year =  date("Y");

		//TODAY'S MONTH
	     $month =  date("m");

	     //YESTERDAY
	     $yesterday = date("Y-m-d",strtotime("-1 days"));	

	     //FIND ALL USER'S
		$criteria=new CDbCriteria();
	    $users=User::model()->findAll($criteria);
     	$totalprod = 0;
		$totalpay = 0;
		$totalmprod = 0;
		$totalmpay = 0;
		$totalyprod = 0;
		$totalypay = 0;
		$allmonthprod = 0;
		$allmonthpay = 0;

	     foreach ($users as $user) {
	     	//FIND ALL PRODUCTION AND PAYOUT FROM A USER ID = ID
			$YTD = 0;
			$YTD2 = 0;
			$details = array();
			$seqno= $user->seqNo;
	     	$criteria=new CDbCriteria;
			$criteria->select='*';
			$criteria->condition='userSeqNo='.$seqno.' and YEAR(date_sale)= '.$year;
			$sales=Sale::model()->findAll($criteria);
			$nameclient = array();
			$clients= array();
				foreach ($sales as $sale) {

					//YTD for each client
					$YTD = $YTD + $sale->prod;
					$YTD2 = $YTD2 + $sale->payout;

					//Total values for all the table
					$totalprod = $totalprod + $sale->prod;
					$totalpay = $totalpay + $sale->payout;

					//Array to hold all user data
					$clientdata = array();

					//Single fetch for client name
					$clientId = $sale->clientSeqNo;
					$clientname=Client::model()->find('seqNo=:id', array(':id'=>$clientId));

					//Query 
					$criteria->select='*';
					$criteria->condition='clientSeqNo='.$sale->clientSeqNo.' and YEAR(date_sale)= '.$year;
					$details=Sale::model()->findAll($criteria);
					//Recover all data for each client, for the third table.
					foreach ($details as $detail) {
						$clientdata[] = array(
							'month' => $detail->date_sale, 
							'prod' => $detail->prod, 
							'payout' => $detail->payout
							);
					}
					//--------------------------------------------------------------------->
					if(isset($clients[$clientId])) {
	    				$clients[$clientId]['prod'] += $sale->prod;
	    				$clients[$clientId]['payout'] += $sale->payout;
					}
					else {
	    				$clients[$clientId]['prod'] = $sale->prod;
	    				$clients[$clientId]['payout'] = $sale->payout;
	    				$clients[$clientId]['name'] = $clientname->name;
	    				$clients[$clientId]['date'] = $sale->date_sale;
	    				$clients[$clientId]['clientdata'] = $clientdata;
					}
					//<----------------------------------------------------------------------
					
				 }

			//GROUP BY MONTH FOR EACH USER
			$datesresume = array();
			$seqno= $user->seqNo;
	     	$criteria=new CDbCriteria;
			$criteria->select='*';
			$criteria->condition='userSeqNo='.$seqno.' group by MONTH(date_sale)';
			$sales=Sale::model()->findAll($criteria);

				foreach ($sales as $sale) {
				//TOTAL DATE'S IN A MONTH		
				$allmonth = array();
				$criteria=new CDbCriteria;
				$criteria->select='*';
				$criteria->condition='userSeqNo='.$seqno.' and MONTH(date_sale)= '.Yii::app()->dateFormatter->format("M", $sale->date_sale);
				$sales=Sale::model()->findAll($criteria);

					foreach ($sales as $sale) {
						$allmonth[] = array('month' => $sale->date_sale, 'prod' => $sale->prod, 'payout' => $sale->payout);
					}

				$allmonthprod = $allmonthprod + $sale->prod;
				$allmonthpay = $allmonthpay + $sale->payout;
				$datesresume[] = array('month' => Yii::app()->dateFormatter->format("MM/yy", $sale->date_sale), 'prod' => $sale->prod, 'payout' => $sale->payout, 'allmonth' => $allmonth);
			 	}
			// FOR MTD CALCULATION
			$MTD = 0;
			$MTD2 = 0;
			$seqno= $user->seqNo;
			$monthresume = array();
	     	$criteria=new CDbCriteria;
			$criteria->select='*';
			$criteria->condition='userSeqNo='.$seqno.' and MONTH(date_sale)= '.$month;
			$sales=Sale::model()->findAll($criteria);

				foreach ($sales as $sale) {
					//Total MTD for each user and total
					$MTD = $MTD + $sale->prod;
					$MTD2 = $MTD2 + $sale->payout;
					$totalmprod = $totalmprod + $sale->prod;
					$totalmpay = $totalmpay + $sale->payout;

					$monthresume[] = array('month' => Yii::app()->dateFormatter->format("MM/yy", $sale->date_sale), 
						'prod' => $sale->prod, 
						'pay' => $sale->payout
						);

				 }
				 
			//FOR YESTERDAY CALCULATION
			$YYTD = 0;
			$YYTD2 = 0;
			$seqno= $user->seqNo;
	     	$criteria=new CDbCriteria;
			$criteria->select='*';
			$criteria->condition='userSeqNo='.$seqno.' and DAY(date_sale)= '.$yesterday;
			$sales=Sale::model()->findAll($criteria);

				foreach ($sales as $sale) {
					
					$YYTD = $YYTD + $sale->prod;
					$YYTD2 = $YYTD2 + $sale->payout;

					$totalyprod = $totalyprod + $sale->prod;
					$totalypay = $totalypay + $sale->payout;
				 }

	     	
			// AN MASTER ARRAY THAT HOLDS ALL DATA WE NEED IN VIEW
			$data[]=array(
				'name'=>$user->name, 
				'YTD' => $YTD, 
				'YTD2' => $YTD2, 
				'MTD' => $MTD, 
				'MTD2' => $MTD2, 
				'YYTD' => $YYTD, 
				'YYTD2' => $YYTD2, 
				'monthresume' => $monthresume, 
				'datesresume' => $datesresume, 
				'totalpay' => $totalpay, 
				'totalprod' => $totalprod, 
				'totalmpay' => $totalmpay,
				'totalmprod' => $totalmprod, 
				'totalypay' => $totalypay,
				'totalyprod' => $totalyprod,
				'allmonthprod' => $allmonthprod, 
				'allmonthpay' => $allmonthpay, 
				'nameclient' => $nameclient,
				'clientsresume' => $clients);
	     	}


	     	
		$this->render('index', array('data' => $data));

	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	
}