<?php

namespace App\Models;

use CodeIgniter\Model;

class userAuth_model extends Model
{
    protected $table = 'authentication';

    public function userAuth($username, $password) {

       $user = $this->select('id,password')->where('username', $username)->first();
        
        if ($user) {
            if ($password == $user['password']) {
                return true;
            }
        }
        return false;

    }
}