<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class UpdateUsersTable extends AbstractMigration
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
        $table = $this->table('users');
        
        // Only add columns if they don't exist
        if (!$table->hasColumn('username')) {
            $table->addColumn('username', 'string', [
                'limit' => 255,
                'null' => false,
            ]);
        }
        if (!$table->hasColumn('email')) {
            $table->addColumn('email', 'string', [
                'limit' => 255,
                'null' => false,
            ]);
        }
        if (!$table->hasColumn('password')) {
            $table->addColumn('password', 'string', [
                'limit' => 255,
                'null' => false,
            ]);
        }
        if (!$table->hasColumn('first_name')) {
            $table->addColumn('first_name', 'string', [
                'limit' => 50,
                'null' => true,
            ]);
        }
        if (!$table->hasColumn('last_name')) {
            $table->addColumn('last_name', 'string', [
                'limit' => 50,
                'null' => true,
            ]);
        }
        if (!$table->hasColumn('token')) {
            $table->addColumn('token', 'string', [
                'limit' => 255,
                'null' => true,
            ]);
        }
        if (!$table->hasColumn('token_expires')) {
            $table->addColumn('token_expires', 'datetime', [
                'null' => true,
            ]);
        }
        if (!$table->hasColumn('api_token')) {
            $table->addColumn('api_token', 'string', [
                'limit' => 255,
                'null' => true,
            ]);
        }
        if (!$table->hasColumn('activation_date')) {
            $table->addColumn('activation_date', 'datetime', [
                'null' => true,
            ]);
        }
        if (!$table->hasColumn('tos_date')) {
            $table->addColumn('tos_date', 'datetime', [
                'null' => true,
            ]);
        }
        if (!$table->hasColumn('active')) {
            $table->addColumn('active', 'boolean', [
                'default' => false,
                'null' => false,
            ]);
        }
        if (!$table->hasColumn('is_superuser')) {
            $table->addColumn('is_superuser', 'boolean', [
                'default' => false,
                'null' => false,
            ]);
        }
        if (!$table->hasColumn('role')) {
            $table->addColumn('role', 'string', [
                'default' => 'user',
                'limit' => 255,
                'null' => true,
            ]);
        }
        if (!$table->hasColumn('created')) {
            $table->addColumn('created', 'datetime', [
                'null' => true,
            ]);
        }
        if (!$table->hasColumn('modified')) {
            $table->addColumn('modified', 'datetime', [
                'null' => true,
            ]);
        }

        // Add unique index if it doesn't exist
        if (!$table->hasIndex(['username', 'email'])) {
            $table->addIndex(['username', 'email'], ['unique' => true]);
        }

        $table->update();
    }
}
