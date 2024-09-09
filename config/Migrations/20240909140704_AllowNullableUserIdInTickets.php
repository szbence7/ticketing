<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AllowNullableUserIdInTickets extends AbstractMigration
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
        $table->changeColumn('user_id', 'uuid', [
            'null' => true,
        ]);
        $table->update();
    }
}
