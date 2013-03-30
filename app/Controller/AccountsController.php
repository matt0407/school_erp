<?php
App::uses('AppController', 'Controller');
/**
 * Accounts Controller
 *
 * @property Account $Account
 */
class AccountsController extends AppController {
	public $uses = array('Account', 'Fee');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$options = array('fields' => 'Account.*, Fee.fee_name');
		$options['joins'] = array(
		    array('table' => 'fees',
		        'alias' => 'Fee',
		        'type' => 'LEFT',
		        'conditions' => array(
		            'Fee.id = Account.fee_id',
		        )
		    )
		);
		
		$this->set('accounts', $this->Account->find('all', $options));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Account->exists($id)) {
			throw new NotFoundException(__('Invalid account'));
		}
		$options = array('conditions' => array('Account.' . $this->Account->primaryKey => $id));
		$this->set('account', $this->Account->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Account->create($this->request->data);
			if ($this->Account->validates()) {
				if ($this->Account->save()) {
					$this->Session->setFlash(__('The account has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The account could not be saved. Please, try again.'));
				}	
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.'));
			}
		}
		
		$fees = $this->Fee->find('list', array('fields' => array('Fee.id', 'Fee.fee_name')));
        $this->set(compact('fees'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Account->exists($id)) {
			throw new NotFoundException(__('Invalid account'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Account->validates()) {
				if ($this->Account->save($this->request->data)) {
					$this->Session->setFlash(__('The account has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The account could not be saved. Please, try again.'));
				}	
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Account.' . $this->Account->primaryKey => $id));
			$this->request->data = $this->Account->find('first', $options);
		}

		$fees = $this->Fee->find('list', array('fields' => array('Fee.id', 'Fee.fee_name')));
        $this->set(compact('fees'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Account->id = $id;
		if (!$this->Account->exists()) {
			throw new NotFoundException(__('Invalid account'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Account->delete()) {
			$this->Session->setFlash(__('Account deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Account was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
