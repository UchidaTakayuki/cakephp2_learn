<?php echo $this->Html->link('new task', '/Tasks/create'); ?>
<h3><?php echo count($tasks_data); ?> count is not complete</h3>
<?php foreach ($tasks_data as $task): ?>
<?php echo $this->element('task', ['task' => $task]) ?>
<?php endforeach; ?>