<?php
	class AutoresController extends AppController {
		public $helpers = array("Html", "Form");
		
		public function index() {
			$this->set("autores", $this->Autor->find("all"));
		}
		
		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__("Autor inválido"));
			}
			$autor = $this->Autor->findById($id);
			if (!$autor) {
				throw new NotFoundException(__("Autor inválido"));
			}
			$this->set("autor", $autor);
		}
		
		public function add() {
			if ($this->request->is('post')) {
				$this->Autor->create();
				if ($this->Autor->save($this->request->data)) {
					$this->Session->setFlash(__('O autor foi salvo.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Impossível salvar este autor.'));
			}
		}
		
		public function edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Autor inválido'));
			}
			$autor = $this->Autor->findById($id);
			if (!$autor) {
				throw new NotFoundException(__('Autor inválido'));
			}
			if ($this->request->is(array('post', 'put'))) {
				$this->Autor->id = $id;
				if ($this->Autor->save($this->request->data)) {
					$this->Session->setFlash(__('O autor foi atualizado.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Impossível salvar o autor.'));
			}
			if (!$this->request->data) {
				$this->request->data = $autor;
			}
		}
		
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			if ($this->Autor->delete($id)) {
				$this->Session->setFlash(
					__('O autor com id %s foi excluído.', h($id))
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
?>