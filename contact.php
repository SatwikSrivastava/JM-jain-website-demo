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
        <img src="admin/image/1.png" class="d-block w-100" alt="contact">
      </div>
    </div>
  </div>

  <section class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="col-md-12 p-lg-2 mx-auto my-2">
                <h1 class="text-primary">Contact - Us</h1>      
            </div>
            <form>
                <div class="row mb-4">
                    <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example1">First name</label>
                        <input type="text" id="form3Example1" class="form-control" />                        
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example2">Last name</label>
                        <input type="text" id="form3Example2" class="form-control" />
                    </div>
                    </div>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Email address</label>
                    <input type="email" id="form3Example3" class="form-control" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Messege</label>
                    <textarea type="text" id="form3Example4" class="form-control"></textarea>
                </div>          

                <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>   
                
            </form>
        </div>
      </div>
  </section>

</main> 

<!-- Footer -->
<?php
    include 'layout/footer.php';
?>
<!-- End Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
</body>
</html>