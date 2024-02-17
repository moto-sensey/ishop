<?php 

namespace app\controllers;

use app\models\User;
use ishop\App;

class UserController extends AppController{
   
    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if($user->save('user')){
                    $_SESSION['success'] = 'The user is registered.';
                    $user->login();
                    redirect(PATH);
                }else{
                    $_SESSION['error'] = 'Error!';
                    redirect();
                }
            }
        }
        $this->setMeta('Sign Up', 'IShop signup', 'IShop, Signup');
    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                redirect(PATH);
            }else{
                $_SESSION['error'] = 'Логин или пароль введены неверно!';
                redirect();
            }
            
        }
        
        $this->setMeta('Login', 'IShop login', 'IShop, Login');
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect(PATH . '/user/login');
    }
}