<?php
App::uses('AppModel', 'Model');
/**
 * Fee Model
 *
 */
class Fee extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'fee_name';

	public $validate = array(
    	'fee_name' => array(
            'rule'   => 'notEmpty'
        ),
        'fee_cost' => array(
        	'rule'   => 'notEmpty'
        )
    );
	
	public $hasOne = 'Account';
}
