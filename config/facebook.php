<?php
return[
    'Facebook' => [
        'appId' => FB_APP_ID, //Facebook App ID
        'appSecret' => FB_APP_SECRET, //Facebook App Secret
        'redirectURL' => FB_LOGIN_URL, //Callback URL
        'fbPermissions' => array('email'),  //Optional permissions
    ]
];