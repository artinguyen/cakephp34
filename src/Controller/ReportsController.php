<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
// Prior to 3.5 use I18n::locale()
use Cake\Http\ServerRequest;
use Cake\Datasource\ConnectionManager;
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
        
        $this->loadModel('Articles');
        $this->loadModel('Messages');
        $this->loadModel('Conditions');
        $this->loadModel('Notifications');
    }

    public function index()
    {
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

    public function valid_form()
    {

    }

}