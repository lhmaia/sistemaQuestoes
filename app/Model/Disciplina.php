<?php 
	class Disciplina extends AppModel{
		public $hasMany = array(
							'AssuntoDisciplina' => array(
							'className' => 'Assunto'));
	}
?>