<?php
/**
 * @var \App\View\AppView $this
 * @var int $totalTickets
 * @var int $openTickets
 * @var int $closedTickets
 */
?>
<div class="row">
    <div class="column-25">
        <div class="sidebar">
            <h3><?= __('Admin Dashboard') ?></h3>
            <ul class="side-nav">
                <li class="heading"><?= __('User Management') ?></li>
                <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Add User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                
                <li class="heading"><?= __('Ticket Management') ?></li>
                <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Add Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
                
                <li class="heading"><?= __('Tag Management') ?></li>
                <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Add Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
                
                <li class="heading"><?= __('Assignment Management') ?></li>
                <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Add Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
            </ul>
        </div>
    </div>
    <div class="column-75">
        <div class="content">
            <h2><?= __('Welcome to the Admin Dashboard') ?></h2>
            
            
            <div class="dashboard-stats">
                <h3><?= __('Ticket Statistics') ?></h3>
                <ul>
                    <li><?= __('Total Tickets: {0}', $totalTickets ?? 'N/A') ?></li>
                    <li><?= __('Open Tickets: {0}', $openTickets ?? 'N/A') ?></li>
                    <li><?= __('Closed Tickets: {0}', $closedTickets ?? 'N/A') ?></li>
                </ul>
            </div>
            <p><?= __('Select an option from the sidebar to manage your application.') ?></p>
        </div>
    </div>
</div>
