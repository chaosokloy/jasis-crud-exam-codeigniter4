<?php

namespace App\Controllers;

use App\Models\UserModel;

class Main extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function index()
    {
        return view('index');
    }

    public function auth()
    {
        $validation = $this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username is required'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have at least 5 characters in length',
                    'max_length' => 'Password must not have more than 12 characters in length'
                ]
            ]
        ]);

        if (!$validation) {
            return view('index', ['validation' => $this->validator]);
        } else {
            $session = session();//Initialize the session
            $model = new UserModel;

            $req_username = $this->request->getPost('username');
            $req_password = $this->request->getPost('password');

            $data = $model->where('username', $req_username)->first();
            if ($data !==null){
                $password = $data['password'];

                if ($password == $req_password){
                    $sess_data = [
                        'id' => $data['id'],
                        'username' => $data['username'],
                        'password' => $data['password'],
                        'logged_in' => true

                ];
                $session->set($sess_data);
                return redirect()->to('/admin/dashboard');
            }
        }  

                $session->setFlashdata('fail', 'Incorrect Username/Password');
                return redirect()->to('/main')->withInput();
            }
        }   

    public function logout()
    {
        if(session()->has('logged_in')){
            session()->remove('logged_in');
            return redirect()->to('/main')->with('fail', 'You are logged out!');
        }
    }

}