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

<!-- Home Slider Start -->
<?php 
    include 'layout/home_slider.php';
?>
<!-- End Home Slider  -->

<main> 

  <div class="container marketing p-4">
    <div class="row">
          <?php
            $sqlm = mysqli_query($con,"SELECT * FROM main_category ORDER BY main_cat_id LIMIT 4");
            while($rowm =mysqli_fetch_array($sqlm)){
          ?>
        <div class="col-md-6 col-sm-6 col-lg-3 col-6 text-center">
          
          <img src="admin/product/menu/<?php echo $rowm['menu_img']; ?>" class="bd-placeholder-img rounded-circle" width="140" height="140"  role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false" />

            <h2 class="p-3"><a class="btn btn-outline-primary" href="product.php?Action=Show&id=<?=$rowm['main_cat_id'];?>"><?php echo $rowm['main_menu'];?>'s</a></h2>          
        </div>
        <?php }?>
        
    </div>


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <?php 
        $sqli = mysqli_query($con,"SELECT * FROM main_category WHERE main_cat_id=1");
        //$res =mysqli_fetch_assoc($sqli);
        while($rowi=mysqli_fetch_array($sqli)){
      ?>
        <div class="col-md-7">
            <h2 class="featurette-heading"><span class="text-muted"><?php echo $rowi['main_menu'];?></span></h2>
            <hr class="featurette-divider">
            <p class="lead">“Buy what you don’t have yet, or what you really want, which can be mixed with what you already own. Buy only because something excites you, not just for the simple act of shopping.”</p>

            <p class="lead">Shopping is no less than therapy. You might have heard people saying I have just had retail therapy. The kind of happiness, excitement, and satisfaction that comes with shopping is real and undeniable.</p>

            <p class="lead">Shopping enables you to try new brands and products and have many new experiences. Also, consumer demand increases the competition in the market, which contributes to the growth of economic activities.</p>
        </div>
        <div class="col-md-5">
            <img src="admin/product/menu/<?php echo $rowi['menu_img']; ?>" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"  style="height: 500px !important;"/>

        </div>
        <?php }?>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <?php 
        $sqll = mysqli_query($con,"SELECT * FROM main_category WHERE main_cat_id=2");
        //$res =mysqli_fetch_assoc($sqli);
        while($rowl=mysqli_fetch_array($sqll)){
      ?>
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading"><span class="text-muted"><?php echo $rowl['main_menu'];?></span></h2>
            <hr class="featurette-divider">
            <p class="lead">“Buy what you don’t have yet, or what you really want, which can be mixed with what you already own. Buy only because something excites you, not just for the simple act of shopping.”</p>

            <p class="lead">Shopping is no less than therapy. You might have heard people saying I have just had retail therapy. The kind of happiness, excitement, and satisfaction that comes with shopping is real and undeniable.</p>

            <p class="lead">Shopping enables you to try new brands and products and have many new experiences. Also, consumer demand increases the competition in the market, which contributes to the growth of economic activities.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="admin/product/menu/<?php echo $rowl['menu_img']; ?>" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" style="height: 500px !important;"/>

        </div>
        <?php }?>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <?php 
        $sqla = mysqli_query($con,"SELECT * FROM main_category WHERE main_cat_id=3");
        //$res =mysqli_fetch_assoc($sqli);
        while($rowa=mysqli_fetch_array($sqla)){
      ?>
        <div class="col-md-7">
            <h2 class="featurette-heading"><span class="text-muted"><?php echo $rowa['main_menu'];?></span></h2>
            <p class="lead">“Buy what you don’t have yet, or what you really want, which can be mixed with what you already own. Buy only because something excites you, not just for the simple act of shopping.”</p>

            <p class="lead">Shopping is no less than therapy. You might have heard people saying I have just had retail therapy. The kind of happiness, excitement, and satisfaction that comes with shopping is real and undeniable.</p>

            <p class="lead">Shopping enables you to try new brands and products and have many new experiences. Also, consumer demand increases the competition in the market, which contributes to the growth of economic activities.</p>
        </div>
        <div class="col-md-5">
            <img src="admin/product/menu/<?php echo $rowa['menu_img']; ?>" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" style="height: 500px !important;"/>

        </div>
        <?php }?>
    </div>

    <hr class="featurette-divider">

    <!-- END THE FEATURETTES -->

  </div>
  
  <!-- Container --> 

<!-- Footer Start -->

<?php
    include 'layout/footer.php';
?>

</main>

<!-- End Footer -->

<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
</body>
</html>