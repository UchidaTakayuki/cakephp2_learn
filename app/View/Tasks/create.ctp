<form action="<?php echo $this->Html->url('/Tasks/create');?>" method="POST">
    <?php echo $this->Form->error('Task.name'); ?>
    <?php echo $this->Form->error('Task.body'); ?>
    task name<input type="text" name="name" size="40">
    detail<br/>
    <textarea name="body" cols="40" rows="8"></textarea>
<input type="submit" value="create task">
</form>