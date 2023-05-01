<?php
$header = BASE_PATH . 'View/include/header.php';

if (!file_exists($header)) {
    die('File header not found! [index.php]');
} else {
    require $header;
}
?>

<style>
    .quantity {
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        margin: 20px 0;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <img src="/public/image/products/<?php echo $product['image'] ?>" alt="" style="width: 100%;">
        </div>
        <div class="col-lg-6">
            <form action="">
                <div class="row">
                    <div class="col">
                        <h3 class="product-name"><?php echo $product['product_name'] ?></h3>
                        <p class="price"><?php echo $product['product_price'] ?>đ</p>
                    </div>
                </div>
                <div class="row">
                    <p class="size">Kích thước</p>
                </div>
                <div class="row">
                    <ul id="list-size-price">
                        <li class="active"><a href="">Lớn</a></li>
                        <li><a href="">vừa</a></li>
                        <li><a href="">Nhỏ</a></li>
                    </ul>
                </div>

                <div class="row">
                    <p>
                        Số lượng
                    </p>
                    <div class="quantity">
                        <button type="button" class="btn btn-primary" style="font-size: 13px; border-radius: 50%; padding: 0 20px;">-</button>
                        <input type="text" value="1" style="font-size: 24px; text-align: center; width: 169px;">
                        <button type="button" class="btn btn-primary" style="font-size: 13px; border-radius: 50%; padding: 0 20px;">+</button>
                    </div>
                </div>
                <div class="row">
                    <button class="ship-home-btn">Mua ngay</button>
                </div>
            </form>
            <div class="row">
                <div class="place-buy">
                    <p class="buy-store">
                        <i class="fas fa-store"></i>
                        Mua tại cửa hàng
                    </p>
                    <p class="buy-take-away">
                        <i class="fas fa-mobile-alt"></i>
                        Mua mang đi
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h3 class="info-left__heading">Thông tin</h3>
            <p class="info-left__desc">
                <?php echo $product['description'] ?>
            </p>
        </div>
        <div class="col-lg-6">
            <h3 class="story-heading">Câu chuyện</h3>
            <p class="story-detail">
                <?php echo $product['description'] ?>
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <h3>Sản phẩm liên quan</h3>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="cart">
                <img src="/public/image/products/hat-sen1.jpg" alt="" class="cart__img">
                <p class="cart__name">Trà Đào Cam Sả Đá</p>
                <p class="cart__price">45.000 đ</p>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="cart">
                <img src="/public/image/products/hat-sen1.jpg" alt="" class="cart__img">
                <p class="cart__name">Trà Đào Cam Sả Đá</p>
                <p class="cart__price">45.000 đ</p>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="cart">
                <img src="/public/image/products/hat-sen1.jpg" alt="" class="cart__img">
                <p class="cart__name">Trà Đào Cam Sả Đá</p>
                <p class="cart__price">45.000 đ</p>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="cart">
                <img src="/public/image/products/hat-sen1.jpg" alt="" class="cart__img">
                <p class="cart__name">Trà Đào Cam Sả Đá</p>
                <p class="cart__price">45.000 đ</p>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="cart">
                <img src="/public/image/products/hat-sen1.jpg" alt="" class="cart__img">
                <p class="cart__name">Trà Đào Cam Sả Đá</p>
                <p class="cart__price">45.000 đ</p>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="cart">
                <img src="/public/image/products/hat-sen1.jpg" alt="" class="cart__img">
                <p class="cart__name">Trà Đào Cam Sả Đá</p>
                <p class="cart__price">45.000 đ</p>
            </div>
        </div>
    </div>
</div>


<script src="/public/javascript/detail.js" def></script>
<?php
$header = BASE_PATH . 'View/include/footer.php';

if (!file_exists($header)) {
    die('File footer not found! [index.php]');
} else {
    require $header;
}
?>