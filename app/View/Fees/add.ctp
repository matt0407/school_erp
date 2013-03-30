<div class="fees form">
<?php echo $this->Form->create('Fee'); ?>
	<fieldset>
		<legend><?php echo __('Add Fee'); ?></legend>
	<?php
		echo $this->Form->input('fee_name');
		echo $this->Form->input('fee_cost');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Fees'), array('action' => 'index')); ?></li>
	</ul>
</div>
