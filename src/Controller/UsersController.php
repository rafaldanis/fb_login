<?php
namespace App\Controller;
 
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class UsersController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();
        
        $this->Facebook->init(Configure::read('Facebook.appId'), Configure::read('Facebook.appSecret'));
    }
    
    public function fb(){
        $this->autoRender = false;
        
        $facebook_access_token = $this->request->session()->read('facebook_access_token');

        $helper = $this->Facebook->getHelper();
            
        if (isset($facebook_access_token)) {
            $accessToken = $facebook_access_token;
        } else {
            $accessToken = $helper->getAccessToken()->getValue();
            $this->request->session()->write('facebook_access_token',$accessToken);
        }

        $this->Facebook->getFb()->setDefaultAccessToken($accessToken);
        
        $profile_request = $this->Facebook->getFb()->get('/me?fields=name,first_name,last_name,email');
        $profile = $profile_request->getGraphNode()->asArray();

        if(!$this->getUserFb($profile['id'])){            
            $user = $this->Users->newEntity();

            $user->First_name = $profile['first_name'];
            $user->Id_facebook = $profile['id'];
            $user->Last_name = $profile['last_name'];
            $user->Email = $profile['email'];
            $this->Users->save($user);
        }else{
            $user = $this->getUserFb($profile['id']);
        }
        
        $this->request->session()->write('uuid', $user->Uuid);
        $this->request->session()->write('first_name', $user->First_name);
        $this->request->session()->write('last_name', $user->Last_name);
        
        $this->redirect(['controller' => 'Pages', 'action' => 'home']);
    }
    public function logout(){
        $this->request->session()->delete('uuid');
        $this->request->session()->delete('first_name');
        $this->request->session()->delete('last_name');
        
        $this->redirect(['controller' => 'Pages', 'action' => 'home']);
    }
    public function getUserFb($accessToken){
        $user = $this->Users->find()
        ->where(['Id_facebook' => $accessToken])
        ->first();
        
        return $user;
    }
    public function getInfo(){
        $this->viewBuilder()->setLayout('ajax');
        $user = $this->Users->find()
        ->where(['Uuid' =>  $this->request->session()->read('uuid')])
        ->first();
        
        $return = array('Gold' => $user->Gold);
        $this->request->session()->write('gold', $user->Gold);
        
        $this->set('data',$return);
    }
    public function createUser() {

    }
}