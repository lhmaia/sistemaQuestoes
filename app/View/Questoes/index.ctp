<!-- File: /app/View/Questoes/index.ctp -->
<p><?php echo $this->Html->link('Gerenciar Autores',array('controller' => 'autores', 'action' => 'index')); ?></p>
<p><?php echo $this->Html->link('Gerenciar Disciplinas',array('controller' => 'disciplinas', 'action' => 'index')); ?></p>
<p><?php echo $this->Html->link('Gerenciar Assuntos',array('controller' => 'assuntos', 'action' => 'index')); ?></p>
<br>

<hr>

<br>
<h1>Questões</h1>

<p><?php echo $this->Html->link('Adicionar questão',array('controller' => 'questoes', 'action' => 'add')); ?></p>

<table>
	<tr>
		<th>Id</th>
		<th>Enunciado</th>
		<th>Dificuldade</th>
		<th>Autor</th>
		<th>Ação</th>
	</tr>
	<!-- Here is where we loop through our $posts array, printing out post info -->
	<?php foreach ($questoes as $questao): ?>
		<tr>
			<td><?php echo $this->Html->link($questao["Questao"]["id"],array("controller" => "questoes", "action" => "view", $questao["Questao"]["id"])); ?></td>
			<td>
				<?php //echo $this->Html->link($questao["Questao"]["enunciado"],
				//array("controller" => "questoes", "action" => "view", $questao["Questao"]["id"])); 
				echo $questao["Questao"]["enunciado"]?>
			</td>
			<td>
				<?php echo $questao["Questao"]["dificuldade"]; ?>
			</td>
			<td>
				<?php echo $questao["Autor"]["nome"]; ?>
			</td>
			<td>
				<?php
					echo $this->Html->link(
					'Edit',
					array('action' => 'edit', $questao['Questao']['id']));
				?>
				<?php
					echo $this->Form->postLink(
					'Delete',
					array('action' => 'delete', $questao['Questao']['id']),
					array('confirm' => 'Você tem certeza?'));
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php unset($questao); ?>
</table>