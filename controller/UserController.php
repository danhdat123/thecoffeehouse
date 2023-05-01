<?php

require_once BASE_PATH . "Model/MasterModel.php";
require_once BASE_PATH . "Model/User.php";
require_once BASE_PATH . "Model/Product.php";
require_once BASE_PATH . "Model/Order.php";

class UserController
{

    function __construct()
    {
    }

    public function login_form()
    {
        session_start();

        if (isset($_SESSION['user_name'])) {
            header('Location: /');
        } else {

            require 'View/Page/login.php';
        }
    }

    public function login()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $pass_word = $_POST['password'];


            $email = trim($email);
            $pass_word = trim($pass_word);
            $hashed_password = md5($pass_word);
            if (empty($email) || empty($pass_word)) {
                $error = 'Please enter all Field';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }

            $user = new User();

            $user_exits = $user->login($email, $hashed_password);

            if ($user_exits) {
                $_SESSION['user_id'] = $user_exits['id'];
                $_SESSION['user_name'] = $user_exits['user_name'];
                $_SESSION['role_id'] = $user_exits['role_id'];
                header('Location: /');
                exit;
            } else {
                header('Location: /user/login_form');
                exit;
            }
        }
    }


    public function logout()
    {
        session_start();

        session_destroy();

        header('Location: /');
    }


    public function register()
    {
        session_start();

        if (isset($_SESSION['user_name'])) {
            header('Location: /');
        }

        require "View/Page/register.php";
    }


    public function confirmRegister()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $user_name = $_POST['user_name'];
                $pass_word = $_POST['password'];
                $email   =  $_POST['email'];
                $phone_number = $_POST['phone_number'];
                $address = $_POST['address'];

                $user_name = trim($user_name);
                $pass_word = trim($pass_word);
                $email = trim($email);
                $phone_number = trim($phone_number);
                $address = trim($address);

                if (empty($user_name) || empty($pass_word) || empty($email) || empty($phone_number)) {
                    header('Location: /user/register');
                }

                $user = new User();

                $user_exits = $user->get_one_user($user_name, $email);
                if (isset($user_exits)) {
                    header('Location: /user/register');
                    
                } else {
                    $pass_word = md5($pass_word);
                    $user->register($user_name, $pass_word, $email, $phone_number, $address);
                    header('Location: /');
                }
            }
        } catch (\Throwable $th) {
            die($th);
        }
    }


    public function add_cart($id, $size = "M", $quantity = 1 ,$redirect = true)
    {
        session_start();
        if (isset($_SESSION['user_id'])) {
            $order = new Order();
            $order_item = $order->get_one_order($id, $_SESSION['user_id']);


            // Tồn tại thì update ngược lại thì tạo mới
            if (empty($order_item)) {
                $order->order_product($_SESSION["user_id"], $id, $size, $quantity);
            } else {
                $order->order_update_item($_SESSION["user_id"], $order_item['id']);
            }

            if ($redirect) {
                header('Location: /');
            }
        } else {
            header('Location: /user/login_form');
        }
    }


    public function deleted_cart($id)
    {
        session_start();
        if (isset($_SESSION['user_id'])) {
            $order = new Order();
            $order->deleted_cart($_SESSION["user_id"], $id);


            header('Location: /user/get_all_cart');
        } else {
            header('Location: /user/login_form');
        }
    }


    public function get_all_cart()
    {
        session_start();
        if (isset($_SESSION['user_id'])) {

            $orders = new Order();
            if (isset($_SESSION['user_id'])) {
                $total_item_cart = $orders->count_cart($_SESSION['user_id']);
            }

            $orders =  $orders->get_all_order($_SESSION['user_id']);
            require "View/Page/show_cart.php";
        } else {
            header("Location: /");
        }
    }


    public function order_now()
    {
        try {
            session_start();
            if (isset($_SESSION['user_id'])) {

                $order = new Order();

                $orders =  $order->change_status_order($_SESSION['user_id']);
                header("Location: /user/get_all_order");
            } else {
                header("Location: /");
            }
        } catch (\Throwable $th) {
            die($th);
        }
    }

    public function notification_order()
    {
        session_start();
        if (isset($_SESSION['user_id'])) {

            $orders = new Order();
            if (isset($_SESSION['user_id'])) {
                $total_item_cart = $orders->count_cart($_SESSION['user_id']);
            }

            $orders =  $orders->get_all_order_confirm($_SESSION['user_id']);
            require BASE_PATH . "View/Page/notification_order.php";
        } else {
            header("Location: /");
        }
    }


    public function buy_now()
    {
        try {
            session_start();
            if (isset($_SESSION['user_id'])) {
                $id = $_POST['id'];
                $size = $_POST['size'];
                $quantity = $_POST['quantity'];

                $this->add_cart($id,$size, $quantity, false);

                $order = new Order();

                $orders =  $order->change_status_order($_SESSION['user_id']);
                header('Location: /user/notification_order');
            } else {
                header("Location: /");
            }
        } catch (\Throwable $th) {
            die($th);
        }
    }
}
