<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;
use Cake\TestSuite\TestCase;

class ArticlesControllerTest extends IntegrationTestCase
{
    //use IntegrationTestCase;

    public $fixtures = ['app.Articles', 'app.Messages'];

    public function testIndex()
    {
        $this->get('/articles');

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

    // public function testIndexPostData()
    // {
    //     $data = [
    //         'user_id' => 1,
    //         'published' => 1,
    //         'slug' => 'new-article',
    //         'title' => 'New Article',
    //         'body' => 'New Body'
    //     ];
    //     $this->post('/articles', $data);

    //     $this->assertResponseSuccess();
    //     $articles = TableRegistry::get('Articles');
    //     $query = $articles->find()->where(['title' => $data['title']]);
    //     $this->assertEquals(1, $query->count());
    // }
    // public function testPostData()
    // {
    //     $data = [
    //         'user_id' => 1,
    //         'published' => 1,
    //         'slug' => 'new-article',
    //         'title' => 'New Article',
    //         'body' => 'New Body'
    //     ];
    //     $this->post('/articles', $data);

    //     $this->assertResponseSuccess();
    // }
}