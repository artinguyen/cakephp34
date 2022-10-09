<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class MessagesFixture extends TestFixture
{
      // Optional. Set this property to load fixtures to a different test datasource
      public $connection = 'test';
      public $import = ['table' => 'messages'];
      public $fields = [
          'id' => ['type' => 'integer'],
          'template_name' => ['type' => 'string', 'length' => 255, 'null' => true],
          'title' => ['type' => 'string', 'length' => 255, 'null' => true],
          'image' => ['type' => 'string', 'length' => 255, 'null' => true],
          'banner' => ['type' => 'string', 'length' => 255, 'null' => true],
          'type' => ['type' => 'integer'],
      ];
      public $records = [
          [
              'template_name' => 'Template 1',
              'title' => 'Title 1',
              'image' => 'https',
              'banner' => 'https',
              'type' => '1',
          ],
          [
              'template_name' => 'Template 2',
              'title' => 'Title 1',
              'image' => 'https',
              'banner' => 'https',
              'type' => '1',
          ],
          [
              'template_name' => 'Template 3',
              'title' => 'Title 1',
              'image' => 'https',
              'banner' => 'https',
              'type' => '1',
          ],
          // [
          //     'title' => 'Second Article',
          //     'body' => 'Second Article Body',
          //     'published' => '1',
          //     'created' => '2007-03-18 10:41:23',
          //     'modified' => '2007-03-18 10:43:31'
          // ],
          // [
          //     'title' => 'Third Article',
          //     'body' => 'Third Article Body',
          //     'published' => '1',
          //     'created' => '2007-03-18 10:43:23',
          //     'modified' => '2007-03-18 10:45:31'
          // ]
      ];
 }