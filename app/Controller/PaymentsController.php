<?php

class PaymentsController extends AppController{
	var $uses = array('Payment');
	var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

	function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow('paymentpage');
	}

	function paymentpage(){
		$this->layout = 'Home';
	}
}