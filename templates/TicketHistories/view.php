<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketHistory $ticketHistory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ticket History'), ['action' => 'edit', $ticketHistory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ticket History'), ['action' => 'delete', $ticketHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketHistory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ticket Histories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ticket History'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ticketHistories view content">
            <h3><?= h($ticketHistory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ticket') ?></th>
                    <td><?= $ticketHistory->hasValue('ticket') ? $this->Html->link($ticketHistory->ticket->subject, ['controller' => 'Tickets', 'action' => 'view', $ticketHistory->ticket->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $ticketHistory->hasValue('status') ? $this->Html->link($ticketHistory->status->status_name, ['controller' => 'Statuses', 'action' => 'view', $ticketHistory->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Changed By') ?></th>
                    <td><?= h($ticketHistory->changed_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ticketHistory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Changed At') ?></th>
                    <td><?= h($ticketHistory->changed_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
