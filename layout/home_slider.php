<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  
  <div class="carousel-inner">
  <?php 
    include ('admin/connection/config.php');
    $a=1;
    $sql=mysqli_query($con,"select * from banner where status = 'Active'");
    while($row=mysqli_fetch_array($sql)){
      
  ?>
    <div class="carousel-item <?php if($a==1){?>active<?php }?>">
      <img src="admin/banner/<?php echo $row['images'];?>" class="d-block w-100" alt="home-slider">
      <div class="carousel-caption d-none d-md-block">
        <h5><?php echo $row['b_title'];?></h5>
        <p><?php echo $row['b_details'];?></p>
      </div>
    </div>
    
  <?php $a++;}?>    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<style>
    .w-100{
        height:620px;
    }
</style>