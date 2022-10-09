<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
// Prior to 3.5 use I18n::locale()
use Cake\Http\ServerRequest;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Exception\Exception;
class MessagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadModel('Messages');
    }

    public $helpers = ['Form', 'Html'];

    public function index()
    {
        $result = $this->Messages->find('all');
        $this->set([
            'title' => 'Articles',
            'messages' =>  $result
        ]);
    }
    public function saveMessage()
    {
        if ($this->request->is('post')) {
            // $params = array();
            // parse_str($this->request->getData('el'), $params);
            
            // $message->template_name = $params['template'];
            // $message->title = $params['title'];
            // $message->image = $params['image'];
            //$message->type = 'alo';
            try{
                //if ($this->Messages->save($message)) {
                $message = $this->Messages->newEntity($this->request->getData());
                $result = $this->Messages->save($message);
                if(!$result) {
                    throw new Exception("One of the number is out of range [1-10].");
                }
                $response = array('status'=>'success', 'message'=>'Please provide form data');
                $this->response->type('application/json');
                $this->response->body(json_encode($response));
                return $this->response;
                //}
            } catch (Exception $e) {
                $response = array('status'=>'exception', 'message'=>'Please provide form data');
                $this->response->type('application/json');
                $this->response->body(json_encode($response));
                return $this->response;
            }
        }
        $response = array('status'=>'failed', 'message'=>'Please provide form data');
        $this->response->type('application/json');
        $this->response->body(json_encode($response));
        return $this->response;
    }

    public function deleteMessage($id) 
    {
            
        try{
            $this->Messages->deleteMessage($id); 
            $response = array('status'=>'success', 'message'=>'Please provide form data');
            $this->response->type('application/json');
            $this->response->body(json_encode($response));
            return $this->response;
        } catch (\Exception $e) {
            $response = array('status'=>'false', 'message'=>'Please provide form data');
            $this->response->type('application/json');
            $this->response->body(json_encode($response));
            return $this->response;
        }
        
    }

    public function getListMessage() {
        //return $this->Messages->getAll();

        $response = $this->Messages->getAll();
        $this->response->type('application/json');
        $this->response->body(json_encode($response));
        return $this->response;
    }
}