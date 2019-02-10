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
                ['action' => 'delete', $ficheorders->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ficheorders->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ficheorderss'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ficheorderss form large-9 medium-8 columns content">
    <?= $this->Form->create($ficheorders) ?>
    <fieldset>
        <legend><?= __('Edit Ficheorders') ?></legend>
        <?php
            echo $this->Form->control('numordersort');
            echo $this->Form->control('objet');
            echo $this->Form->control('destination');
            echo $this->Form->control('source');
            echo $this->Form->control('date');
            echo $this->Form->control('description');
            echo $this->Form->control('reference');
            echo $this->Form->control('from');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
