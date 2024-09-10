<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ticket> $tickets
 */
?>
<div class="tickets index content">
    <?= $this->Html->link(__('New Ticket'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tickets') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ticket_number', 'Ticket Number') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('subject') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('priority_id') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= __('Tags') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <td><?= h($ticket->ticket_number) ?></td>
                    <td><?= h($ticket->name) ?></td>
                    <td><?= h($ticket->subject) ?></td>
                    <td><?= $ticket->hasValue('category') ? $this->Html->link($ticket->category->name, ['controller' => 'Categories', 'action' => 'view', $ticket->category->id]) : '' ?></td>
                    <td><?= $ticket->hasValue('ticket_priority') ? $this->Html->link($ticket->ticket_priority->priority_name, ['controller' => 'TicketPriorities', 'action' => 'view', $ticket->ticket_priority->id]) : '' ?></td>
                    <td><?= $ticket->hasValue('status') ? $this->Html->link($ticket->status->status_name, ['controller' => 'Statuses', 'action' => 'view', $ticket->status->id]) : '' ?></td>
                    <td>
                        <?php
                        if (!empty($ticket->tags)) {
                            $tagNames = [];
                            foreach ($ticket->tags as $tag) {
                                $tagNames[] = h($tag->tag_name);
                            }
                            echo implode(', ', $tagNames);
                        } else {
                            echo 'No tags';
                        }
                        ?>
                    </td>
                    <td><?= h($ticket->created) ?></td>
                    <td><?= h($ticket->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ticket->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticket->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->ticket_number)]) ?>
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
