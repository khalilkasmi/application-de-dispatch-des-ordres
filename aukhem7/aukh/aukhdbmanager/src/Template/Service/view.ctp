<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->designation]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->designation], ['confirm' => __('Are you sure you want to delete # {0}?', $service->designation)]) ?> </li>
        <li><?= $this->Html->link(__('List Service'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="service view large-9 medium-8 columns content">
    <h3><?= h($service->designation) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= h($service->designation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Departement') ?></th>
            <td><?= h($service->departement) ?></td>
        </tr>
    </table>
</div>
