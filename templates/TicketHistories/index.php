<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\TicketHistory> $ticketHistories
 */
?>
<div class="ticketHistories index content">
    <?= $this->Html->link(__('New Ticket History'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ticket Histories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ticket_id') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('changed_by') ?></th>
                    <th><?= $this->Paginator->sort('changed_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ticketHistories as $ticketHistory): ?>
                <tr>
                    <td><?= $this->Number->format($ticketHistory->id) ?></td>
                    <td><?= $ticketHistory->hasValue('ticket') ? $this->Html->link($ticketHistory->ticket->subject, ['controller' => 'Tickets', 'action' => 'view', $ticketHistory->ticket->id]) : '' ?></td>
                    <td><?= $ticketHistory->hasValue('status') ? $this->Html->link($ticketHistory->status->status_name, ['controller' => 'Statuses', 'action' => 'view', $ticketHistory->status->id]) : '' ?></td>
                    <td><?= h($ticketHistory->changed_by) ?></td>
                    <td><?= h($ticketHistory->changed_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ticketHistory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticketHistory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticketHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketHistory->id)]) ?>
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
