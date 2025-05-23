<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use app\models\User;

class CartController extends AppController{

    public function addAction(){
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $mod = null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
        $mod_id = !empty($_GET['mod']) ? (int)$_GET['mod'] : null;
        
        if($id){
            $product = \R::findOne('product', 'id = ?', [$id]);
            if(!$product){
                return false;
            }
            if($mod_id){
                $mod = \R::findOne('modification', 'id = ? AND product_id = ?', [$mod_id, $id]);
            }
        }
        $cart = new Cart();
        $cart->addToCart($product, $qty, $mod);
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function showAction(){
        $this->loadView('cart_modal');
    }

    public function deleteAction(){
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        if(isset($_SESSION['cart'][$id])){
            $cart = new Cart();
            $cart->deleteItem($id);
        }
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function clearAction(){
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);
        $this->loadView('cart_modal');
    }

    public function viewAction(){
        $this->setMeta('Products in your cart');
    }

    public function checkoutAction(){
        if(!empty($_POST)){
            if(!User::checkAuth()){
                $user = new User();
                $data = $_POST;
                $user->load($data);
                
                if(!$user->validate($data) || !$user->checkUnique()){
                    $user->getErrors();
                    $_SESSION['form_data'] = $data;
                    redirect();
                }else{
                    //$email = $user->attributes['email'];
                    //$u = \R::findOne('user', 'email = ?', [$email]);
                    //if(!$u){
                        //$user->attributes['role'] = 'not_reg';
                        $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                        if(!$user_id = $user->save('user')){
                            $_SESSION['form_data'] = $data;
                            $_SESSION['error'] = 'Error!';
                            redirect();
                        //}
                    //}else{
                        //$user_id = $u->id;
                    }
                }
            }
            $data['user_id'] = isset($user_id) ? $user_id : $_SESSION['user']['id'];
            $data['note'] = !empty($_POST['note']) ? h($_POST['note']) :'';
           // $user_email = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : $_POST['email'];
            $order_id = Order::saveOrder($data);
           // Order::mailOrder($order_id, $user_email);
           if (!$order_id = Order::saveOrder($data)) {
            $_SESSION['errors'] = 'cart_checkout_error_save_order';
            } else {
                //Order::mailOrder($order_id, $user_email, 'mail_order_user');
                //Order::mailOrder($order_id, App::$app->getProperty('admin_email'), 'mail_order_admin');
                unset($_SESSION['cart']);
                unset($_SESSION['cart.sum']);
                unset($_SESSION['cart.qty']);
                $_SESSION['success'] = 'cart_checkout_order_success';
            }
        }
        redirect();
    }
}