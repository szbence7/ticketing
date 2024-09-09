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
            <?= $this->Html->link(__('List Ticket Priorities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ticketPriorities form content">
            <?= $this->Form->create($ticketPriority) ?>
            <fieldset>
                <legend><?= __('Add Ticket Priority') ?></legend>
                <?php
                    echo $this->Form->control('priority_name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
