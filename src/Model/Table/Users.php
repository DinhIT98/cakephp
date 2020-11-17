<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class Users extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('users');
        $this->setPrimaryKey('id');

    }
}
?>