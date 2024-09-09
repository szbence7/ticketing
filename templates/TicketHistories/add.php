<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketHistory $ticketHistory
 * @var \Cake\Collection\CollectionInterface|string[] $tickets
 * @var \Cake\Collection\CollectionInterface|string[] $statuses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ticket Histories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ticketHistories form content">
            <?= $this->Form->create($ticketHistory) ?>
            <fieldset>
                <legend><?= __('Add Ticket History') ?></legend>
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
