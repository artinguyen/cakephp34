<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
// Prior to 3.5 use I18n::locale()
use Cake\Http\ServerRequest;
use Cake\Datasource\ConnectionManager;
use Aws\Sns\SnsClient; 
use Aws\Exception\AwsException;

class ReportsController extends AppController
{
    public $paginate = [
        'limit' => 1,
        'Mess' => [
            'scope' => 'mess_notif',
            'limit' => 1,
        ]
    ];
    public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadComponent('RequestHandler');
        $this->loadModel('Articles');
        $this->loadModel('Messages');
        $this->loadModel('Conditions');
        $this->loadModel('Notifications');
    }

    public function multi() {
       // var_dump($this->request->getParam('action'));
        //var_dump($this->request->getParam('lang'));
        //die();
        

        

        // Configuration parameters
// $config = [
//     'region'  => 'us-east-1',
//     'version' => 'latest',
//         'credentials' => [
//         'key'    => 'AKIA3ONQNVM5XW5G5NRA',
//         'secret' => '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',
//     ],
// ];

// // SDK object 
// $sdk = new Aws\Sdk($config);
$topicname = 'myTopic1';


$SnSclient = new SnsClient([
    'region' => 'us-east-1',
    'version' => '2010-03-31',
    'version' => 'latest',
        'credentials' => [
        'key'    => 'AKIA3ONQNVM5XW5G5NRA',
        'secret' => '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',
    ],
]);


try {
    // $result = $SnSclient->createTopic([
    //     'Name' => $topicname,
    // ]);
    // var_dump($result);die();
    // $result = $client->createPlatformEndpoint([
    // 'PlatformApplicationArn' => 'arn:aws:sns:us-east-1:786885880635:endpoint/GCM/web_push/e8ea63b7-8466-39cd-be5c-3669d28d898b', // REQUIRED
    // 'Token' => 'c09r6n_XXHeDVrW-HRYrfK:APA91bH8aKpZpVpng4UHrh6JpN9Hdelsj6n4Ha1Rbr1J1JakvjR9-2mHGvEs8mEQlLdHcF7FnhTCCLxeKgennkWdMwHcfCDsGU_mfhjtNq9FOXXPyACmaBzjyKqpfgT1hrCKJ0e_cfno', // REQUIRED
    // ]);

    //$result = $client->listPlatformApplications();
    $result = $client->createPlatformApplication([
    'Attributes' => ['<string>']
    'Name' => 'Mobile Push', // REQUIRED
    'Platform' => 'GMC', // REQUIRED
    ]);
    var_dump($result);die();

} catch (AwsException $e) {
    // output error message if fails
    error_log($e->getMessage());
} 



    }
    public function index()
    {
        var_dump($this->request->getParam('action'));
        //var_dump($this->request->getParam('lang'));
        die();
        TableRegistry::config('Mess', [
            'className' => 'App\Model\Table\NotificationsTable',
            'table' => 'notifications',
            //'entityClass' => 'App\Model\Entity\Notification',
        ]);
        $users  = $this->Notifications->find();
        $users->select(['user_id', 'total' => $users->func()->count('Notifications.user_id')])
            ->group(['Notifications.user_id']);

        if($this->request->query('name')) {
            $name = $this->request->query('name');
            $mess  = TableRegistry::get('Mess')->find('all', [
                'scope' => 'mess',
                'conditions' => ['name LIKE' => '%'.$name.'%']
            ])->contain(['Messages']);
            $mess->select(['Messages.name', 'total' => $mess->func()->count('Mess.message_id')])
            ->group(['Mess.message_id']);

            // $this->response->body(json_encode(['data' => ($this->paginate($mess)), 'paginate' => $this->paginate, 'count' => $mess->count()]));

            //dd($this->paginate);
            //echo $mess->count();die();
            //return $this->response;
            // $this->set([
            // 'users' => $this->paginate($users),
            // 'mess' => $this->paginate($mess),
            // ]);
            // $this->render('index');
        } else {
            $mess  = TableRegistry::get('Mess')->find('all', [
            'scope' => 'mess'
            ])->contain(['Messages']);

            $mess->select(['Messages.name', 'total' => $mess->func()->count('Mess.message_id')])
            ->group(['Mess.message_id']);
        }





        $this->set([
            'users' => $this->paginate($users),
            'mess' => $this->paginate($mess),
        ]);

        if ($this->request->is('ajax')) {
            $this->render('/element/ajaxreturn');
        }







        
        
        //dd($this->paginate($mess));
        //$notif_message = $this->Notifications->find('all')->contain(['Messages']);


       
    }

    public function showMessageForm()
    {
//articlesTable = $this->Message->get('Messages');
// $this->Messages->newEntity();
// $article->name = 'A New Article';
// $article->banner_image = 'This is the body of the article';
// $this->Messages->save($article);
       $this->render('message');
        // $article = $this->Messages->newEntity(['name' => 'test', 'banner_image' => '', 'banner_click' => '']);
        // $this->Messages->save($article);
    }
    public function saveMessage() {
        //dd('1');
        if ($this->request->is('post')) {
// $articleTbl = $this->Messages->newEntity();
// $article->name = 'A New Article';
// $article->banner_image = 'This is the body of the article';
// $articleTbl->save($article);
            //$article = $this->Articles->patchEntity($article, $this->request->getData());
            // $article = $this->Messages->newEntity($this->request->getData());
            // dd('1');
           
            $article = $this->Messages->newEntity(['name' => 'test', 'banner_image' => '', 'banner_click' => '']);
             if ($article->errors()) {
//                 $article->setErrors([
//     'password' => 'Password is required',
//     'username' => 'Username is required'
// ]);

                //$errors[] = $article->getError('banner_image');
                $this->response->body(json_encode($article->getError('banner_image')['_empty']));
                return $this->response;
            }
        }
    }

    public function getMonitorList() {
        function hash256($input) {
    $hash = hash("sha256", utf8_encode($input));
    $output = "";
    foreach(str_split($hash, 2) as $key => $value) {
        if (strpos($value, "0") === 0) {
            $output .= str_replace("0", "", $value);
        } else {
            $output .= $value;
        }
    }
    return $output;
}


        //echo $this->request->method();
        //dd( $this->request->data);
        //echo $this->request->getData('monitor_id');
        //die($this->request->input('json_decode', true));
        if($this->request->is('get')){
            $monitor_id = $this->request->getData('monitor_id');
            $token = $this->request->getData('token');
        //response if post data or form data was not passed
        $response = array('status'=>'failed', 'message'=>'Please provide form data');
    }
     $this->set([
            'recipes' => $response,
            '_serialize' => ['recipes']
        ]);
     
        
            // $this->response->type('application/json');
            // $this->response->body(json_encode($response));
            // return $this->response;
    }
}