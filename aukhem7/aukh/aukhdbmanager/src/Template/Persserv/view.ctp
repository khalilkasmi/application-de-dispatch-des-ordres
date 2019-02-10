<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Persserv'), ['action' => 'edit', $persserv->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Persserv'), ['action' => 'delete', $persserv->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persserv->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Persserv'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persserv'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="persserv view large-9 medium-8 columns content">
    <h3><?= h($persserv->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Service') ?></th>
            <td><?= h($persserv->service) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employe') ?></th>
            <td><?= h($persserv->employe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($persserv->id) ?></td>
        </tr>
    </table>
</div>
