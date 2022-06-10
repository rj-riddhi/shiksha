<!-- Start includeing header -->
<?php
include('./maininclude/header.php');
?>
<!-- End includeing header -->
<!-- slider-start -->
<div class="slider-area">
        <div class="page-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(img/slider/bg1.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Payment Status</h1>
                                <nav class="text-center" aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Payment Status</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <!-- Start Main Content -->
    <div class="container pt-30 pb-100">
        <h2 class="text-center primary-color" my-4>Payment Status</h2>
        <form method="post" action="">
        <div class="form-group row pt-50">
            <lable class="offset-sm-3 col-form-label">Order ID:</lable>
            <div>
                <input type="text" class="form-control mx-3">
            </div>
            
            <div >
                <input type="submit" class="btn btn-primary mx-4 " value="View">
            </div>

        </div>
        </form>
    </div>
    <!-- End Main Content -->

<!-- Start includeing footer -->
<?php
include('./maininclude/footer.php');
?>
<!-- End includeing footer -->