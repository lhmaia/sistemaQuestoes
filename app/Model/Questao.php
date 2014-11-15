<?php 
	class Questao extends AppModel{
		public $belongsTo = 'Autor';
		public $hasMany = 'Alternativa';
		public $hasAndBelongsToMany = array(
			'Assunto' =>
			array(
				'className' => 'Assunto'
			)
		);
	}
?>