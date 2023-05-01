<?php
$title= "Danh sách Đơn hàng";
require BASE_PATH . 'View/admin/layout/header.php';
?>

    <style>
        img {
            width: 100px;
        }
    </style>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        require BASE_PATH . 'View/admin/layout/sidebar.php'

        ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once BASE_PATH . "View/admin/layout/topbar.php" ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Header -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Số tt</th>
                                        <th>Tên sản phẩm</th>
                                        <th>giá sản phẩm</th>
                                        <th>ảnh</th>
                                        <th>mô tả</th>
                                        <th>ngày tạo</th>
                                        <th>action</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Số tt</th>
                                        <th>Tên sản phẩm</th>
                                        <th>giá sản phẩm</th>
                                        <th>ảnh</th>
                                        <th>mô tả</th>
                                        <th>ngày tạo</th>
                                        <th>action</th>
                                        <th>action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    <?php
                                    $total_prod = count($orders);
                                    if ($total_prod == 0) {
                                        echo "Chưa có sản phẩm nào";
                                    } else
                                        for ($i = 0; $i < $total_prod; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $orders[$i]['user_name'] ?></td>
                                                <td><?php echo "<img src=" . $orders[$i]['image'] . ">" ?></td>
                                                <td><?php echo $orders[$i]['created_at'] ?></td>
                                                <td>
                                                    <a href="/admin/form_edit_product/<?php echo $orders[$i]['id'] ?>"
                                                       class="btn btn-warning mr-3">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="/admin/form_edit_product" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>

    </div>


<?php
require BASE_PATH . 'View/admin/layout/footer.php'

?>