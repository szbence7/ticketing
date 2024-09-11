<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
    <?= $this->Html->css('admin-dashboard'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Ben's</span>Ticketing System</a>
        </div>
        <div class="top-nav-links">
            <?php
            $session = $this->request->getSession();
            $identity = $this->request->getAttribute('identity');
            $user = null;

            if ($identity) {
                $user = $identity;
            } elseif ($session->check('Auth.User')) {
                $user = $session->read('Auth.User');
            } elseif ($session->check('Auth')) {
                $user = $session->read('Auth');
            }
            ?>

            <?php if ($user): ?>
                <span><?= $this->User->welcome()?></span>
                <?= $this->Html->link(__('Admin Dashboard'), ['controller' => 'AdminDashboard', 'action' => 'index'], ['class' => 'button']) ?>
                <?= $this->Html->link('Logout', ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'logout'], ['class' => 'button']) ?>
            <?php else: ?>
                <?= $this->Html->link('Login', ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'login'], ['class' => 'button']) ?>
            <?php endif; ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#tags-ids').select2();
    });
    </script>
</body>
</html>
