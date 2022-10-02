<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;

class ConditionsTable extends Table
{
    public function initialize(array $config)
    {
        //$this->addBehavior('Sluggable');
        // $this->addBehavior('Sluggable', [
        //     'events' => [
        //         'Model.beforeSave' => [
        //             'created_at' => 'new',
        //             'updated_at' => 'always'
        //         ]
        //     ]
        // ]);
        //$this->addBehavior('Translate', ['fields' => ['name']]);
    }

    public function findType(Query $query, array $options)
    {
        $query->where([
            $this->alias() . '.type' => 1
        ])->select(['id', 'name']);
        return $query;
    }

    public function getMessageById($id)
    {
        return $this->find()->where([
            'id' => $id
        ])->select(['id', 'name','deleted_at'])->first();
        //return $query;
    }
}