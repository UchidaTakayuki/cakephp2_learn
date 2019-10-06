<?php echo $this->Form->create('Task', ['type' => 'post']); ?>
<?php
echo $this->Form->input('Task.name', ['label' => 'title']);
echo $this->Form->input('Task.body', ['label' => 'detail']);
echo $this->Form->end('save');
?>
