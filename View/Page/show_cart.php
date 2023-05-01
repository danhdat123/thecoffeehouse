<?php
$title = "Giỏ hàng";
$header = BASE_PATH . 'View/include/header.php';

if (!file_exists($header)) {
  die('File header not found! [index.php]');
} else {
  require $header;
}

?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th>stt</th>
            <th>id sản phẩm</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Đơn Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xoá khỏi giỏ hàng</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $total_pay = 0;
          $total_product = 0;
          for ($i = 0; $i < count($orders); $i++) :
          ?>
            <tr>
              <td><?php echo $i + 1; ?></td>
              <td scope="row"><?php echo  $orders[$i]['id'] ?></td>
              <td><img src="<?php echo '/public/image/products/' . $orders[$i]['image'] ?>" alt="" width="100px" height="100px"></td>
              <td><strong><?php echo  $orders[$i]['product_name'] ?></strong></td>
              <td><strong><?php echo  $orders[$i]['product_price'] ?></strong> đ</td>
              <td><?php echo  $orders[$i]['quantity'] ?> ly</td>
              <td><strong><?php echo  $orders[$i]['quantity'] * $orders[$i]['product_price']  ?></strong> đ</td>
              <td>
                <a href="/user/deleted_cart/<?php echo $orders[$i]['id'] ?>" class="btn btn-danger">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </td>
            </tr>

            <?php $total_pay = $total_pay + ($orders[$i]['quantity'] * $orders[$i]['product_price']) ?>
            <?php $total_product = $total_product + $orders[$i]['quantity'] ?>
          <?php endfor ?>

          <tr>
            <td colspan="5"></td>
            <td><strong>Số lượng: </strong></td>
            <td>
              <strong><?php echo $total_product ?> ly</strong>
            </td>
            <td colspan="2">
              <strong>Tổng tiền: </strong>
              <strong style="color: red;"><?php echo $total_pay ?> đ</strong>
            </td>
          </tr>
          <tr>
            <td colspan="8">

              <button type="button" class="btn btn-primary btn-lg btn-block mt-lg-5" data-toggle="modal" data-target="#order-model">
                Đặt hàng ngay
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="order-model" tabindex="-1" role="dialog" aria-labelledby="order-model" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="order-model">Xác nhận đặt hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Khi bạn nhấn đặt hàng thì <strong style="color: red;">không thể huỷ</strong>. Bạn có chắc chắn đặt hàng?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="/user/order_now" class="btn btn-primary">Xác nhận</a>
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