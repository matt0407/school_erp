<?php
App::uses('AppModel', 'Model');
/**
 * Account Model
 *
 */
class Account extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'email';
/**
 * belongsTo associations
 *
 * @var array
 */
  	public $belongsTo = array(
        'Fee' => array(
            'className'  => 'Fee',
            'foreignKey' => 'fee_id',
            'conditions' => 'Fee.id = Account.fee_id',
			'fields' => '',
			'order' => ''
        )
    );

	public $validate = array(
    	'email' => array(
    		'rule' => 'email',
            'required'   => true,
        	'allowEmpty' => false,
        	'message' => 'Please supply a valid email address.'
        ),
        'first_name' => array(
        	'required'   => true,
        	'allowEmpty' => false,
        	'message' => 'Please supply first name.'
        ),
        'last_name' => array(
        	'required'   => true,
        	'allowEmpty' => false,
        	'message' => 'Please supply last name.'
        )
    );
}
