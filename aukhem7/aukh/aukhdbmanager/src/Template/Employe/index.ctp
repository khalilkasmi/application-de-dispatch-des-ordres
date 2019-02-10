<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employe index large-9 medium-8 columns content">
    <h3><?= __('Employe') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('fullname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employe as $employe): ?>
            <tr>
                <td><?= h($employe->fullname) ?></td>
                <td><?= h($employe->login) ?></td>
                <td><?= h($employe->password) ?></td>
                <td><?= h($employe->role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employe->fullname]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employe->fullname]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employe->fullname], ['confirm' => __('Are you sure you want to delete # {0}?', $employe->fullname)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
