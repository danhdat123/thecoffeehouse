<?php

require_once BASE_PATH . "Model/MasterModel.php";
require_once "Model/Product.php";
require_once "Model/Order.php";


class HomeController
{

    private $total_product;

    public function __construct()
    {
        $this->total_product = 10;
    }

    public function index()
    {
        session_start();
        $product = new Product();
        $products = $product->get_all_product(10);
        $page = $this->total_product;

        $total_product = $product->count_product();

        $order = new Order();
        if (isset($_SESSION['user_id'])) {
            $total_item_cart = $order->count_cart($_SESSION['user_id']);
        }
        require BASE_PATH . 'View/Page/index.php';
    }


    public function show_more($page)
    {
        $product = new Product();
        $products = $product->get_all_product($page);
        $total_product = $product->count_product();
        
        require BASE_PATH . 'View/Page/index.php';
    }


    public function detail($id)
    {
        session_start();
        $home = new Product();
        $product = $home->get_one_product($id);
        $result = $home->increase_viewed($id);

        $order = new Order();
        if (isset($_SESSION['user_id'])) {
            $total_item_cart = $order->count_cart($_SESSION['user_id']);
        }
        require BASE_PATH . 'View/Page/details.php';
    }
}
