<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Assignment Entity
 *
 * @property int $id
 * @property int $ticket_id
 * @property string $assigned_by
 * @property string $assigned_to
 * @property \Cake\I18n\DateTime|null $assigned_at
 *
 * @property \App\Model\Entity\Ticket $ticket
 */
class Assignment extends Entity
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
        'assigned_by' => true,
        'assigned_to' => true,
        'assigned_at' => true,
        'ticket' => true,
    ];
}
