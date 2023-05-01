<?php

$header = BASE_PATH . 'View/include/header.php';

if (!file_exists($header)) {
    die('File header not found! [index.php]');
} else {
    require $header;
}



?>

<div id="main">
    <!-- Header -->
    <div id="banner">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="#">
                        <img class="d-block w-100" src="/public/image/banner.jpeg" alt="First slide">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img class="d-block w-100" src="/public/image/banner.jpeg" alt="Second slide">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img class="d-block w-100" src="/public/image/banner.jpeg" alt="Third slide">
                    </a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- List Product -->
    <div class="container">
        <div class="row mt-5">
            <div class="col col-lg-6 col-sm-12">
                <a href="#" style="display: block; width: 100%;">
                    <img src="/public/image/products/sale1.jpeg" alt="" class="sale">
                </a>
            </div>
            <div class="w-100"></div>
            <div class="col col-lg-6 col-sm-12">
                <div class="row align-items-start">
                    <!-- show product -->
                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <div class="col col-lg-6">
                            <div class="cart cart-first">
                                <a href="/home/detail/<?php echo $products[$i]['id'] ?>">
                                    <img class="cart__img" src="<?php echo $products[$i]['image'] ?>" alt="<?php echo $products[$i]['product_name'] ?>">
                                </a>
                                <p class="cart__name">
                                    <a href="#">
                                        <?php echo $products[$i]['product_name'] ?>
                                    </a>
                                </p>
                                <p class="cart__price">
                                    <?php echo $products[$i]['product_price'] . " "  ?>đ
                                </p>
                                <div class="view-rate">
                                    <div>
                                        <i class="fa-solid fa-eye mr-1"></i>
                                        <?php echo  $products[$i]['viewed'] ?>
                                    </div>
                                    <div>
                                        <?php
                                        for ($t = 1; $t <= 5; $t++) {
                                            if ($t <= $products[$i]['star']) {
                                                echo "<i class=\"fa-solid fa-star active \"></i>";
                                            } else {
                                                echo "<i class=\"fa-regular fa-star\"></i>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <a href="/user/add_cart/<?php echo $products[$i]['id'] ?>" class="add-cart">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-lg-5 mt-sm-1">
            <?php for ($i = 2; $i < count($products); $i++) : ?>
                <div class="col-lg-3 col-sm-12 col-md-6 mt-lg-3">
                    <div class="cart">
                        <a href="/home/detail/<?php echo $products[$i]['id'] ?>">
                            <img class="cart__img" src="<?php echo $products[$i]['image'] ?>" alt="<?php echo $products[$i]['product_name'] ?>">
                        </a>
                        </a>
                        <p class="cart__name">
                            <a href="#">
                                <?php echo $products[$i]['product_name'] ?>
                            </a>
                        </p>
                        <p class="cart__price">
                            <?php echo $products[$i]['product_price'] . " " ?> đ
                        </p>
                        <div class="view-rate">
                            <div>
                                <i class="fa-solid fa-eye mr-1"></i>
                                <?php echo  $products[$i]['viewed'] ?>
                            </div>
                            <div>
                                <?php
                                for ($t = 1; $t <= 5; $t++) {
                                    if ($t <= $products[$i]['star']) {
                                        echo "<i class=\"fa-solid fa-star active \"></i>";
                                    } else {
                                        echo "<i class=\"fa-regular fa-star\"></i>";
                                    }
                                }

                                ?>
                            </div>
                        </div>
                        <a href="/user/add_cart/<?php echo $products[$i]['id'] ?>" class="add-cart">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            <?php endfor; ?>

        </div>
    </div>

    <!-- Show More -->
    <div class="container mt-lg-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <?php if($page < $total_product): ?>
                    <a href="/home/show_more/<?php 
                        if(isset($page)){
                            echo $page+=10;
                        }
                    
                    ?>" class="btn-large m-sm-auto">Xem thêm</a>
                </div>
                <?php endif ?>
        </div>
    </div>

    <div class="combo">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-lg-5 mt-sm-1">
                    <div class="combo__left">
                        <h2 class="combo__left--heading">Combo Quà Tết 2022</h2>
                        <p class="combo__left--desc">
                            Combo quà Tết 2022: Hộp quà tặng với 4 hộp trà túi lọc Tearoma, Hộp cà phê sữa đá,
                            Hộp cà phê 3in1 đậm vị Việt và Cà phê Original 1 của The Coffee House với thành phần
                            chính
                            cà phê Robusta Đắk Lắk,
                            vùng trồng cà phê nổi tiếng nhất Việt Nam. Bằng cách áp dụng kỹ thuật rang xay hiện đại.
                        </p>
                        <a href="#" class="btn-large m-sm-auto">Tìm hiểu thêm</a>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <img src="/public/image/combo/combo1.png" alt="" class="combo__img">
                </div>
            </div>
        </div>
    </div>


    <!-- hobbies -->
    <div class="container">
        <div class="store-coffe">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-lg-center">
                    <h1>Chuyện Cà phê và Trà</h1>
                </div>
            </div>
            <div class="row">
                <div class="hobby">
                    <div class="harizon mr-2"></div>
                    <h3 class="hobby__heading">
                        Coffeeholic
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-12 col-md-6">
                    <div class="cart">
                        <img src="/public/image/hobby/hobby1.webp" alt="" class="cart__img cart__img-post">
                        <p class="cart__name">ESPRESSO LÀ GÌ? CÁCH PHÂN BIỆT CÁCH</p>
                        <p class="cart__price">Espresso, một cái tên khá hay mà chắc hẳn bạn đã từng nghe qua. Vậy chính
                            xác
                            Espresso là gì, nó có bao nhiêu loại và làm sao để phân...</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-6">
                    <div class="cart">
                        <img src="/public/image/hobby/hobby2.webp" alt="" class="cart__img cart__img-post">
                        <p class="cart__name">ESPRESSO LÀ GÌ? CÁCH PHÂN BIỆT CÁCH</p>
                        <p class="cart__price">Espresso, một cái tên khá hay mà chắc hẳn bạn đã từng nghe qua. Vậy chính
                            xác
                            Espresso là gì, nó có bao nhiêu loại và làm sao để phân...</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-6">
                    <div class="cart">
                        <img src="/public/image/hobby/hobby3.webp" alt="" class="cart__img cart__img-post">
                        <p class="cart__name">ESPRESSO LÀ GÌ? CÁCH PHÂN BIỆT CÁCH</p>
                        <p class="cart__price">Espresso, một cái tên khá hay mà chắc hẳn bạn đã từng nghe qua. Vậy chính
                            xác
                            Espresso là gì, nó có bao nhiêu loại và làm sao để phân...</p>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php
    $header = BASE_PATH . 'View/include/footer.php';

    if (!file_exists($header)) {
        die('File header not found! [index.php]');
    } else {
        require $header;
    }
    ?>

</div>


<script src="/public/javascript/main.js"></script>