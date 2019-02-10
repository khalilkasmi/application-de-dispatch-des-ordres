<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->reference]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->reference], ['confirm' => __('Are you sure you want to delete # {0}?', $order->reference)]) ?> </li>
        <li><?= $this->Html->link(__('List Order'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="order view large-9 medium-8 columns content">
    <h3><?= h($order->reference) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Objet') ?></th>
            <td><?= h($order->objet) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference') ?></th>
            <td><?= h($order->reference) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source') ?></th>
            <td><?= h($order->source) ?></td>
        </tr>
    </table>
</div>
