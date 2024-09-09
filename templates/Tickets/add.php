<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket $ticket
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $ticketPriorities
 * @var \Cake\Collection\CollectionInterface|string[] $statuses
 * @var \Cake\Collection\CollectionInterface|string[] $tags
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Tickets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tickets form content">
            <?= $this->Form->create($ticket) ?>
            <fieldset>
                <legend><?= __('Add Ticket') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('subject');
                    echo $this->Form->control('description');
                    echo $this->Form->control('category_id', ['options' => $categories]);
                    echo $this->Form->control('priority_id', ['options' => $ticketPriorities]);
                    echo $this->Form->control('status_id', ['options' => $statuses]);
                    echo $this->Form->control('tags._ids', ['options' => $tags]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
