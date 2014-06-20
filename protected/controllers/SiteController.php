<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */


	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
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
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$data = array();

		//TODAY'S DATE
	     $start =  date("Y-m-d");

	     //TODAY'S YEAR
	     $year =  date("Y");

		//TODAY'S MONTH
	     $month =  date("m");

	     //YESTERDAY
	     $yesterday = date("Y-m-d",strtotime("-1 days"));	     
	 
	     //1 MONTH FROM TODAY
	     $end = date("Y-m-d",strtotime("+1 months"));
	 
	     //SEND REMINDER 25 DAYS FROM TODAY
	     $reminder = date("Y-m-d",strtotime("+25 days"));
	 
	     //REMOVE THE RECORD 1 YEAR FROM TODAY
	     $remove = date("Y-m-d",strtotime("+1 years"));

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

			$YTD = 0;
			$YTD2 = 0;
			$details = array();
			$seqno= $user->seqNo;
	     	$criteria=new CDbCriteria;
			$criteria->select='*';  // only select the 'title' column
			$criteria->condition='userSeqNo='.$seqno.' and YEAR(date_sale)= '.$year;
			$sales=Sale::model()->findAll($criteria); // $params is not needed

			foreach ($sales as $sale) {
				//var_dump($sale->prod);
				$YTD = $YTD + $sale->prod;
				$YTD2 = $YTD2 + $sale->payout;

				$totalprod = $totalprod + $sale->prod;
				$totalpay = $totalpay + $sale->payout;

				$details[] = array('id' => $sale->seqNo, 'month' => $sale->date_sale, 'prod' => $sale->prod, 'pay' => $sale->payout);
			 }

			$datesresume = array();
			$seqno= $user->seqNo;
	     	$criteria=new CDbCriteria;
			$criteria->select='*';  // only select the 'title' column
			$criteria->condition='userSeqNo='.$seqno.' group by MONTH(date_sale)';
			$sales=Sale::model()->findAll($criteria); // $params is not needed

			foreach ($sales as $sale) {
							
				$allmonth = array();
				$criteria=new CDbCriteria;
				$criteria->select='*';  // only select the 'title' column
				$criteria->condition='userSeqNo='.$seqno.' and MONTH(date_sale)= '.Yii::app()->dateFormatter->format("M", $sale->date_sale);
				$sales=Sale::model()->findAll($criteria);

					foreach ($sales as $sale) {
						$allmonth[] = array('month' => $sale->date_sale, 'prod' => $sale->prod, 'payout' => $sale->payout);
					}

				$allmonthprod = $allmonthprod + $sale->prod;
				$allmonthpay = $allmonthpay + $sale->payout;
				$datesresume[] = array('month' => Yii::app()->dateFormatter->format("MM/yy", $sale->date_sale), 'prod' => $sale->prod, 'payout' => $sale->payout, 'allmonth' => $allmonth);
			 }

			$MTD = 0;
			$MTD2 = 0;
			$seqno= $user->seqNo;
			$monthresume = array();
	     	$criteria=new CDbCriteria;
			$criteria->select='*';  // only select the 'title' column
			$criteria->condition='userSeqNo='.$seqno.' and MONTH(date_sale)= '.$month;
			$sales=Sale::model()->findAll($criteria); // $params is not needed

			foreach ($sales as $sale) {
				//var_dump($sale->prod);
				$MTD = $MTD + $sale->prod;
				$MTD2 = $MTD2 + $sale->payout;

				$totalmprod = $totalmprod + $sale->prod;
				$totalmpay = $totalmpay + $sale->payout;

				$monthresume[] = array('month' => Yii::app()->dateFormatter->format("MM/yy", $sale->date_sale), 'prod' => $sale->prod, 'pay' => $sale->payout);

			 }

			$YYTD = 0;
			$YYTD2 = 0;
			$seqno= $user->seqNo;
	     	$criteria=new CDbCriteria;
			$criteria->select='*';  // only select the 'title' column
			$criteria->condition='userSeqNo='.$seqno.' and DAY(date_sale)= '.$yesterday;
			$sales=Sale::model()->findAll($criteria); // $params is not needed

			foreach ($sales as $sale) {
				//var_dump($sale->prod);
				$YYTD = $YYTD + $sale->prod;
				$YYTD2 = $YYTD2 + $sale->payout;

				$totalyprod = $totalyprod + $sale->prod;
				$totalypay = $totalypay + $sale->payout;
			 }


			$data[]=array('name'=>$user->name, 'YTD' => $YTD, 'YTD2' => $YTD2, 'MTD' => $MTD, 'MTD2' => $MTD2, 'YYTD' => $YYTD, 'YYTD2' => $YYTD2, 'details' => $details, 'monthresume' => $monthresume, 'datesresume' => $datesresume, 'totalpay' => $totalpay, 'totalprod' => $totalprod, 'totalmpay' => $totalmpay,'totalmprod' => $totalmprod, 'totalypay' => $totalypay,'totalyprod' => $totalyprod,
				'allmonthprod' => $allmonthprod, 'allmonthpay' => $allmonthpay);
	     	}

	    $criteria=new CDbCriteria();
	    $client=Client::model()->findAll($criteria);


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