<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $id
 * @property string $user_id
 * @property string $subject
 * @property string $description
 * @property int $category_id
 * @property int $priority_id
 * @property int $status_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\TicketPriority $ticket_priority
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Assignment[] $assignments
 * @property \App\Model\Entity\TicketHistory[] $ticket_histories
 * @property \App\Model\Entity\Tag[] $tags
 */
class Ticket extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'email' => true,
        'user_id' => true,
        'subject' => true,
        'description' => true,
        'category_id' => true,
        'priority_id' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'category' => true,
        'ticket_priority' => true,
        'status' => true,
        'assignments' => true,
        'ticket_histories' => true,
        'tags' => true,
        'ticket_number' => true,
    ];
}
