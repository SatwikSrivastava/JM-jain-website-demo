<?php
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
  </head>
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
        <img src="admin/image/7.png" class="d-block w-100" alt="blog">
      </div>
    </div>
  </div>  

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
          $sql=mysqli_query($con, "select * from blog where status = 'Active' ");
          while($row=mysqli_fetch_array($sql)){
        ?>
        <div class="col">
          <div class="card shadow p-3 mb-5 bg-body rounded">
            <img src="admin/upload/<?php echo $row['images']; ?>"/>

            <div class="card-body">
              <div class="card-title">
                <h5 class="text-info"><?php echo $row['title'];?></h5>
                <p>Publish-By : <span><?php echo $row['author'];?></span></p>
              </div>
              <p class="card-text"><?php echo $row['short_details']; ?></p>
              <a href="blog-details.php?Action=Show&id=<?=$row['id'];?>">Read more</a>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Comment</button>
                </div>
                <small class="text-muted">9</small>
              </div>
            </div>
          </div>
        </div>
        <?php }?>
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