<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chefdep'), ['action' => 'edit', $chefdep->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chefdep'), ['action' => 'delete', $chefdep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chefdep->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chefdep'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chefdep'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chefdep view large-9 medium-8 columns content">
    <h3><?= h($chefdep->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Departement') ?></th>
            <td><?= h($chefdep->departement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= h($chefdep->employee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($chefdep->id) ?></td>
        </tr>
    </table>
</div>
