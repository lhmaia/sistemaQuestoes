<!-- File: /app/View/Autores/add.ctp -->

<h1>Adicionar Autor</h1>
<?php
	echo $this->Form->create('Autor');
	//echo $this->Form->inputs();
	echo $this->Form->input('nome');
	echo $this->Form->input('observacoes', array('rows' => '3'));
	echo $this->Form->end('Salvar o autor');
?>
