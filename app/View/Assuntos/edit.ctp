<!-- File: /app/View/Assuntos/edit.ctp -->

<h1>Editar assunto</h1>
<?php
	echo $this->Form->create('Assunto');
	echo $this->Form->input('nome');
	echo $this->Form->input('descricao');
	echo $this->Form->input('disciplina');
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('Salvar assunto');
?>