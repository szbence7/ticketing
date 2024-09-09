<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Assignment'), ['action' => 'edit', $assignment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Assignment'), ['action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Assignments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Assignment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="assignments view content">
            <h3><?= h($assignment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ticket') ?></th>
                    <td><?= $assignment->hasValue('ticket') ? $this->Html->link($assignment->ticket->subject, ['controller' => 'Tickets', 'action' => 'view', $assignment->ticket->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigned By') ?></th>
                    <td><?= h($assignment->assigned_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigned To') ?></th>
                    <td><?= h($assignment->assigned_to) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($assignment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigned At') ?></th>
                    <td><?= h($assignment->assigned_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
