<?php
if (!isset($_SESSION)) {
    session_start();
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>HomePage</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="//theme.hstatic.net/1000075078/1000803849/14/favicon.png?v=433" type="image/png">


    <!-- Link CDN Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/detail.css">
    <link rel="stylesheet" href="/public/css/responsive.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header__meta-list">
                    <!-- Meta Item -->
                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 w-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p class="meta-item__desc">146 Cửa hàng khắp cả nước</p>
                    </div>
                    <!-- End Meta Item -->

                    <!-- Meta Item -->
                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 w-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <p class="meta-item__desc">Đặt hàng: 1800.6936 </p>
                    </div>
                    <!-- End Meta Item -->
                    <!-- Meta Item -->
                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 w-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p class="meta-item__desc">Freeship từ 50.000vnd</p>
                    </div>
                    <!-- End Meta Item -->
                </div>
            </div>
        </div>
    </div>

    <div id="menu">
        <div class="btn-menu-mobile">
            <i class="fas fa-bars btn-menu-icon"></i>
        </div>
        <a href="/">
            <img src="/public/image/logo.png" alt="" class="logo">
        </a>
        <div class="menu-mobile">
            <ul id="nav">
                <i class="fas fa-times close-icon"></i>
                <li><a href="?controller=user">Cà phê</a></li>
                <li><a href="#">Trà</a></li>
                <li><a href="#">Chuyện Cà phê và Trà</a></li>
                <li><a href="#">Cửa Hàng</a></li>
                <?php
                if (isset($_SESSION['user_name'])) {
                ?>
                    <style>
                        .subnav {
                            position: absolute;
                            left: 0;
                            top: 100%;
                            background-color: #fff;
                            width: 230px;
                            list-style: none;
                            display: none;
                        }

                        #nav li:hover .subnav {
                            display: block;
                        }
                    </style>
                    <li style="position: relative;">
                        <a href="#">
                            <?php echo $_SESSION['user_name']; ?>
                        </a>
                        <ul class="subnav">
                            <li>
                                <a href="#">Thông tin tài khoản</a>
                            </li>
                            <?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 2) { ?>
                                <li>
                                    <a href="/admin/dashboard">Dashboard</a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="/user/logout">Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    <a href="/user/get_all_cart" style=" position: relative;">
                        <i class="fa-solid fa-cart-shopping" style="font-size: 26px;"></i>
                        <span class="total_product_cart">
                            <?php 
                                if(isset($total_item_cart)){
                                    echo $total_item_cart;
                                }else{
                                    echo 0;
                                }
                            ?>
                        </span>
                    </a>
                </li>
                <?php
                } else {
                ?>

                    <li><a href="/user/register">Đăng kí</a></li>
                    <li><a href="/user/login_form">Đăng nhập</a></li>

                <?php
                }
                ?>


                
            </ul>
        </div>
    </div>