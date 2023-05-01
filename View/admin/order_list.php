<?php
$title = "Danh sách Đơn hàng";
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
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                                        <th>Tên khách hàng</th>
                                        <th>Số lượng sản phẩm </th>
                                        <th>Thời gian đặt hàng</th>
                                        <th>Tương tác</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        >
                                        <th>Số tt</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số lượng sản phẩm </th>
                                        <th>Thời gian đặt hàng</th>
                                        <th>Tương tác</th>
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
                                            <td><?php echo $orders[$i]['total_product'] ?></td>
                                            <td><?php echo $orders[$i]['updated_at'] ?></td>
                                            <td>
                                                <a href="">Thông tin</a>
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


        <?php
        require BASE_PATH . 'View/admin/layout/footer.php'

        ?>

    </div>

</div>