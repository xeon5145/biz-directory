<?php

namespace App\Models;

use CodeIgniter\Model;

class userAuth_model extends Model
{
    protected $table = 'authentication as A';

    public function userAuth($username, $password) {

       $user = $this->select('A.id,A.password,U.name as name')
                ->join('users as U', 'A.id = U.id', 'left')
                ->where('A.username', $username)
                ->orWhere('A.email', $username)
                ->first();
        
        if ($user) {
            if ($password == $user['password']) {
                return $user['name'];
            }
        }
        return false;

    }

    public function registerAccount($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        

        $user = $this->select('id')
                    ->where('email', $email)
                    ->first();
        
        if ($user) {
            return [
                'status' => 400,
                'message' => 'User already registered'
            ];
        } else {
            $this->save([
                'email' => $email,
                'password' => $password
            ]);
            return [
                'status' => 200,
                'message' => 'Please check your email for verification link'
            ];
        }
    }
}