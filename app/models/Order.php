<?php 

namespace app\models;

use ishop\App;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Order extends AppModel{

    public static function saveOrder($data){
        $order = \R::dispense('order');
        $order->user_id = $data['user_id'];
        $order->note = $data['note'];
        $order->currency = $_SESSION['cart.currency']['code'];
        $order_id = \R::store($order);
        self::saveOrderProduct($order_id);
        return $order_id;
    }

    public static function saveOrderProduct($order_id){
        $sql_part = '';
        foreach($_SESSION['cart'] as $product_id => $product){
            $product_id = (int)$product_id;
            $sql_part .= "($order_id, $product_id, {$product['qty']}, '{$product['title']}', {$product['price']}),";
        }
        $sql_part = rtrim($sql_part, ',');
        \R::exec("INSERT INTO order_product (order_id, product_id, qty, title, price) VALUES $sql_part");
    }

    public static function mailOrder($order_id, $user_email){
        // Create the Transport
        $smtp_host = App::$app->getProperty('smtp_host');
        $smtp_port = App::$app->getProperty('smtp_port');
        $smtp_protocol = App::$app->getProperty('smtp_protocol');
        $smtp_login = App::$app->getProperty('smtp_login');
        $smtp_password = App::$app->getProperty('smtp_password');
        $shop_name = App::$app->getProperty('shop_name');
        $admin_email = App::$app->getProperty('admin_email');

        $transport = (new Swift_SmtpTransport($smtp_host, $smtp_port, $smtp_protocol))
            ->setUsername($smtp_login)
            ->setPassword($smtp_password);

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a messages
        ob_start();
        require APP . '/views/mail/mail_order.php';
        $body = ob_get_clean();

        $message_client = (new Swift_Message("Замовлення №000{$order_id}"))
            ->setFrom([$smtp_login => $shop_name])
            ->setTo($user_email)
            ->setBody($body, 'text/html');

        $message_admin = (new Swift_Message("Замовлення №000{$order_id}"))
            ->setFrom([$smtp_login => $shop_name])
            ->setTo($admin_email)
            ->setBody($body, 'text/html');

        
        // Send the message
        $result = $mailer->send($message_client);
        $result = $mailer->send($message_admin);

        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);
        $_SESSION['success'] = 'Ваше замовлення прийняте, менеджер зателефонує Вам протягом 24 годин.';
    }
}