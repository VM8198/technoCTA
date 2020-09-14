<?php

App::uses('AppModel', 'Model');

class Sponsor extends AppModel{
    var $name = 'Sponsor';
      public $hasMany = array(
        'SponsorImage' => array(
            'className' => 'SponsorImage',
            'foreignKey' => 'title_id',
            ),);
 }   

