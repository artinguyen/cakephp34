<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;
use Cake\TestSuite\TestCase;

class MessagesControllerTest extends IntegrationTestCase
{
    //use IntegrationTestCase;

    public $fixtures = ['app.Articles', 'app.Messages'];

    public function testIndex()
    {
        $this->get('/messages');
        $this->assertResponseOk();
        // More asserts.
    }

    // public function testIndexQueryData()
    // {
    //     $this->get('/articles?page=1');

    //     $this->assertResponseOk();
    //     // More asserts.
    // }

    // public function testIndexShort()
    // {
    //     $this->get('/articles/index/short');

    //     $this->assertResponseOk();
    //     $this->assertResponseContains('Articles');
    //     // More asserts.
    // }

    public function testSaveMessage()
    {
        $data = [
              'template_name' => 'Template 6',
              'title' => 'Title 6',
              'image' => 'https',
              'banner' => 'https',
              'type' => '1',
        ];
        $this->get('/message/create', $data);

        $this->post('/message/create', $data);
        $this->assertResponseSuccess();
        $message = TableRegistry::get('Messages');
        $query = $message->find()->where(['title' => $data['title']]);
        $this->assertEquals(1, $query->count());
        // Test exception
        $data = [];
        $this->post('/message/create', $data);
        $this->assertResponseOk();
    }
    public function testDeleteMessage()
    {
        $this->get('/message/delete/1');
        $this->assertResponseOk();
        $result = $this->get('/message/delete/22');
        //var_dump($result);die();
        $this->assertResponseOk();
        // $table = TableRegistry::get('Messages')->find('all')
        //     ->where(['id' => 1])->first();
        // $this->assertEquals(10, $table->type);
        // $model = $this->getMockForModel('Messages', ['deleteMessage']);
        // $model->expects($this->once())
        // ->method('deleteMessage')
        // //->with(1)
        // ->will($this->returnValue(true));
        // $this->assertTrue($model->deleteMessage(1));
    }

    public function testGetList()
    {
        $this->get('/message/list');
        $this->assertResponseOk();
    }


}