<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\TicketsTag> $ticketsTags
 */
?>
<div class="ticketsTags index content">
    <?= $this->Html->link(__('New Tickets Tag'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tickets Tags') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ticket_id') ?></th>
                    <th><?= $this->Paginator->sort('tag_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ticketsTags as $ticketsTag): ?>
                <tr>
                    <td><?= $ticketsTag->hasValue('ticket') ? $this->Html->link($ticketsTag->ticket->subject, ['controller' => 'Tickets', 'action' => 'view', $ticketsTag->ticket->id]) : '' ?></td>
                    <td><?= $ticketsTag->hasValue('tag') ? $this->Html->link($ticketsTag->tag->tag_name, ['controller' => 'Tags', 'action' => 'view', $ticketsTag->tag->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ticketsTag->ticket_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticketsTag->ticket_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticketsTag->ticket_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketsTag->ticket_id)]) ?>
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
