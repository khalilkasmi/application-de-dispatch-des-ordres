<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ficheordre'), ['action' => 'edit', $ficheordre->nordres]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ficheordre'), ['action' => 'delete', $ficheordre->nordres], ['confirm' => __('Are you sure you want to delete # {0}?', $ficheordre->nordres)]) ?> </li>
        <li><?= $this->Html->link(__('List Ficheordres'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ficheordre'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ficheordres view large-9 medium-8 columns content">
    <h3><?= h($ficheordre->nordres) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nordres') ?></th>
            <td><?= h($ficheordre->nordres) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desciption') ?></th>
            <td><?= h($ficheordre->desciption) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination') ?></th>
            <td><?= h($ficheordre->destination) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source') ?></th>
            <td><?= h($ficheordre->source) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Objet') ?></th>
            <td><?= h($ficheordre->objet) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference') ?></th>
            <td><?= h($ficheordre->reference) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($ficheordre->date) ?></td>
        </tr>
    </table>
</div>
