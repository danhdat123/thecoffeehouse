<?php
class Router
{
    public function __construct()
    {
        // mở cors: cross origin cho client
        $this->cors();
        // Cho phép nén gzip data giúp dữ liệu nhẹ hơn => client nhận được phản hồi nhanh hơn
        $this->Gzip();
    }

    public static function init()
    {
        $db = BASE_PATH . 'config/Database.php';
        if (!file_exists($db)) {
            Router::Internal_error();
        } else {
            require $db;
        }

        if (isset($_SERVER['REQUEST_URI'])) {

            $arr_url_str = explode("/", $_SERVER['REQUEST_URI']);

            //Homepage URI
            if ($arr_url_str[1]  == '' && count($arr_url_str) <= 2) {
                try {
                    require BASE_PATH . "controller\HomeController.php";
                    $homeController = new HomeController();
                    $action = 'index';

                    if (!method_exists($homeController, $action)) {
                        Router::NOT_FOUND();
                    } else {
                        $homeController->$action();
                    }
                } catch (\Throwable $th) {
                    Router::Internal_error();
                }
            }
            // nếu url khác  / thì sẽ là trang khác
            else {
                try {
                    $controller = ucfirst($arr_url_str[1]) . "Controller";

                    $path_controller =  BASE_PATH . 'controller/' . $controller . ".php";

                    if (file_exists($path_controller)) {
                        require  $path_controller;

                        $control = new $controller();
                        $action = $arr_url_str[2];
                        if (!method_exists($control, $action)) {
                            Router::NOT_FOUND();
                        } else {
                            /**
                             * nếu router có thêm 1 đối số thứ 3 thì sẽ là params là id.
                             * => vì vậy mảng $arr_url_str có count() = 4. => vị trí là 3 
                             * ví dụ: /home/detail/3 
                             * 
                             * + ngược lại thì ko có thêm param thì chỉ cần action thôi là đủ. Query sẽ được lấy sau. 
                             */
                            if (count($arr_url_str) > 3) {
                                $id = $arr_url_str[3];
                                $control->$action($id);
                            } else {
                                try {
                                    $control->$action();
                                } catch (\Throwable $th) {
                                    Router::Internal_error();
                                }
                            }
                        }
                    }else{
                        Router::NOT_FOUND();
                    }


                } catch (\Throwable $th) {
                    Router::Internal_error();
                }
            }
        }
    }


    public static function NOT_FOUND()
    {
        require_once BASE_PATH . "View/Page/error/not_found.php";
    }


    public static function Internal_error()
    {
        require_once BASE_PATH . "View/Page/error/internal_error.php";
    }

    // Cho phép Client thực hiện tác vụ bằng JS. Nếu không lỗi CORS block by policy sẽ hiện trong màn hình console trình duyệt
    function cors()
    {
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

            exit(0);
        }
        // echo "You have CORS!"; // debug
    }

    public function Gzip()
    {
        if (substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip"))
            ob_start("ob_gzhandler");
        else ob_start();
    }
}
