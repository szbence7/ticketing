<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TicketHistoriesFixture
 */
class TicketHistoriesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'ticket_id' => 1,
                'status_id' => 1,
                'changed_by' => 'ba4d5a38-75ba-421b-87aa-a2e9cb96097e',
                'changed_at' => '2024-09-09 09:29:47',
            ],
        ];
        parent::init();
    }
}
