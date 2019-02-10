<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Persserv'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="persserv form large-9 medium-8 columns content">
    <?= $this->Form->create($persserv) ?>
    <fieldset>
        <legend><?= __('Add Persserv') ?></legend>
        <?php
            echo $this->Form->control('service');
            echo $this->Form->control('employe');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
