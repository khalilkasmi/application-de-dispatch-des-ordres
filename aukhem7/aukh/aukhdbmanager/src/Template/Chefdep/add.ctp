<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Chefdep'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="chefdep form large-9 medium-8 columns content">
    <?= $this->Form->create($chefdep) ?>
    <fieldset>
        <legend><?= __('Add Chefdep') ?></legend>
        <?php
            echo $this->Form->control('departement');
            echo $this->Form->control('employee');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
