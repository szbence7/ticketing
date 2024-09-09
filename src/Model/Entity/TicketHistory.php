<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TicketHistory Entity
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $status_id
 * @property string $changed_by
 * @property \Cake\I18n\DateTime|null $changed_at
 *
 * @property \App\Model\Entity\Ticket $ticket
 * @property \App\Model\Entity\Status $status
 */
class TicketHistory extends Entity
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
        'ticket_id' => true,
        'status_id' => true,
        'changed_by' => true,
        'changed_at' => true,
        'ticket' => true,
        'status' => true,
    ];
}
