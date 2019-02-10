<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ficheorders'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ficheorderss index large-9 medium-8 columns content">
    <h3><?= __('Ficheorderss') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('numordersort') ?></th>
                <th scope="col"><?= $this->Paginator->sort('objet') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destination') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference') ?></th>
                <th scope="col"><?= $this->Paginator->sort('from') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ficheorderss as $ficheorders): ?>
            <tr>
                <td><?= h($ficheorders->numordersort) ?></td>
                <td><?= h($ficheorders->objet) ?></td>
                <td><?= h($ficheorders->destination) ?></td>
                <td><?= h($ficheorders->source) ?></td>
                <td><?= h($ficheorders->date) ?></td>
                <td><?= h($ficheorders->description) ?></td>
                <td><?= h($ficheorders->reference) ?></td>
                <td><?= h($ficheorders->from) ?></td>
                <td><?= $this->Number->format($ficheorders->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ficheorders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ficheorders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ficheorders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ficheorders->id)]) ?>
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
