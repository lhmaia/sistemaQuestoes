<!-- File: /app/View/Autores/edit.ctp -->

<h1>Editar autor</h1>
<?php
	echo $this->Form->create('Autor');
	echo $this->Form->input('nome');
	echo $this->Form->input('observacoes', array('rows' => '3'));
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('Salvar autor');
?>