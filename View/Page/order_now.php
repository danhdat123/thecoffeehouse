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
      <form action="/user/order_now" method=""></form>
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