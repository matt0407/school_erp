<?php
App::uses('AppController', 'Controller');
/**
 * Fees Controller
 *
 * @property Fee $Fee
 */
class FeesController extends AppController {
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Fee->recursive = 0;
		$this->set('fees', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Fee->exists($id)) {
			throw new NotFoundException(__('Invalid fee'));
		}
		$options = array('conditions' => array('Fee.' . $this->Fee->primaryKey => $id));
		$this->set('fee', $this->Fee->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Fee->create($this->request->data);
			if ($this->Fee->validates()) {
				if ($this->Fee->save()) {
					$this->Session->setFlash(__('The fee has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The fee could not be saved. Please, try again.'));
				}	
			} else {
				$this->Session->setFlash(__('The fee could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Fee->exists($id)) {
			throw new NotFoundException(__('Invalid fee'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Fee->validates()) {
				if ($this->Fee->save($this->request->data)) {
					$this->Session->setFlash(__('The fee has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The fee could not be saved. Please, try again.'));
				}	
			} else {
				$this->Session->setFlash(__('The fee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Fee.' . $this->Fee->primaryKey => $id));
			$this->request->data = $this->Fee->find('first', $options);
		}
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
		$this->Fee->id = $id;
		if (!$this->Fee->exists()) {
			throw new NotFoundException(__('Invalid fee'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Fee->delete()) {
			$this->Session->setFlash(__('Fee deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Fee was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
