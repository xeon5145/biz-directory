<?php

namespace App\Models;

use CodeIgniter\Model;

class userAuth_model extends Model
{

    public function userAuth($username, $password) {

        $authBuilder = $this->db->table('authentication as A');
        $authBuilder->select('A.id, A.password, U.name as name');
        $authBuilder->join('users as U', 'A.id = U.id', 'left');
        $authBuilder->where('A.username', $username);
        $authBuilder->orWhere('A.email', $username);
        $user = $authBuilder->get()->getRow();

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
        $name = $data['name'];
        
        $userBuilder = $this->db->table('users');
        $authBuilder = $this->db->table('authentication');

        $userBuilder->where('email', $email);
        $user = $userBuilder->get()->getRow();
        
        if ($user) {
            return [
                'status' => 400,
                'message' => 'User already registered'
            ];
        } else {

            $userBuilder->insert([
                'email' => $email,
                'name' => $name,
                'status' => 0
            ]);

            $user_id = $this->db->insertID();            

            $authBuilder->insert([
                'email' => $email,
                'password' => $password,
                'user_id' => $user_id
            ]);

            return [
                'status' => 200,
                'message' => 'Account created. Check your email for verification link.'
            ];
        }
    }
}