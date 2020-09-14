<?php
App::uses('AppModel', 'Model');
class Course extends AppModel{
    var $name = 'Course';
      public $belongsTo = array(
        'Sector' => array(
            'className' => 'Sector',
            'foreignKey' => 'sector_id',
            ),
        	'Location'=>array(
        		'className'=>'Location',
        		'foreignKey'=>'location_id',
        		),
        );
		public $hasMany = array(
			'TransactionLog'=>array(
        		'className'=>'TransactionLog',
        		'foreignKey'=>'course_id',
        		)
		);
}   