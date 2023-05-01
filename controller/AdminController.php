<?php

require_once BASE_PATH . "Model/MasterModel.php";
require BASE_PATH . 'Model/Product.php';
require BASE_PATH . 'Model/Category.php';
require BASE_PATH . 'Model/User.php';
require BASE_PATH . 'Model/Order.php';

class AdminController
{

    private $product;
    private $category;
    private $access = false;


    public function __construct()
    {
        session_start();
        // chặn user ko đủ quyền
        if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 2) {
            require BASE_PATH . "View/Page/error/access_denied.php";
        } else {
            $this->product = new Product();
            $this->category = new Category();
            $this->access = true;
        }
    }

    public function dashboard()
    {
        if ($this->access == true) {
            $path = BASE_PATH . 'View/admin/dashboard.php';
            $products = $this->product->get_all_product(100, 1);

            if (!file_exists($path)) {
                Router::Internal_error();
            } else {
                require $path;
            }
        }
    }

    public function form_add_product()
    {
        if ($this->access == true) {
            $path = BASE_PATH . 'View/admin/form_add_product.php';
            $category = new Category();
            $categories = $category->get_all_category();

            if (!file_exists($path)) {
                Router::Internal_error();
            } else {
                require $path;
            }
        }
    }

    public function add_product()
    {
        if ($this->access == true) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];
                $description = $_POST['description'];
                $category_id = $_POST['category_id'];

                //Thư mục bạn sẽ lưu file upload
                $target_dir = "public/image/products/";
                //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $img_url = "/" . $target_dir . $_FILES["image"]["name"];
                    $this->product->insert_one($product_name, $product_price, $description, $category_id, $img_url);
                    header("Location: /admin/form_add_product");
                } else {
                    echo json_encode([
                        "uploaded" => true,
                        "message" => "Có lỗi xảy ra khi upload file."
                    ]);
                }
            }
        }
    }

    public function form_edit_product($id)
    {
        if ($this->access == true) {
            $path = BASE_PATH . 'View/admin/form_edit_product.php';
            $category = new Category();
            $categories = $category->get_all_category();

            $prod = new Product();
            $product = $prod->get_one_product($id);

            if (!file_exists($path)) {
                Router::Internal_error();
            } else {
                require $path;
            }
        }
    }

    public function order_admin()
    {

        try {
            if ($this->access == true) {
                $path = BASE_PATH . 'View/admin/order_list.php';
                
                $order = new Order();
                $orders = $order->get_all_order_by_admin();
    
                if (!file_exists($path)) {
                    Router::Internal_error();
                } else {
                    require $path;
                }
            }
        } catch (\Throwable $th) {
            die($th);
        }
    }




    public function delete_product($id)
    {
        if ($this->access == true) {
            $prod = new Product();
            $product = $prod->delete_product($id);

            header("Location: /admin/dashboard");
        }
    }



    public function edit_product($id)
    {
        if ($this->access == true) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];
                $description = $_POST['description'];
                $category_id = $_POST['category_id'];

                //Thư mục bạn sẽ lưu file upload
                $target_dir = "public/image/products/";
                //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $img_url = "/" . $target_dir . $_FILES["image"]["name"];
                    $this->category->insert_one($product_name, $product_price, $description, $category_id, $img_url);
                    header("Location: /admin/form_add_product");
                } else {
                    echo json_encode([
                        "uploaded" => true,
                        "message" => "Có lỗi xảy ra khi upload file."
                    ]);
                }
            }
        }
    }
}
