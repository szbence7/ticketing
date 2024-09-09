<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketPriority $ticketPriority
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ticket Priority'), ['action' => 'edit', $ticketPriority->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ticket Priority'), ['action' => 'delete', $ticketPriority->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketPriority->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ticket Priorities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ticket Priority'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ticketPriorities view content">
            <h3><?= h($ticketPriority->priority_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Priority Name') ?></th>
                    <td><?= h($ticketPriority->priority_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ticketPriority->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
