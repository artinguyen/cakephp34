<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Routing\Router;
// Prior to 3.5 use I18n::locale()
use Cake\Http\ServerRequest;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use DaysOfWeek;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\View\Helper\PaginatorHelper;
use Cake\Http\Response;
use Cake\Http\Client;
use Zend\Diactoros\Stream;
class DashboardController extends AppController
{
    public $paginate = [
        'limit' => 1,
    // 'NotificationsTable' => [
    //     'scope' => 'notification',
    //     'limit' => 1,
    // ],
    // 'MessNotificationsTable' => [
    //     'scope' => 'mess_notification',
    //     'limit' => 1
    // ],
        'Mess' => [
            'scope' => 'mess_notif',
            'limit' => 1,
        ]
];
   //use PaginatorHelper;
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadModel('Articles');
        $this->loadModel('Messages');
        $this->loadModel('Conditions');
        $this->loadModel('Notifications');
        $this->loadComponent('Paginator');
        I18n::locale('en');
        
    }

    public function index()
    {
//         TransportFactory::setConfig('gmail', [
//     'host' => 'smtp.gmail.com',
//     'port' => 587,
//     'username' => 'nguyenthean.hg@gmail.com',
//     'password' => '@kGiang17021989gmail',
//     'className' => 'Smtp',
//     'tls' => true
// ]);
//         //dd('1');
        // $articles = TableRegistry::get('Articles')->find();
        // //$query = $articles->find();
        // foreach ($articles as $a) 
        // {
        //     //debug($article->title);
        //     echo $a->title;
        // }
        //$query = $this->Articles->find();
        //dd($query);
        //$articles = 5;
        // Send email
        /*
        $mail = ['nguyenthean.hg@gmail.com','nguyenthean.hg@gmail.com'];
        foreacH($mail as $obj) {
            $email = new Email('default');
            $email->from(['me@example.com' => 'My Site'])
                ->to($obj)
                ->subject('About')
                ->send('My message');
        }
        */
        //echo new Day(Day::MONDAY);
        //$a = gfg::dummy_string;
        //
        //die();
        // $email = new Email('default');
        //     $email->from(['me@example.com' => 'My Site'])
        //         ->to('nguyenthean.hg@gmail.com')
        //         ->subject('About')
        //         ->send('My message');
        
        $this->set(compact('articles'));
    }
    public function createMessage() {
        $article = $this->Messages->newEntity(['name' => 'test', 'image_link' => 'https']);
        $this->Messages->save($article);
    }
    public function getName($name) {
        $query = $this->Articles->find('all', [
    'conditions' => ['title LIKE' => '%'.$name.'%']
]);
                    $this->response->body(json_encode($query));

        return $this->response;
    }
    public function paging() {
        //echo $this->request->getParam('page');die();
        //echo $this->request->query('page');;die();
        //$query = $this->Articles->find('all');
        //echo json_encode($this->paginate($query));
        //die();
       $conditions = $this->Conditions->find('all');
        $query = $this->Articles->find('all');
        $query1 = $this->Messages->find('all');
        
        //$this->set('_serialize', array('posts', 'users'));
        //if($this->request->getParam('page')) {
            //$query = $this->Articles->find('all');
    //     return $response->withType('application/json')
    // ->withStringBody(json_encode($this->paginate($query)));

            //return json_encode($this->paginate($query));

        //}
        
        // Prior to 3.4
// $result = $this->Paginator->templates('number');

// // Change a template
// $this->Paginator->setTemplates([
//     'number' => '<em><a href="{{url}}">{{text}}</a></em>'
// ]);
        //$page = $this->paginate($query);
        //$this->Paginator->options(['model' => 'Articles']);
         //dd($page->getTotal());
        //$query = $this->Articles->find('all');
        // $userProfile = $this->Articles->find('all',
        //         array('joins' => array(
        //                                array('table' => 'messages',
        //                                      'alias' => 'p',
        //                                      'type' => 'inner',
        //                                      'foreignKey' => true,
        //                                      'conditions'=> array('articles.message_id = p.id')                                             
        //                                 )
        //                          ),
                 
        //         ));

//         $query = $this->Articles->find();
// $query->innerJoinWith('Messages', function ($q) {
//     return $q->where(['Messages.id' => 'Articles.message_id']);
// });

    //     $query = $this->Articles->find()
    // ->join([
    //     'c' => [
    //         'table' => 'messages',
    //         'type' => 'INNER',
    //         'conditions' => 'c.id = articles.message_id',
    //     ]
    // ]);

    //     $query = $this->Articles
    // ->find()
    // ->notMatching('Messages', function ($q) {
    //     return $q->where(['Messages.id' => 'Articles.message_id']);
    // });
    //     dd( $this->paginate($query) );
    //     $query = $this->Notifications->find()
    // ->join([
    //     'c' => [
    //         'table' => 'messages',
    //         'type' => 'INNER',
    //         'conditions' => 'c.id = notification.message_id',
    //     ]
    // ]);
    $notif_message = $this->Notifications->find('all')->contain(['Messages']);
   // Register an additional table object to allow differentiating in pagination component
    TableRegistry::config('Mess', [
        'className' => 'App\Model\Table\NotificationsTable',
        'table' => 'notifications',
        //'entityClass' => 'App\Model\Entity\Notification',
    ]);
    if($this->request->query('user')) {
            //echo json_encode($this->paginate($query));
            //die();
            // $this->response = $this->response->withStringBody($this->paginate($query));
            // $this->response = $this->response->withType('json');
            // return $this->response;
            //$this->response->body(json_encode($this->paginate($query)));
           // return $this->response;
            //$this->set('_serialize', ['articles', 'comments']);
        }
        if($this->request->query('name')) {

           //dd('1');

            $name = $this->request->query('name');
            //         $query = $this->Articles->find('all', [
            // 'conditions' => ['title LIKE' => '%'.$name.'%']
            $mess  = TableRegistry::get('Mess')->find('all', [
                'scope' => 'mess',
                'conditions' => ['name LIKE' => '%'.$name.'%']
            ])->contain(['Messages']);
            $mess->select(['message_id', 'total' => $mess->func()->count('Mess.message_id')])
            ->group(['Mess.message_id']);

            //]);
        
        //dd($this->paginate($query));
        $this->response->body(json_encode($this->paginate($mess)));

        return $this->response;

        }

    
   
    $users  = $this->Notifications->find();
    $users->select(['user_id', 'total' => $users->func()->count('Notifications.user_id')])
    ->group(['Notifications.user_id']);
    //->enableAutoFields(true); // Prior to 3.4.0 use autoFields(true);

    $mess  = TableRegistry::get('Mess')->find('all', [
        'scope' => 'mess'
    ]);
    $mess->select(['message_id', 'total' => $mess->func()->count('Mess.message_id')])
    ->group(['Mess.message_id']);

    // $this->paginate(
    // $query = TableRegistry::getTableLocator()->get('Mess')->find()->where(['published' => false])
    // );

    //dd($this->paginate($users));

    // foreach($query as $key => $val) {
    //     dd($val);
    // }

        $conditions1 = [];
        $conditions2 = [];
        $conditions3 = [];
        foreach($conditions as $key => $val) {
            if(empty($val->parent_id)) {
                $conditions1[] = $val;
            } else {

                //dd('1');
                // if(!empty($val->parent_id) && count(explode(','. $val->parent_id)) > 1 ) {
                //     $condition2[] = explode(','. $val->parent_id);
                //     $condition3[] = explode(','. $val->parent_id);
                // } else {
                    $conditions2[] = $val;
                    //$condition3[]  = $val;
               // }
            }
            // if( count(explode(',',$val->parent_id))  == 1 ) {
            //     $conditions2[] = $val;
            // }
            // if( count(explode(',', $val->parent_id)) == 2 ) {
            //     $condition3[] = $val;
            // }
        }
        //dd($conditions2);
        $this->set(['articles' => $this->paginate($query),
         'articles1' => $this->paginate($query1),
         'conditions1' => $conditions1,
         'conditions2' => $conditions2,
         'users' => $this->paginate($users),
         'mess' => $this->paginate($mess),
         //'conditions3' => $conditions3

     ]);
    }
    public function getPaging() {
        $query = $this->Articles->find('all');
        return $response->withType('application/json')
    ->withStringBody(json_encode($this->paginate($query)));
    }
    public function form()
    {
        $articles = 5;
        
        $this->set(compact('articles'));
    }

    public function view($slug)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.
            $article->user_id = 1;

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('article', $article);
    }
    public function change() {
        //dd($id);
        //$lang = $this->request->getData("lang"); 
       //$test = $this->request->getParam('lang');
       //dd($lang);
       //I18n::locale($lang);
       //$this->redirect($this->referer());
    }

    public function edit() 
    {
        $p1 = $this->request->getParam('lang');
        //echo Router::url(['controller' => 'Articles', 'action' => 'view', 'id' => 15]);
        dd($p1);
    }

    public function save() 
    {
        $this->Articles->newEntity();
    }

    public function create() 
    {
        $article = $this->Articles->newEntity($this->request->getData());
        $this->Articles->save($article);
    }

    public function delete($id) 
    {
        //die($id);
       // $article =  $this->Articles->get($id); // Return article with id 12

//$article->unset('updated_at');
// $article->set('deleted_at',date('Y-m-d H:i:s'));
// $this->Articles->save($article);
        $query = $this->Articles->query();
        $query->update()->set(['deleted_at' => date('Y-m-d H:i:s')])->where(['id' => $id])->execute();

die("Right");
        //$entity->unset($fieldName);
    }

    public function uploadCsv(){
         if ($this->request->is('post')) {
            $fileInfo = $this->request->getData('file');
            $fileName = $fileInfo['name'];
            $fileSize = $fileInfo['size'];
            $file = new File($fileName, false, 0644);
            $fileType = $file->ext();
            // Check valid file
            $allowedTypes = ['csv'];
            if ($fileSize === 0) {
               die("The file is empty.");
            }
            if ($fileSize > 3145728) { // 3 MB (1 byte * 1024 * 1024 * 3 (for 3 MB))
               die("The file is too large");
            }
            if(!in_array($filetype, array_keys($allowedTypes))) {
                die("File not allowed.");
            }
            $file = new File($fileInfo['tmp_name'], false, 0644);
            // Read file
            $contents = $file->read();
            $arr = preg_split('/\r\n|\r|\n/',$contents);
            dd($arr[0]);
        } // Post
    }

    public function getMonitor() 
    {
        //dd(APP);
        //$dir = new Folder(TMP. 'mockup2',true, 0755);
    $file = new File(TMP.'mockup'.DS.'monitor.json', false, 0644);
    $contents = $file->read();
    //$response = $response->withStringBody('My Body');


 $this->response->body($contents);

        return $this->response;

    dd($contents);
      // $file->delete();
      // $dir = new Folder('/tmp', true, 0755);
        //$file = $dir->find('monitor.js');
        //foreach ($files as $file) {
    //$file = new File($dir->pwd() . DS . $file);
//$files = $dir->find('.*\.php');

// foreach ($files as $file) {
//     $file = new File($dir->pwd() . DIRECTORY_SEPARATOR . $file);
//     $contents = $file->read();
//     // $file->write('I am overwriting the contents of this file');
//     // $file->append('I am adding to the bottom of this file.');
//     // $file->delete(); // I am deleting this file
//     $file->close(); // Be sure to close the file when you're done
//     dd($contents);
// }
    // return $response->withType('application/json')
    // ->withStringBody(json_encode($contents));
    // die();

    //     $response = $response->withType('application/json')
    // ->withStringBody(json_encode(['Foo' => 'bar']));
    }

    public function saveMonitor() {
        // Download 
    // $file = $this->Attachments->getFile(TMP.'mockup'.DS.'monitor.json');
// header('Content-type: text/plain');
// header('Content-disposition: attachment; filename="test.txt"');
        //$file_path = WWW_ROOT.'test'.DS.'test.php';
        //$response = $this->response->withFile($file_path);

        //header('Content-type: text/plain');                             

        
        //return $response;
        $file = new File(WWW_ROOT.'test'.DS.'test.php', true, 0644);
    $contents = $file->read();
    $file->write('I am overwriting the contents of this file');
    // $file->append('I am adding to the bottom of this file.');
    // $file->delete(); // I am deleting this file
    $file->close(); // Be sure to close the file when you're done
    $file_path = WWW_ROOT.'test'.DS.'test.php';
    $response = $this->response->withFile($file_path);
    return $response;
        die();
        // $api = 'https://api.publicapis.org/entries';
        $http = new Client();
        // $response = $http->get($api,[], [
        //     'ssl_verify_peer' => false,
        //     'ssl_verify_peer_name' => false
        // ]);
        // dd($response->body());
        //return $this->getMonitor();

        $response = $http->get('http://192.168.5.102:9999/getMonitor');
        //$json = $response->getJson();
        dd($response->body());
    }

}