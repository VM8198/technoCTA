<?php

App::uses('AppModel', 'Model');
class Booking extends AppModel{
    var $name = 'Booking';
    public $belongsTo = array(
        'TransactionLog' => array(
            'className' => 'TransactionLog',
            'foreignKey' => 'course_id',
            ),
        );
 }   