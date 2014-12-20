<!-- File: /app/View/Disciplinas/edit.ctp -->

<h1>Editar disciplina</h1>
<?php
	echo $this->Form->create('Disciplina');
	echo $this->Form->input('nome');
	echo $this->Form->input('descricao');
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('Salvar disciplina');
?>