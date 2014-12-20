<!-- File: /app/View/Disciplinas/add.ctp -->

<h1>Adicionar Disciplina</h1>
<?php
	echo $this->Form->create('Disciplina');
	echo $this->Form->input('nome');
	echo $this->Form->input('descricao');
	echo $this->Form->end('Salvar a disciplina');
?>
