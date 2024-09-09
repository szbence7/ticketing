<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket $ticket
 * @var \App\Model\Entity\Assignment $assignment
 * @var array $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('View Ticket'), ['action' => 'view', $ticket->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tickets form content">
            <?= $this->Form->create($assignment) ?>
            <fieldset>
                <legend><?= __('Assign Ticket') ?></legend>
                <?php
                    echo $this->Form->control('assigned_to', [
                        'options' => $users,
                        'empty' => '(choose a user)',
                        'label' => 'Assign to User'
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Assign')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>