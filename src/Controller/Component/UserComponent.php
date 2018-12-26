<?php
    
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class UserComponent extends Component
{
    public function isLogin(){
        $this->Users = TableRegistry::get('Users');
        
        $uuid = $this->request->session()->read('uuid');
        
        if($uuid == null){
            return false;
        }

        $user = $this->Users->find()
        ->where(['Uuid' => $uuid])
        ->first();

        if($user){
            return true;
        }else{
            return false;
        }
    }
}