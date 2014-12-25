<?php 
	class Assunto extends AppModel{
		public $belongsTo = 'Disciplina';
		/*
		public $hasAndBelongsToMany = array(
			'Assunto' =>
			array(
				'className' => 'Questao'
			)
		);*/
	}
?>