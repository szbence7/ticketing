<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\TicketPriority> $ticketPriorities
 */
?>
<div class="ticketPriorities index content">
    <?= $this->Html->link(__('New Ticket Priority'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ticket Priorities') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('priority_name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ticketPriorities as $ticketPriority): ?>
                <tr>
                    <td><?= $this->Number->format($ticketPriority->id) ?></td>
                    <td><?= h($ticketPriority->priority_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ticketPriority->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticketPriority->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticketPriority->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketPriority->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
