<?php
declare(strict_types=1);

namespace App\Model\Table;

use CakeDC\Users\Model\Table\UsersTable as CakeDCUsersTable;

class UsersTable extends CakeDCUsersTable
{
    protected $_accessible = [
        // ... other fields ...
        'last_login' => true,
    ];
}
