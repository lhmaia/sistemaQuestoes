<?php
	class QuestoesController extends AppController {
		public $helpers = array("Html", "Form");
		
		public function index() {
			$this->set("questoes", $this->Questao->find("all"));
		}
		
		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__("Quest�o inv�lida"));
			}
			//$questao = $this->Questao->findById($id);
			$questao = $this->Questao->find('first', array('conditions' => array('Questao.id' => $id),'recursive' => 2));
			if (!$questao) {
				throw new NotFoundException(__("Quest�o inv�lida"));
			}
			$this->set("questao", $questao);
		}
		
				
		public function add() {
			if ($this->request->is('post')){
				$this->Questao->create();
				if ($this->Questao->save($this->request->data)) {
					$this->Session->setFlash(__('Sua quest�o foi salva.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('N�o foi poss�vel salvar sua quest�o.'));
			}
			$this->set('assuntos', $this->Questao->Assunto->find('list', array('fields'=>array('id','nome'))));
			//$this->set('autores', $this->Questao->Autor->find('list', array('fields'=>array('id','nome'))));
			$this->set('autores', $this->Questao->Autor->find('list', array('fields'=>array('id','nome'))));
		}
	}
?>