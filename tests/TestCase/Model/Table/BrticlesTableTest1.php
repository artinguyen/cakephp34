<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class ArticlesTable1Test extends TestCase
{
    public $fixtures = ['app.Articles'];

    public function setUp()
    {
        parent::setUp();
        $this->Articles = TableRegistry::get('Articles');
    }

    // public function testFindPublished()
    // {
    //     $query = $this->Articles->find('published');
    //     $this->assertInstanceOf('Cake\ORM\Query', $query);
    //     $result = $query->enableHydration(false)->toArray();
    //     $expected = [
    //         ['id' => 1, 'title' => 'First Article'],
    //         ['id' => 2, 'title' => 'Second Article'],
    //         ['id' => 3, 'title' => 'Third Article']
    //     ];

    //     $this->assertEquals($expected, $result);
    // }
}