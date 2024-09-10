<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddTicketNumberToTickets extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('tickets');
        $table->addColumn('ticket_number', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);
        $table->addIndex(['ticket_number'], ['unique' => true]);
        $table->update();
    }
}
