<?php
	class AssuntosController extends AppController {
		public $helpers = array("Html", "Form");
		
		public function index() {
			$this->set("assuntos", $this->Assunto->find("all"));			
		}
		
		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__("Assunto inv�lido"));
			}
			$assunto = $this->Assunto->findById($id);
			if (!$assunto) {
				throw new NotFoundException(__("Assunto inv�lido"));
			}
			$this->set("assunto", $assunto);
		}
		
		public function add() {
			if ($this->request->is('post')) {
				$this->request->data['Assunto']['disciplina_id'] = $this->request->data['Assunto']['Disciplina'];
				$this->Assunto->create();
				if ($this->Assunto->save($this->request->data)) {
					$this->Session->setFlash(__('O assunto foi salvo.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Imposs�vel salvar este assunto.'));
			}
			$this->set('disciplinas', $this->Assunto->Disciplina->find('list', array('fields'=>array('id','nome'))));
		}
		
		public function edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Assunto inv�lido'));
			}
			$assunto = $this->Assunto->findById($id);
			if (!$assunto) {
				throw new NotFoundException(__('Assunto inv�lido'));
			}
			if ($this->request->is(array('post', 'put'))) {
				$this->Assunto->id = $id;
				if ($this->Assunto->save($this->request->data)) {
					$this->Session->setFlash(__('O assunto foi atualizado.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Imposs�vel salvar o assunto.'));
			}
			if (!$this->request->data) {
				$this->request->data = $assunto;
			}
			$this->set('disciplinas', $this->Assunto->Disciplina->find('list', array('fields'=>array('id','nome'))));
		}
		
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			if ($this->Autor->delete($id)) {
				$this->Session->setFlash(
					__('O autor com id %s foi exclu�do.', h($id))
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
?>