<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AllowNullChangedByInTicketHistories extends AbstractMigration
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
        $table = $this->table('ticket_histories');
        $table->changeColumn('changed_by', 'integer', [
            'null' => true,
            'default' => null
        ]);
        $table->update();
    }
}
