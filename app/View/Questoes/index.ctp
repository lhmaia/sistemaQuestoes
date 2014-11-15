<!-- File: /app/View/Questoes/index.ctp -->
<h1>Questões</h1>

<p><?php echo $this->Html->link('Adicionar questão',array('controller' => 'questoes', 'action' => 'add')); ?></p>

<table>
	<tr>
		<th>Id</th>
		<th>Enunciado</th>
		<th>Dificuldade</th>
		<th>Autor</th>
	</tr>
	<!-- Here is where we loop through our $posts array, printing out post info -->
	<?php foreach ($questoes as $questao): ?>
		<tr>
			<td><?php echo $questao["Questao"]["id"]; ?></td>
			<td>
				<?php echo $this->Html->link($questao["Questao"]["enunciado"],
				array("controller" => "questoes", "action" => "view", $questao["Questao"]["id"])); ?>
			</td>
			<td>
				<?php echo $questao["Questao"]["dificuldade"]; ?>
			</td>
			<td>
				<?php echo $questao["Autor"]["nome"]; ?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php unset($questao); ?>
</table>