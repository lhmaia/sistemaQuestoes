<!-- File: /app/View/Assuntos/index.ctp -->
<h1>Assuntos</h1>

<p><?php echo $this->Html->link('Adicionar assunto',array('controller' => 'assuntos', 'action' => 'add')); ?></p>

<table>
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<th>Descrição</th>
		<th>Disciplina</th>
		<th>Ação</th>
	</tr>
	<!-- Here is where we loop through our $posts array, printing out post info -->
	<?php foreach ($assuntos as $Assunto): ?>
		<tr>
			<td><?php echo $this->Html->link($Assunto["Assunto"]["id"],array("controller" => "assuntos", "action" => "view", $Assunto["Assunto"]["id"])); ?></td>
			<td>
				<?php echo $Assunto["Assunto"]["nome"]?>
			</td>
			<td>
				<?php echo $Assunto["Assunto"]["descricao"]; ?>
			</td>
			<td>
				<?php echo $Assunto["Disciplina"]["nome"]; ?>
			</td>
			<td>
				<?php
					echo $this->Html->link(
					'Edit',
					array('action' => 'edit', $Assunto['Assunto']['id']));
				?>
				<?php
					echo $this->Form->postLink(
					'Delete',
					array('action' => 'delete', $Assunto['Assunto']['id']),
					array('confirm' => 'Você tem certeza?'));
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php unset($Assunto); ?>	
</table>