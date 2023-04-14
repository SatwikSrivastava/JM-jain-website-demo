<?

error_reporting(0);

	session_start();

	include "admin/config.php";

  if($_GET['Action']=="Show") {	

	$id=$_GET['id'];

	$sql=mysqli_query($con,"select * from blog where id='$id'");

	$row=mysqli_fetch_array($sql);

}

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
        <img src="admin/image/8.png" class="d-block w-100" alt="blog">
      </div>
    </div>
  </div>
  <div class="container marketing p-4">

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
          <div class="card shadow p-3 mb-5 bg-body rounded">
            <div class="card-body">
              <div class="card-title">
                <h4 class="featurette-heading"><span class="text-muted"><? echo $row['title']; ?></span></h4>
              </div>
              <div class="card-details">
                <p class="lead"><? echo $row['details']; ?></p>
              </div>
            </div>
          </div>  
        </div>

        <div class="col-md-5">
          <div class="card shadow p-3 mb-5 bg-body rounded">
            <img src="admin/upload/<?php echo $row['images']; ?>" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"/>
          </div>
        </div>
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