<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AssignmentsFixture
 */
class AssignmentsFixture extends TestFixture
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
                'assigned_by' => 'f3cefdb8-d060-4c8d-b014-c00362e8d397',
                'assigned_to' => '22f3cb9a-6874-4ce5-b3ff-c797a11522b0',
                'assigned_at' => '2024-09-09 09:29:08',
            ],
        ];
        parent::init();
    }
}
