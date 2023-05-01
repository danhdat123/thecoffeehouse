<?php
class ProductController
{
    public function upload()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                "uploaded" => false,
                "message" => "dữ liệu rỗng"
            ]);
        }

        if (!isset($_FILES["upload"])) {
            echo  json_encode([
                "uploaded" => false,
                "message" => "Dữ liệu không đúng cấu trúc. Check lại tên"
            ]);
        }

        //Thư mục bạn sẽ lưu file upload
        $target_dir    = "public/image/uploads/";
        //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
        $target_file   = $target_dir . basename($_FILES["upload"]["name"]);


        $allowUpload   = true;

        //Lấy phần mở rộng của file (jpg, png, ...)
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


        ////Những loại file được phép upload
        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


        // Kiểm tra kiểu file
        if (!in_array($imageFileType, $allowtypes)) {
            echo  json_encode([
                "uploaded" => false,
                "message" => "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF"
            ]);
            $allowUpload = false;
        }


        ////Những loại file được phép upload
        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
        if ($allowUpload) {
            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
                echo  json_encode([
                    "uploaded" => true,
                    "url" => "https://thecoffeehouse.test/" . $target_dir . $_FILES["upload"]["name"]
                ]);
            } else {
                echo  json_encode([
                    "uploaded" => true,
                    "message" => "Có lỗi xảy ra khi upload file."
                ]);
            }
        } else {
            echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
        }
    }


    public function review()
    {
        if (isset($_GET['img'])) {
            $path =  "https://thecoffeehouse.test/" . $_GET['img'];

            echo "<img src='$path' alt=''>";
        }
    }
}
