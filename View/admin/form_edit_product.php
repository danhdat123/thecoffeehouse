<?php
$title = "Edit Product";
require BASE_PATH . 'View/admin/layout/header.php';
?>




<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php require BASE_PATH . 'View/admin/layout/sidebar.php' ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php require_once BASE_PATH . "View/admin/layout/topbar.php" ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa sản phẩm</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-download fa-sm text-white-50"> </i> Generate Report</a>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="container">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Chỉnh sửa sản phẩm <strong><?php echo $product['product_name'] ?></strong></h1>
                                                </div>

                                                <form class="user" enctype="multipart/form-data" method="POST" action="/admin/edit_product/<?php echo $product['id'] ?>">
                                                <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <input type="text" name="id" value="<?php echo $product['id'] ?>" readonly class="form-control form-control-user" id="exampleFirstName" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <input type="text" name="product_name" value="<?php echo $product['product_name'] ?>"  class="form-control form-control-user" id="exampleFirstName" placeholder="Tên sản phẩm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <input type="text" name="product_name" value="<?php echo $product['product_name'] ?>" required class="form-control form-control-user" id="exampleFirstName" placeholder="Tên sản phẩm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="number" name="product_price" value="<?php echo $product['product_price'] ?>" required class="form-control form-control-user" id="exampleInputPassword" placeholder="10$">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="category_id">Danh mục</label>
                                                                <select class="form-control" name="category_id" id="">
                                                                    <?php for ($i = 0; $i < count($categories); $i++) { ?>
                                                                        <option default value="<?php echo $categories[$i]['id'] ?>">
                                                                            <?php echo $categories[$i]['name'] ?>
                                                                        </option>
                                                                    <?php } ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <input accept="image/*" value="<?php echo $product['image']; ?>" name="image" class="image" required type='file' id="imgInp" />
                                                            <img id="blah" src="<?php echo "/public/image/products/" . $product['image'] ?>" alt="your image" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="description" rows="10" cols="80" required>
                                                                        <?php echo $product['description'] ?>
                                                        </textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                                        Submit
                                                    </button>
                                                </form>
                                                <!-- End Form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>



        <script defer>
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }
        </script>
        <?php
        require BASE_PATH . 'View/admin/layout/footer.php'

        ?>