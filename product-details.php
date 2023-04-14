<?

error_reporting(0);
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JMJain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="theme-color" content="#7952b3">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="assets/style.css" rel="stylesheet">

    <script src="demo/js/jquery-1.10.2.min.js"></script>
    <script src="demo/js/jquery-ui.js"></script>
    <script src="demo/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="demo/css/bootstrap.min.css">
    <link href="demo/css/jquery-ui.css" rel="stylesheet">
    <link href="demo/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Section Start -->
    <?php
    include 'layout/navbar.php';
    ?>
    <!-- End Navbar -->
    <main>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="admin/image/4.png" class="d-block w-100" alt="product_details">
                </div>
            </div>
        </div>
        <div class="container marketing p-4">
            <input type="button" class="btn btn-primary" value="Back" onClick="history.go(-1);">
            <hr class="featurette-divider">
            <div class="row featurette">
                <div class="col-md-3 col-sm-3 col-12 mt-3">
                    <div class="list-group">
                        <h6>Filtter<small class="text-muted">- By - Category</small></h6>
                        <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                            include('config.php');
                            $query = "SELECT DISTINCT(main_menu) FROM main_category ORDER BY main_cat_id";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach ($result as $row) {
                            ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="checkbox" name="main" class="common_selector main" value="<?php echo $row['main_menu']; ?>"> <?php echo $row['main_menu']; ?></label>
                                </div>
                            <?php
                            }

                            ?>
                        </div>
                    </div>

                    <div class="list-group">
                        <h6>Category</h6>
                        <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php

                            $query = "SELECT DISTINCT(sub_menu) FROM sub_category ORDER BY sub_cat_id";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach ($result as $row) {
                            ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="checkbox" name="sub" class="common_selector sub" value="<?php echo $row['sub_menu']; ?>"> <?php echo $row['sub_menu']; ?></label>
                                </div>
                            <?php
                            }

                            ?>
                        </div>
                    </div>

                    <div class="list-group">
                        <h6>Category</h6>
                        <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                            $query = "SELECT DISTINCT(cat_name) FROM category ORDER BY cat_id";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach ($result as $row) {
                            ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="checkbox" name="cat" class="common_selector cat" value="<?php echo $row['cat_name']; ?>"> <?php echo $row['cat_name']; ?></label>
                                </div>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="list-group">
                        <h6>Color</h6>
                        <div style="height: 200px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                            $query = "SELECT * FROM color ORDER BY id";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach ($result as $row) {
                            ?>
                                <div class="form-check ">
                                    <label><input class="common_selector form-check-input " name="color_code[]" type="checkbox" height="25" value="<?php echo $row['hex_code'] ?>" id="flexCheckDefault" style="background-color:<?= $row['hex_code']; ?>"> <?php echo $row['color_name']; ?></label>
                                </div>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-9">
                    <div class="row filter_data">

                    </div>
                </div>
            </div>
            <hr class="featurette-divider">
        </div>
    </main>

    <!-- Footer Start -->

    <?php
    include 'layout/footer.php';
    ?>

    <!-- End Footer -->
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {

            filter_data();

            function filter_data() {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var action = 'fetch_data';

                var main = get_filter('main');
                var sub = get_filter('sub');
                var cat = get_filter('cat');
                $.ajax({
                    url: "fetch_data.php",
                    method: "POST",
                    data: {
                        action: action,
                        main: main,
                        sub: sub,
                        cat: cat
                    },
                    success: function(data) {
                        $('.filter_data').html(data);
                    }
                });
            }

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function() {
                filter_data();
            });

        });
    </script>
    <style>
        .clr {
            height: 25px;
            width: 25px;
        }
    </style>
</body>

</html>