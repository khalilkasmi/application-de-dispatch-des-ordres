<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Employe'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="employe form large-9 medium-8 columns content">
    <?= $this->Form->create($employe) ?>
    <fieldset>
        <legend><?= __('Add Employe') ?></legend>
        <?php
            echo $this->Form->control('login');
            echo $this->Form->control('password');
            echo $this->Form->control('role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
