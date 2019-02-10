<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ficheorders'), ['action' => 'edit', $ficheorders->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ficheorders'), ['action' => 'delete', $ficheorders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ficheorders->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ficheorderss'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ficheorders'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ficheorderss view large-9 medium-8 columns content">
    <h3><?= h($ficheorders->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Numordersort') ?></th>
            <td><?= h($ficheorders->numordersort) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Objet') ?></th>
            <td><?= h($ficheorders->objet) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination') ?></th>
            <td><?= h($ficheorders->destination) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source') ?></th>
            <td><?= h($ficheorders->source) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($ficheorders->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference') ?></th>
            <td><?= h($ficheorders->reference) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From') ?></th>
            <td><?= h($ficheorders->from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ficheorders->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($ficheorders->date) ?></td>
        </tr>
    </table>
</div>
