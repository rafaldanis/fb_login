<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('User');
        
        $this->Facebook->init(Configure::read('Facebook.appId'), Configure::read('Facebook.appSecret'));
    }
    
    public function logoutHome()
    {
        $this->viewBuilder()->layout('home');
        $this->set('LoginUrlFb',$this->Facebook->getLoginUrl());
    }
    public function loginHome(){

    }
    public function home(){
        if($this->User->isLogin()==false){
            $this->redirect(['controller' => 'Pages', 'action' => 'logoutHome']);
        }else{
            $this->redirect(['controller' => 'Pages', 'action' => 'loginHome']);
        }
    }
}
