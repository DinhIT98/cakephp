<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('users');
        $this->setPrimaryKey('id');

    }
    public function validationDefault(Validator $validator)
    {
        return $validator
        ->notEmptyArray('name', 'A name is required')
        ->notEmptyArray('email', 'A email is required')
        ->notEmptyArray('address', 'A address is required');
        
    }
}
?>