<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class FacebookComponent extends Component
{
    
    public $fb;
    
    public function init($appId, $appSecret){

        $this->fb = new Facebook(array(
            'app_id' => $appId,
            'app_secret' => $appSecret,
            'default_graph_version' => 'v3.1',
            'default_access_token' => isset($_SESSION['facebook_access_token']) ? $_SESSION['facebook_access_token'] : $appId.'|'.$appSecret
        ));        
    }
    public function getFb(){
        return $this->fb;
    }
    public function getLoginUrl(){
        return $this->getHelper()->getLoginUrl(FB_LOGIN_URL);
    }
    public function getHelper(){
        return $this->fb->getRedirectLoginHelper();
    }
}