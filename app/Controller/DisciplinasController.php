<?php
	class DisciplinasController extends AppController {
		public $helpers = array("Html", "Form");
		
		public function index() {
			$this->set("disciplinas", $this->Disciplina->find("all"));
		}
		
		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__("Disciplina inv�lida"));
			}
			$disciplina = $this->Disciplina->findById($id);
			if (!$disciplina) {
				throw new NotFoundException(__("Disciplina inv�lida"));
			}
			$this->set("disciplina", $disciplina);
		}
		
		public function add() {
			if ($this->request->is('post')) {
				$this->Disciplina->create();
				if ($this->Disciplina->save($this->request->data)) {
					$this->Session->setFlash(__('A disciplina foi salva.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Imposs�vel salvar esta disciplina.'));
			}
		}
		
		public function edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Disciplina inv�lida'));
			}
			$disciplina = $this->Disciplina->findById($id);
			if (!$disciplina) {
				throw new NotFoundException(__('Disciplina inv�lida'));
			}
			if ($this->request->is(array('post', 'put'))) {
				$this->Disciplina->id = $id;
				if ($this->Disciplina->save($this->request->data)) {
					$this->Session->setFlash(__('A disciplina foi atualizada.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Imposs�vel salvar o disciplina.'));
			}
			if (!$this->request->data) {
				$this->request->data = $disciplina;
			}
		}
		
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			if ($this->Disciplina->delete($id)) {
				$this->Session->setFlash(
					__('A disciplina com id %s foi exclu�da.', h($id))
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
?>