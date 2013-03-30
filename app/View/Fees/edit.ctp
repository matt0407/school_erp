<div class="fees form">
<?php echo $this->Form->create('Fee'); ?>
	<fieldset>
		<legend><?php echo __('Edit Fee'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fee_name');
		echo $this->Form->input('fee_cost');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Fee.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Fee.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fees'), array('action' => 'index')); ?></li>
	</ul>
</div>
