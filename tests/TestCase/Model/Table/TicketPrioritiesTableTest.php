<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TicketPrioritiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TicketPrioritiesTable Test Case
 */
class TicketPrioritiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TicketPrioritiesTable
     */
    protected $TicketPriorities;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.TicketPriorities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TicketPriorities') ? [] : ['className' => TicketPrioritiesTable::class];
        $this->TicketPriorities = $this->getTableLocator()->get('TicketPriorities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TicketPriorities);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TicketPrioritiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
