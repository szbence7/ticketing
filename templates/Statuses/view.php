<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="statuses view content">
            <h3><?= h($status->status_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Status Name') ?></th>
                    <td><?= h($status->status_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($status->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Ticket Histories') ?></h4>
                <?php if (!empty($status->ticket_histories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Ticket Id') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Changed By') ?></th>
                            <th><?= __('Changed At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($status->ticket_histories as $ticketHistory) : ?>
                        <tr>
                            <td><?= h($ticketHistory->id) ?></td>
                            <td><?= h($ticketHistory->ticket_id) ?></td>
                            <td><?= h($ticketHistory->status_id) ?></td>
                            <td><?= h($ticketHistory->changed_by) ?></td>
                            <td><?= h($ticketHistory->changed_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TicketHistories', 'action' => 'view', $ticketHistory->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TicketHistories', 'action' => 'edit', $ticketHistory->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TicketHistories', 'action' => 'delete', $ticketHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketHistory->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Tickets') ?></h4>
                <?php if (!empty($status->tickets)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Subject') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Priority Id') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($status->tickets as $ticket) : ?>
                        <tr>
                            <td><?= h($ticket->id) ?></td>
                            <td><?= h($ticket->user_id) ?></td>
                            <td><?= h($ticket->subject) ?></td>
                            <td><?= h($ticket->description) ?></td>
                            <td><?= h($ticket->category_id) ?></td>
                            <td><?= h($ticket->priority_id) ?></td>
                            <td><?= h($ticket->status_id) ?></td>
                            <td><?= h($ticket->created) ?></td>
                            <td><?= h($ticket->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tickets', 'action' => 'view', $ticket->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tickets', 'action' => 'edit', $ticket->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tickets', 'action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
