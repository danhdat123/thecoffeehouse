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
            <th>Trạng thái</td>
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
              <td><strong><?php echo  $orders[$i]['status'] ?></strong> </td>
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
        </tbody>
      </table>
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