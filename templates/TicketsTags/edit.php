<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketsTag $ticketsTag
 * @var string[]|\Cake\Collection\CollectionInterface $tickets
 * @var string[]|\Cake\Collection\CollectionInterface $tags
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ticketsTag->ticket_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ticketsTag->ticket_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tickets Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ticketsTags form content">
            <?= $this->Form->create($ticketsTag) ?>
            <fieldset>
                <legend><?= __('Edit Tickets Tag') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
