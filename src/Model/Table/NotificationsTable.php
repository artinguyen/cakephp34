<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;

class NotificationsTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Messages');
        //->setForeignKey('messages_id')
            //->setJoinType('INNER');
    }
}