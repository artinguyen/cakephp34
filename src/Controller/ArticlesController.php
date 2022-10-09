<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
// Prior to 3.5 use I18n::locale()
use Cake\Http\ServerRequest;
use Cake\Datasource\ConnectionManager;
class ArticlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
        //$this->loadModel('Messages');
    }

    public $helpers = ['Form', 'Html'];

    public function index($short = null)
    {
        // if ($this->request->is('post')) {
        //     $article = $this->Articles->newEntity($this->request->getData());
        //     if ($this->Articles->save($article)) {
        //         // Redirect as per PRG pattern
        //         return $this->redirect(['action' => 'index']);
        //     }
        // }
        // if (!empty($short)) {
        //     $result = $this->Articles->find('all', [
        //         'fields' => ['id', 'title']
        //     ]);
        // } else {
        //     $result = $this->Articles->find();
        // }

        // $this->set([
        //     'title' => 'Articles',
        //     'articles' => $result
        // ]);
        //$query = TableRegistry::get('Messages')->find()->toArray();
        //var_dump($query);die();
        // $this->set([
        //     'title' => 'Articles',
        //     'articles' => $query
        // ]);
    }

    public function index1()
    {
        // $article = $this->Articles->find();
        // foreach($article as $a) {
        //     echo $a->title;
        // }
        die('2222');
        $connection = ConnectionManager::get('default');
        $connection->begin();
        try{
        // Prior to 3.6 use TableRegistry::get('Articles')
$cat = TableRegistry::get('categories');
$info = $cat->get(1);
//$article = $articles->find('all')->where(['id' => 2])->first();
//$info->id = 1;
$info->category = 'My new title1';
$cat->save($info);

$article = $this->Articles->find('all')->where(['id' => 1])->first();

$article->title = 'My new title 3';
$article->published = 1;
$this->Articles->save($article);
    $connection->commit();
} catch(\Exception $e) {
  $connection->rollback();  
}

        //die();
        //$articles = $this->Paginator->paginate($this->Articles->find());

        //$p1 = $this->request->getParam('lang');
        //echo Router::url(['controller' => 'Articles', 'action' => 'view', 'id' => 15]);
        //dd($p1);
        Router::addUrlFilter(function (array $params, ServerRequest $request) {
            if ($request->getParam('lang') && !isset($params['lang'])) {
                $params['lang'] = $request->getParam('lang');
            }
            return $params;
        });
        
        $test = Router::url(['controller' => 'Articles', 'action' => 'view', 'es']);
        dd($test);
        $articles = 5;
        
        $this->set(compact('articles'));
    }

    public function view($slug)
    {
        dd('1');
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
            $article->title = 'Test';

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        //$this->set('article', $article);

         $response = array('status'=>'failed', 'message'=>'Please provide form data');
    

     
        
            $this->response->type('application/json');
            $this->response->body(json_encode($response));
            return $this->response;
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
}