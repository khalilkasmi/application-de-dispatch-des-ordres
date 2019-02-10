<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ficheordrea'), ['action' => 'edit', $ficheordrea->n_order_a]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ficheordrea'), ['action' => 'delete', $ficheordrea->n_order_a], ['confirm' => __('Are you sure you want to delete # {0}?', $ficheordrea->n_order_a)]) ?> </li>
        <li><?= $this->Html->link(__('List Ficheordrea'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ficheordrea'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ficheordrea view large-9 medium-8 columns content">
    <h3><?= h($ficheordrea->n_order_a) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('N Order A') ?></th>
            <td><?= h($ficheordrea->n_order_a) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference') ?></th>
            <td><?= h($ficheordrea->reference) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Organisme') ?></th>
            <td><?= h($ficheordrea->organisme) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Objet') ?></th>
            <td><?= h($ficheordrea->objet) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination') ?></th>
            <td><?= h($ficheordrea->destination) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($ficheordrea->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Instruction') ?></th>
            <td><?= h($ficheordrea->instruction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($ficheordrea->date) ?></td>
        </tr>
    </table>
</div>
