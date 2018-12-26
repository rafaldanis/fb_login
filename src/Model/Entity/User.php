<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    public function _getUuid($uuid){
       return $uuid;
    }
    public function _getEmail($email)
    {
        return $email;
    }
    public function _setCreated($created){
        return date('Y-m-d H:i');
    }
}