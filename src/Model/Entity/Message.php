<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
//use Model\Entity\SoftDeleteTrait;

class Message extends Entity
{
    protected $_accessible = [
        // 'template_name' => true,
        // 'title' => true,
        '*' => true,
    ];
}
