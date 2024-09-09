<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketsTag $ticketsTag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tickets Tag'), ['action' => 'edit', $ticketsTag->ticket_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tickets Tag'), ['action' => 'delete', $ticketsTag->ticket_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketsTag->ticket_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tickets Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tickets Tag'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ticketsTags view content">
            <h3><?= h($ticketsTag->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ticket') ?></th>
                    <td><?= $ticketsTag->hasValue('ticket') ? $this->Html->link($ticketsTag->ticket->subject, ['controller' => 'Tickets', 'action' => 'view', $ticketsTag->ticket->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Tag') ?></th>
                    <td><?= $ticketsTag->hasValue('tag') ? $this->Html->link($ticketsTag->tag->tag_name, ['controller' => 'Tags', 'action' => 'view', $ticketsTag->tag->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
