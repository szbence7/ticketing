<?php
/**
 * @var \App\View\AppView $this
 */
$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to our Helpdesk</title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <main class="main">
        <div class="container">
            <div class="content">
                <h1>Welcome to our Helpdesk</h1>
                <p>We're here to assist you with any issues or questions you may have.</p>
                <?= $this->Html->link(
                    'Submit a New Ticket',
                    ['controller' => 'Tickets', 'action' => 'add'],
                    ['class' => 'button']
                ) ?>
            </div>
        </div>
    </main>
</body>
</html>
