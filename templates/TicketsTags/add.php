<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketsTag $ticketsTag
 * @var \Cake\Collection\CollectionInterface|string[] $tickets
 * @var \Cake\Collection\CollectionInterface|string[] $tags
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Tickets Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ticketsTags form content">
            <?= $this->Form->create($ticketsTag) ?>
            <fieldset>
                <legend><?= __('Add Tickets Tag') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
