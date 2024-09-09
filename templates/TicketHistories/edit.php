<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketHistory $ticketHistory
 * @var string[]|\Cake\Collection\CollectionInterface $tickets
 * @var string[]|\Cake\Collection\CollectionInterface $statuses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ticketHistory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ticketHistory->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ticket Histories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ticketHistories form content">
            <?= $this->Form->create($ticketHistory) ?>
            <fieldset>
                <legend><?= __('Edit Ticket History') ?></legend>
                <?php
                    echo $this->Form->control('ticket_id', ['options' => $tickets]);
                    echo $this->Form->control('status_id', ['options' => $statuses]);
                    echo $this->Form->control('changed_by');
                    echo $this->Form->control('changed_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
