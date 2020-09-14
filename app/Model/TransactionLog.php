<?php

App::uses('AppModel', 'Model');

class TransactionLog extends AppModel{
    var $name = 'TransactionLog';
	public $belongsTo = array(
        'Course' => array(
            'className' => 'Course',
            'foreignKey' => 'course_id',
            ),
        

        	'User'=>array(
        		'className'=>'User',
        		'foreignKey'=>'User_id',
        		),
        );

   
}
