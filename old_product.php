<?

    error_reporting(0);
	session_start();
	include "admin/config.php";    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JMJain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" >
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
            <h6>Filtter<small class="text-muted">- By - Category</small></h6>
                <form action="" method="POST">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Men's
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Woman's
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Kid's
                        </label>
                    </div>

                    <h6><small class="text-muted">Category</small></h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Top Wear
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Bottom Wear
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Foot Wear
                        </label>
                    </div>

                    <h6><small class="text-muted">Fabrics</small></h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Cotton
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Polyster
                        </label>
                    </div>

                    <h6><small class="text-muted">Size</small></h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            S
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            M
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            L
                        </label>
                    </div>

                    <h6><small class="text-muted">Color</small></h6>
                    <div class="form-check form-check-inline">                       
                        <input class="form-check-input" name="color_code[]" type="checkbox"  id="flexCheckDefault" style="background-color:red;"> 
                    </div>
                    <div class="form-check form-check-inline">                       
                        <input class="form-check-input" name="color_code[]" type="checkbox" height="25" value="<?php echo $row['hex_code']?>" id="flexCheckDefault" style="background-color:yellow;">  
                    </div>
                </form>
            </div>
            <div class="col-md-9 col-sm-9 col-9">
            <?php
                if($_GET['Action']=="Show") {	

                    $id=$_GET['id'];

                    $sql=mysqli_query($con,"SELECT * FROM sub_category  WHERE sub_cat_id='$id'");
                    
                    $row1=mysqli_fetch_array($sql);

                        $main_id=$row1['sub_cat_id'];
                        //echo $row1['sub_cat_id'];
                        $sql2=mysqli_query($con,"SELECT * FROM product  WHERE pro_menu='$main_id'");
                        
                        // while($row=mysqli_fetch_array($sql2)){
                
                    // $sql=mysqli_query($con,"SELECT * FROM product JOIN main_category ON product.pro_menu = main_category.main_cat_id JOIN sub_category ON product.pro_sub = sub_category.sub_cat_id JOIN category ON product.pro_cat = category.cat_id  WHERE pro_id='$id'");
                
                    while($row=mysqli_fetch_array($sql2)){
                ?>
                <div class="col-md-7 shadow p-3 mb-5 bg-body rounded">
                    <h2 class="featurette-heading"><span class="text-muted"><?php echo $row['pro_title'];?></span></h2>
                    <p class="lead"><?php echo $row['descrip'];?></p>
                </div>
                <div class="col-md-5 shadow p-3 mb-5 bg-body rounded">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="admin/product/pro-img/<?php echo $row['pro_img']; ?>" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" />

                </div>
                <?php }}?>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
</body>
</html>