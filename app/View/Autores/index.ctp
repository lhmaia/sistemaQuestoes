<!-- File: /app/View/Autores/index.ctp -->
<h1>Autores</h1>

<p><?php echo $this->Html->link('Adicionar autor',array('controller' => 'autores', 'action' => 'add')); ?></p>

<table>
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<th>Observações</th>
		<th>Ação</th>
	</tr>
	<!-- Here is where we loop through our $posts array, printing out post info -->
	<?php foreach ($autores as $Autor): ?>
		<tr>
			<td><?php echo $this->Html->link($Autor["Autor"]["id"],array("controller" => "autores", "action" => "view", $Autor["Autor"]["id"])); ?></td>
			<td>
				<?php echo $Autor["Autor"]["nome"]?>
			</td>
			<td>
				<?php echo $Autor["Autor"]["observacoes"]; ?>
			</td>
			<td>
				<?php
					echo $this->Html->link(
					'Edit',
					array('action' => 'edit', $Autor['Autor']['id']));
				?>
				<?php
					echo $this->Form->postLink(
					'Delete',
					array('action' => 'delete', $Autor['Autor']['id']),
					array('confirm' => 'Você tem certeza?'));
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php unset($Autor); ?>	
</table>