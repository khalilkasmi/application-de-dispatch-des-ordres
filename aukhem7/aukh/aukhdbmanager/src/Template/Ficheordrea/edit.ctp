<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ficheordrea->n_order_a],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ficheordrea->n_order_a)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ficheordrea'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ficheordrea form large-9 medium-8 columns content">
    <?= $this->Form->create($ficheordrea) ?>
    <fieldset>
        <legend><?= __('Edit Ficheordrea') ?></legend>
        <?php
            echo $this->Form->control('date', ['empty' => true]);
            echo $this->Form->control('reference');
            echo $this->Form->control('organisme');
            echo $this->Form->control('objet');
            echo $this->Form->control('destination');
            echo $this->Form->control('description');
            echo $this->Form->control('instruction');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
