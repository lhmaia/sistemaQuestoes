<!-- File: /app/View/Questoes/edit.ctp -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/ckeditor/ckeditor.js"></script>
<script src="/ckeditor/adapters/jquery.js"></script>
<script src="/ckfinder/ckfinder.js"></script>
<script>
	$(document).ready(function(){
		//$("#QuestaoEnunciado").ckeditor();
		var editor = CKEDITOR.replace( 'QuestaoEnunciado' );
		CKFinder.setupCKEditor( editor, '/ckfinder/' );
	});
</script>

<h1>Editar quest�o</h1>
<?php
	echo $this->Form->create('Questao');
	echo $this->Form->input('enunciado', array('rows' => '3'));
	echo $this->Form->input('Assunto', array('type' => 'select'));
	echo $this->Form->input('autor_id');
	echo $this->Form->input('dificuldade', array('options' => 
											array('Muito F�cil' => 'Muito F�cil', 'F�cil' => 'F�cil', 
													'M�dio' => 'M�dio', 'Dif�cil' => 'Dif�cil', 
													'Muito Dif�cil' => 'Muito Dif�cil')));

	echo $this->Form->input('tipo_prova', array('options' => array('Fechada', 'Aberta'), 'label' => 'Tipo de prova'));
	echo $this->Form->input('palavras-chave');
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('Salvar quest�o');
?>