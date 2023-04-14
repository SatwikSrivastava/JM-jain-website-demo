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
                <img src="admin/image/9.png" class="d-block w-100" alt="product">
            </div>
        </div>
    </div>
    <div class="container marketing p-4">
        
        <div class="row">
            <?php
            include ("admin/config.php"); 
                if($_GET['Action']=="Show") {	

                    $id=$_GET['id'];
                
                    $sql=mysqli_query($con,"SELECT * FROM category  WHERE cat_id='$id'");
                    
                    $row1=mysqli_fetch_array($sql);

                        $main_id=$row1['cat_id'];
                        $sql2=mysqli_query($con,"SELECT * FROM sub_category  WHERE main_menu_id='$main_id'");
                        
                        while($row=mysqli_fetch_array($sql2)){
                            //echo $row['pro_sub'];

            ?>
            <div class="col-md-6 col-sm-6 col-lg-3 col-6 text-center">
            
                <img src="admin/product/sub-menu/<?php echo $row['sub_img']; ?>" class="bd-placeholder-img rounded-circle" width="140" height="140"  role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false" />

                <h6 class="title p-2"><a class="btn btn-outline-success" href="product-details.php?Action=Show&id=<?php echo $row['sub_cat_id'];?>"><span><?php echo $row['sub_menu'];?></span></a></h6>
            
            </div>
            <?php }}?>
        </div>
        
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