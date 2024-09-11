<div class="users form">
    <?= $this->Flash->render() ?>
    <h3><?= __d('cake_d_c/users', 'Two-factor authentication') ?></h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __d('cake_d_c/users', 'Enter verification code') ?></legend>
        <?= $this->Form->control('code', ['required' => true, 'label' => __d('cake_d_c/users', 'Verification Code')]) ?>
    </fieldset>
    <?= $this->Form->button(__d('cake_d_c/users', 'Verify')); ?>
    <?= $this->Form->end() ?>
</div>
