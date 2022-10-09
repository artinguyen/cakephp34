<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class MessagesTableTest extends TestCase
{
    public $fixtures = ['app.Messages'];

    public function setUp()
    {
        parent::setUp();
        $this->Messages = TableRegistry::get('Messages');
    }

    // public function testFindPublished()
    // {
    //     $query = $this->Messages->find('type');
    //     //$this->assertInstanceOf('Cake\ORM\Query', $query);
    //     $result = $query->enableHydration(false)->toArray();
    //     //dd($result);
    //     $expected = [
    //         ['id' => 1, 'name' => 'test']
    //         // ['id' => 2, 'title' => 'Second Article'],
    //         // ['id' => 3, 'title' => 'Third Article']
    //     ];

    //     $this->assertEquals($expected, $result);
    // }

    // public function testGetById()
    // {
    //     $query = $this->Messages->getMessageById(2);
    //     //$this->assertInstanceOf('Cake\ORM\Query', $query);
    //     $result = $query->enableHydration(false)->toArray();
    //     //dd($result);
    //     $expected = [
    //         ['id' => 2, 'name' => 'Test']
    //         // ['id' => 2, 'title' => 'Second Article'],
    //         // ['id' => 3, 'title' => 'Third Article']
    //     ];
    //     $this->assertEquals(1, count($result));
    //     $this->assertEquals($expected, $result);
    // }

    // public function testDelete()
    // {
    //     $query = $this->Messages->get(2);

    //     $query->deleted_at = '2007-03-18 10:39:23';
    //     //dd($query);
    //     $this->Messages->save($query);

    //     $query1 = $this->Messages->getMessageById(2);
    //     //dd($query1->deleted_at->format("Y-m-d H:i:s"));
    //     $this->assertEquals('2007-03-18 10:39:23', $query1->deleted_at->format("Y-m-d H:i:s"));
    //     //$result = $query->enableHydration(false)->toArray();
    // }

    public function testDelete()
    {
        $result = $this->Messages->deleteMessage(2);
        $table = TableRegistry::get('Messages')->find('all')
            ->where(['id' => 2])->first();
        //var_dump($table);die();


        $this->assertEquals(10, $table->type);
        //$this->assertResponseOk();
        //$this->assertTrue($result);
    }

}