<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Utility\Text;
class SluggableBehavior extends Behavior
{
	 public function beforeSave(Event $event, EntityInterface $entity)
    {
        if ($entity->isNew()) {
    //echo 'This article was saved already!';
        	$entity->set('created_at',date('Y-m-d H:i:s'));
		} else {
			$entity->set('updated_at',date('Y-m-d H:i:s'));
		}
    }
}