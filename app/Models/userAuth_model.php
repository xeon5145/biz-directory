<?php

namespace App\Models;

use CodeIgniter\Model;

class userAuth_model extends Model
{

    public function userAuth($username, $password) {

        $builder = $this->db->table('authentication as A');
        $builder->select('A.id, A.password, U.name as name');
        $builder->join('users as U', 'A.id = U.id', 'left');
        $builder->where('A.username', $username);
        $builder->orWhere('A.email', $username);
        $user = $builder->get()->getRow();

        if ($user) {
            if ($password == $user->password) {
                return [
                    'status' => 200,
                    'message' => 'Login successful',
                    'name' => $user->name
                ];
            }
        }
        return [
            'status' => 400,
            'message' => 'Invalid credentials'
        ];

    }

    public function registerAccount($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        
        $builder = $this->db->table('authentication');
        $builder->where('email', $email);
        $user = $builder->get()->getRow();
        
        if ($user) {
            return [
                'status' => 400,
                'message' => 'User already registered'
            ];
        } else {
            $builder->insert([
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