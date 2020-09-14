<?php

class TransactionsController extends AppController{
    var $uses = array('TransactionLog');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler');
    
    function beforeFilter() {
        parent::beforeFilter();
    
        $this->Auth->allow('admin_deleteTransaction');
    }
    
    function admin_transactionList(){
        $this->layout="admin";
        $order = array('TransactionLog.id'=>'DESC');
          $this->paginate = array(
            'order' => $order,
            'limit' => 10
        );
        $TranList = $this->paginate('TransactionLog');
        $this->set(compact('TranList'));
    }
	function admin_deleteTransaction($id = NULL) {
		$this->autoRender = FALSE;
		if ($this->TransactionLog->delete($id)) {
			$this->Session->setFlash('You have successfully deleted transaction detail');
			$this->redirect(array('controller' => 'transactions', 'action' => 'admin_transactionList'));
		}
	}
}

