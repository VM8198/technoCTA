<?php

App::uses('AppModel', 'Model');

class Bookinglog extends AppModel{
    var $name = 'Bookinglog';
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
