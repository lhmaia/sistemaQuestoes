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
				//echo($this->request->data['Alternativa']['texto1'] . "<br>". "<br>");
				$this->request->data['Questao']['autor_id'] = $this->request->data['Questao']['Autor'];
				$this->Questao->create();
				if ($this->Questao->save($this->request->data)) {
					$this->Session->setFlash(__('Sua quest�o foi salva.'));
					//salvando alternativas
					App::uses('Alternativa', 'Model');
					while($alternativa = current($this->request->data['Alternativa']['texto'])){
						$numLetra = 97 + key($this->request->data['Alternativa']['texto']);
						$novaAlternativa['letra'] = chr($numLetra);
						$novaAlternativa['texto'] = $alternativa;
						$novaAlternativa['questao_id'] = $this->Questao->getLastInsertId();
						if (key($this->request->data['Alternativa']['texto']) == $this->request->data['Alternativa']['letraCorreta']){
							$novaAlternativa['certo'] = 1;
						}
						else{
							$novaAlternativa['certo'] = 0;
						}
						$objAlternativa = new Alternativa();
						$objAlternativa->create();
						if (!$objAlternativa->save($novaAlternativa)) {
							$this->Session->setFlash(__('Houve um erro ao salvar as alternativas.'));
						}
						next($this->request->data['Alternativa']['texto']);
					}
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('N�o foi poss�vel salvar sua quest�o.'));
			}
			$this->set('assuntos', $this->Questao->Assunto->find('list', array('fields'=>array('id','nome'))));
			//$this->set('autores', $this->Questao->Autor->find('list', array('fields'=>array('id','nome'))));
			$this->set('autores', $this->Questao->Autor->find('list', array('fields'=>array('id','nome'))));
		}
		
		public function edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Quest�o inv�lida'));
			}
			$questao = $this->Questao->findById($id);
			if (!$questao) {
				throw new NotFoundException(__('Quest�o inv�lida'));
			}
			if ($this->request->is(array('questao', 'put'))) {
				$this->Questao->id = $id;
				if ($this->Questao->save($this->request->data)) {
					$this->Session->setFlash(__('Sua quest�o foi alterada.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Imposs�vel alterar sua quest�o.'));
			}
			if (!$this->request->data) {
				$this->request->data = $questao;
			}
			$this->set('assuntos', $this->Questao->Assunto->find('list', array('fields'=>array('id','nome'))));
			//$this->set('autores', $this->Questao->Autor->find('list', array('fields'=>array('id','nome'))));
			$this->set('autores', $this->Questao->Autor->find('list', array('fields'=>array('id','nome'))));
		}
		
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			if ($this->Questao->delete($id)) {
				$this->Session->setFlash(
					__('A quest�o com id %s foi exclu�da.', h($id))
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
?>