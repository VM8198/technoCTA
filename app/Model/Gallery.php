<?php

App::uses('AppModel', 'Model');

class Gallery extends AppModel{
    var $name = 'Gallery';
      public $hasMany = array(
        'GalleryImage' => array(
            'className' => 'GalleryImage',
            'foreignKey' => 'gallery_id',
            
            ),);
 }   

