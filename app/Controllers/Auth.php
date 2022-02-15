<?php


namespace App\Controllers;

use codeIgniter\Controller; 
use App\Libraries\Hash;

class Auth extends BaseController
{
    public function __construct(){
        helper(['url','form']);

    }

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function save()
    {
        // $validation = $this->validate([
        //     'name'=>'required',
        //     'email'=>'required|valid_email|is_unique[users.email]',
        //     'password'=>'required|min_length[5]|max_length[12]',
        //     'cpassword'=>'required|min_length[5]|max_length[12]|matches[password]',

        // ]);

        $validation = $this->validate([
            'name'=>[
                'rules'=> 'required', 
                'errors' => [
                    'required' => 'Le champ nom est vide'
                ]
            ],
            'email'=>[
                'rules'=> 'required|valid_email|is_unique[users.email]', 
                'errors' => [
                    'required' => 'Le champ email est vide',
                    'valid_email' => 'Le texte que vous avez entré n est pas une adresse mail', 
                    'is_unique[users.email]' => 'Votre mail est déja utilisé'
                ]
            ],
            'password'=>[
                'rules'=> 'required|min_length[5]|max_length[12]|matches[password]', 
                'errors' => [
                    'required' => 'Le champ mot de passe est vide',
                    'min_length' => 'Le mot de passe doit contenir au moins 5 caractères', 
                    'max_length' => 'Le mot de passe ne doit pas contenir plus de 12 caractères'
                ]
            ],
            'cpassword'=>[
                'rules'=> 'required|min_length[5]|max_length[12]', 
                'errors' => [
                    'required' => 'Le champ confirmation de mot de passe est vide',
                    'min_length' => 'Le mot de passe doit contenir au moins 5 caractères', 
                    'max_length' => 'Le mot de passe ne doit pas contenir plus de 12 caractères',
                    'matches' => 'Les deux mots de passe ne correspondent pas'
                ]
            ]
            
    
         ]);

        if(!$validation){
            return view('auth/register',['validation'=>$this->validator]);
        }else {
            //insertion dans la bdd
            $name = $this->request->getPost('name'); 
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password),
            ];

            $usersModel = new \App\Models\UsersModel(); 
            $query = $usersModel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail', 'Problème avec la bdd');
            }else{
                return redirect()->to('auth/register')->with('success', 'Vous êtes bien inscrit');
            }
        }

    }

    function check(){
        $validation = $this->validate([
            'email'=>[
                'rules'=>'required|valid_email|is_not_unique[users.email]',
                'errors' =>[
                    'required' => 'Veuillez entrer un email',
                    'valid_email' => 'Votre saisie n est pas au format mail',
                    'is_not_unique' => 'Cette adresse n est pas enregistrée'
                ]
            ],
            'password'=>[
                'rules'=>'required|min_length[5]|max_length[12]',
                'errors' =>[
                    'required' => 'Veuillez entrer un mot de passe',
                    'min_length' => 'Votre mdp doit contenir au moins 5 caractères',
                    'max_length' => 'Votre mdp doit contenir au maximum 12 caractères'
                ]
            ]
        ]);

        if(!$validation){
            return view('auth/login',['validation'=>$this->validator]);
        }else{
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $usersModel = new \App\Models\UsersModel(); 
            $user_info = $usersModel->where('email', $email)->first();
            $check_password = Hash::check($password, $user_info['password']);

            if(!$check_password){
                session()->setFlashdata('fail', 'Mot de passe incorrect');
                return redirect()->to('/auth')->withInput();
            }else{
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('/dashboard');
            }
        }
    }
}