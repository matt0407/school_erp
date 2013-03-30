<div class="fees view">
<h2><?php  echo __('Fee'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($fee['Fee']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fee Name'); ?></dt>
		<dd>
			<?php echo h($fee['Fee']['fee_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fee Cost'); ?></dt>
		<dd>
			<?php echo h('$'.$fee['Fee']['fee_cost']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fee'), array('action' => 'edit', $fee['Fee']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fee'), array('action' => 'delete', $fee['Fee']['id']), null, __('Are you sure you want to delete # %s?', $fee['Fee']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fee'), array('action' => 'add')); ?> </li>
	</ul>
</div>
