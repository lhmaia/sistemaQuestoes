<!-- File: /app/View/Questeos/view.ctp -->
<h1><?php echo h($questao["Questao"]["enunciado"]); ?></h1>
<p><small>Autor: <?php echo $questao["Autor"]["nome"]; ?></small></p>
<p><small> 
<?php foreach($questao["Assunto"] as $assunto):?>
<?php echo "Assunto: " . $assunto["nome"] . ", disciplina: " . $assunto["Disciplina"]["nome"] . "<br>"; 
?>
<?php endforeach; ?><?php unset($alternativa); ?>
</small></p>

<?php foreach($questao["Alternativa"] as $alternativa):?>
<p><?php echo h($alternativa["letra"]);
		 echo ") ";
		 echo h($alternativa["texto"]);
		 echo "<br>"
 ?></p>
 <?php endforeach; ?>
 <?php unset($alternativa); ?>