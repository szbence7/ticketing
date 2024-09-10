<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="content" style="text-align: center;">
    <h1>Welcome to our Helpdesk</h1>
    <p>We're here to assist you with any issues or questions you may have.</p>
    <?= $this->Html->link(
        'Submit a New Ticket',
        ['controller' => 'Tickets', 'action' => 'add'],
        ['class' => 'button', 'style' => 'display: inline-block;']
    ) ?>
</div>
