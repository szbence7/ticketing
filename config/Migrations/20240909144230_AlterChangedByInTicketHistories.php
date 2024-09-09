<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterChangedByInTicketHistories extends AbstractMigration
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
        $table->dropForeignKey('changed_by');
        $table->changeColumn('changed_by', 'integer', [
            'null' => true,
            'default' => null
        ]);
        $table->addForeignKey('changed_by', 'users', 'id', [
            'delete' => 'SET_NULL',
            'update' => 'NO_ACTION'
        ]);
        $table->update();
    }
}