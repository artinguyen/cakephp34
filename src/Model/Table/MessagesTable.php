<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
class MessagesTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('template_name', 'Please fill this field');
        $validator
            ->notEmpty('title', 'Please fill this field');
        return $validator;
    }

    public function initialize(array $config)
    {

    }

    public function deleteMessage($id) {
        //die($id);
        $table = TableRegistry::get('Messages');
        $message= $this->get($id);
        //die($message);
        $message->type = 10;
        return $table->save($message);
    }

    public function getAll() 
    {
        return $this->find('all');
    }
}