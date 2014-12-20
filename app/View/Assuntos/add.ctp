<!-- File: /app/View/Assuntos/add.ctp -->

<h1>Adicionar Assunto</h1>
<?php
	echo $this->Form->create('Assunto');
	echo $this->Form->input('nome');
	echo $this->Form->input('descricao');
	echo $this->Form->input('Disciplina');
	echo $this->Form->end('Salvar o assunto');
?>
