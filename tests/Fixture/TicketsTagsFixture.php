<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TicketsTagsFixture
 */
class TicketsTagsFixture extends TestFixture
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
                'ticket_id' => 1,
                'tag_id' => 1,
            ],
        ];
        parent::init();
    }
}
