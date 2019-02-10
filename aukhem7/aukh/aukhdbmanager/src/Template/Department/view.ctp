<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Department'), ['action' => 'edit', $department->designation]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Department'), ['action' => 'delete', $department->designation], ['confirm' => __('Are you sure you want to delete # {0}?', $department->designation)]) ?> </li>
        <li><?= $this->Html->link(__('List Department'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="department view large-9 medium-8 columns content">
    <h3><?= h($department->designation) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= h($department->designation) ?></td>
        </tr>
    </table>
</div>
