<!-- File: /app/View/Disciplinas/index.ctp -->
<h1>Disciplinas</h1>

<p><?php echo $this->Html->link('Adicionar disciplina',array('controller' => 'disciplinas', 'action' => 'add')); ?></p>

<table>
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<th>Descrição</th>
		<th>Ação</th>
	</tr>
	<!-- Here is where we loop through our $posts array, printing out post info -->
	<?php foreach ($disciplinas as $Disciplina): ?>
		<tr>
			<td><?php echo $this->Html->link($Disciplina["Disciplina"]["id"],array("controller" => "disciplinas", "action" => "view", $Disciplina["Disciplina"]["id"])); ?></td>
			<td>
				<?php echo $Disciplina["Disciplina"]["nome"]?>
			</td>
			<td>
				<?php echo $Disciplina["Disciplina"]["descricao"]; ?>
			</td>
			<td>
				<?php
					echo $this->Html->link(
					'Edit',
					array('action' => 'edit', $Disciplina['Disciplina']['id']));
				?>
				<?php
					echo $this->Form->postLink(
					'Delete',
					array('action' => 'delete', $Disciplina['Disciplina']['id']),
					array('confirm' => 'Você tem certeza?'));
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php unset($Disciplina); ?>	
</table>