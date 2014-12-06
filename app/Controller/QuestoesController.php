<?php
	class QuestoesController extends AppController {
		public $helpers = array("Html", "Form");
		
		public function index() {
			$this->set("questoes", $this->Questao->find("all"));
		}
		
		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__("Questão inválida"));
			}
			//$questao = $this->Questao->findById($id);
			$questao = $this->Questao->find('first', array('conditions' => array('Questao.id' => $id),'recursive' => 2));
			if (!$questao) {
				throw new NotFoundException(__("Questão inválida"));
			}
			$this->set("questao", $questao);
		}
		
				
		public function add() {
			if ($this->request->is('post')){
				//echo($this->request->data['Alternativa']['texto1'] . "<br>". "<br>");
				$this->request->data['Questao']['autor_id'] = $this->request->data['Questao']['Autor'];
				$this->Questao->create();
				if ($this->Questao->save($this->request->data)) {
					$this->Session->setFlash(__('Sua questão foi salva.'));
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
				$this->Session->setFlash(__('Não foi possível salvar sua questão.'));
			}
			$this->set('assuntos', $this->Questao->Assunto->find('list', array('fields'=>array('id','nome'))));
			//$this->set('autores', $this->Questao->Autor->find('list', array('fields'=>array('id','nome'))));
			$this->set('autores', $this->Questao->Autor->find('list', array('fields'=>array('id','nome'))));
		}
	}
?>