<!-- File: /app/View/Questoes/add.ctp -->
<h1>Adicionar Quest�o</h1>
<?php
echo $this->Form->create('Questao');
//echo $this->Form->inputs();
echo $this->Form->input('enunciado', array('rows' => '3'));
echo $this->Form->input('Assunto', array('type' => 'select'));
echo $this->Form->input('Autor');
echo $this->Form->input('dificuldade', array('options' => array('Muito F�cil', 'F�cil', 'M�dio', 'Dif�cil', 'Muito Dif�cil')));
echo $this->Form->input('palavras-chave');
echo $this->Form->end('Salvar a quest�o');
?>