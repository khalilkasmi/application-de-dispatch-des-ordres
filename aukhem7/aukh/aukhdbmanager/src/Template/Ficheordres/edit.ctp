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
                ['action' => 'delete', $ficheordre->nordres],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ficheordre->nordres)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ficheordres'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ficheordres form large-9 medium-8 columns content">
    <?= $this->Form->create($ficheordre) ?>
    <fieldset>
        <legend><?= __('Edit Ficheordre') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('desciption');
            echo $this->Form->control('destination');
            echo $this->Form->control('source');
            echo $this->Form->control('objet');
            echo $this->Form->control('reference');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
