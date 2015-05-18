<?php

class Historylist{
	public $startday; // yy-mm-dd
	public $dayrestaurant;  // the restaurant that gains the most number of orders
	public $daytotal;  //the total number of income
	public function _construct ($x,$y){
		$this->startday =  $startday;
		$this->dayrestaurant =  $dayrestaurant;
		$this->daytotal =  $daytotal;
	}
}

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
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
		$time1 = "2015-03-21 00:00:01";
		$time2 = "2015-04-16 23:59:59";
		$time1std = strtotime($time1);
		$time2std = strtotime($time2);
		if($time1std>$time2std){
			echo "illegal";
			return;
		}
		$time1ymd = date ("y-m-d", $time1std);
		$time2ymd = date ("y-m-d", $time2std);

		$criteria = new CDbCriteria();
		$criteria->select = 'rid, created, total';
		$criteria->condition = 'created>=:time1 AND created<=:time2';
		$criteria->params = array(':time1'=>$time1, ':time2'=>$time2);
		$orderinfo = CmOrderBase::model()->findAll($criteria);
		$tempHislist = new Historylist;
		$results = array();
		foreach ($orderinfo as $eachorder){  
			$currentdate = date ("y-m-d", strtotime($eachorder['created']));
			if ($currentdate != $tempHislist->startday){ //Save old item to array results and Create new item
			    if (isset($tempHislist)) array_push($results,$tempHislist);
				$tempHislist = new Historylist;
				$tempHislist->startday = $currentdate;;
				$tempHislist->dayrestaurant = $eachorder['rid'];
				$tempHislist->daytotal = $eachorder['total'];
			}else if ($tempHislist->dayrestaurant == $eachorder['rid']){
				$tempHislist->daytotal += $eachorder['total'];
			}else{} // No action
		}
		//print_r($results);
        $this->render('index', array('results'=>$results));
	}
}
