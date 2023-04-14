<?php 
	session_start();
	include ('config.php');

	function clean($string) {
      $string = str_replace(' ', '-', $string);

      return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
   	}
       if(isset($_GET['Action']) && $_GET['Action']=="UpdateStatus"){

        $id= $_GET['id'] ;

        $status= $_GET['status'] ;

        $sql=mysqli_query($con, "update sub_category set status='$status' where sub_cat_id='$id'")or die(mysqli_error($con));

        header('location:sub-category.php?msg=success');

    }


       
   	if (isset($_POST["Submit"]) && $_POST["Submit"]) {

        $main_menu=mysqli_real_escape_string($con,$_POST['main_menu']);
        $sub_menu= mysqli_real_escape_string($con,$_POST['sub_menu']);
        // $img=$_FILES['filestor']['name'];

        // $tmpName=$_FILES['filestor']['tmp_name'];

        // if($img<>"")

        //     {

        //       $ext = strrchr($img, ".");

        //       $prefix=str_replace(" ","-",$name);

        //       $newName = $prefix ."-". substr(md5(rand() * time()), 0, 5) . $ext;
        //       $newName = $prefix ."-". substr(md5(microtime()),rand(0,26),25) .$ext;

        //        move_uploaded_file($tmpName,"product/sub-menu/".$newName);

        //     }
		mysqli_query($con,"INSERT INTO sub_category (main_menu_id,sub_menu,date_reg) VALUES ('$main_menu','$sub_menu',now())") or die(mysqli_error($con));
		header('location:sub-category.php?msg=Insert Data Successfully');
	}

	if(isset($_POST["Update"])) {
		$id = mysqli_real_escape_string($con,$_POST['id']);
        $main_menu=mysqli_real_escape_string($con,$_POST['main_menu']);
        $sub_menu= mysqli_real_escape_string($con,$_POST['sub_menu']);

            $img=$_FILES['filestor']['name'];
            $tmpName=$_FILES['filestor']['tmp_name'];
            $oldimg=$_POST['oldimg'];
    
            if($img<>"")
    
            {
                $ext = strrchr($img, ".");
                $prefix=str_replace(" ","-",$name);
                //$newName = $prefix ."-". substr(md5(rand() * time()), 0, 5) . $ext;
                $newName = $prefix ."-". substr(md5(microtime()),rand(0,26),25) .$ext;
                move_uploaded_file($tmpName,"product/sub-menu/".$newName);
                @unlink("product/sub-menu/".$oldimg); 
                move_uploaded_file($tmpName,"product/sub-menu/".$newName);  
    
            }
            else
            {
            $newName=$oldimg;
            }

        mysqli_query($con,"UPDATE sub_category SET main_menu_id='$main_menu',sub_menu='$sub_menu',sub_img='$newName' WHERE sub_cat_id='$id'") or die(mysqli_error($con));
        header('location:sub-category.php?msg=Update Successfully');
    }


    if(isset($_REQUEST['remove']) && $_REQUEST['remove']=="yes"){

        $sqlp=mysqli_query($con,"select * from sub_category where sub_cat_id='$_REQUEST[id]'");
     
        $rowp=mysqli_fetch_array($sqlp);
     
           
     
        mysqli_query($con, "delete from sub_category where sub_cat_id='$_REQUEST[id]'");   
     
        header("location:sub-category.php?msg=Deleted Successfully");
     
    }
?>

<!DOCTYPE html>

<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin</title>

    <!-- Header -->
    
    <?php
    
      include ('header.php');
    
    ?>

    <!-- Header -->

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <!-- Menu -->

            <?php

                include ('left-menu.php');

            ?>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->

                <?php

                    include ('nav-bar.php');

                ?>

                <!-- / Navbar -->



                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <?php if(isset($_GET['Action']) && $_GET['Action']=="Add"){ ?>

                        <h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Action/</span>
                            Sub Category</h4>

                        <div class="card mb-4">
                            <form class="card-body" method="post" action="" enctype="multipart/form-data">
                                <h6 class="fw-normal">Action </h6>
                                <div class="row g-3 offset-md-2">                                    
                                    <div class="col-md-4">
                                        <label class="form-label" for="multicol-country">Main Menu</label>
                                        <select id="multicol-country" name="main_menu" class="select2 form-select"
                                            data-allow-clear="true" required/>
                                            <option value="">Select</option>
                                            <?php 
                                                $sql1= "SELECT * FROM main_category";
                                                $rs= mysqli_query($con,$sql1) or die("not found");
                                                while($row=mysqli_fetch_assoc($rs)){
                                            ?>
                                            <option value="<?php echo $row['main_cat_id'];?>"><?php echo $row['main_menu'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Sub Category Name</label>
                                        <input type="text" name="sub_menu" class="form-control" placeholder="Sub Menu Category" required/>
                                    </div>
                                </div>                           
                                
                                <div class="pt-4 offset-md-2">
                                    <button type="submit" name="Submit" value="Add Record" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                </div>                                
                            </form>
                        </div>

                        <?php }?>

                        <?php 	
                            if(isset($_GET['Action']) && $_GET['Action']=="Update"){  
                            $id2=$_GET['id'];
                            $sqlq="select * from sub_category where sub_cat_id='$id2'";
                            $rs=mysqli_query($con,$sqlq)or die(mysqli_error($con));
                            $rowq=mysqli_fetch_array($rs);
                            
                        ?>

                        <div class="card mb-4">
                            <h5 class="card-header">Edit/ Sub Menu Category</h5>
                            <form class="card-body" method="post" action="" enctype="multipart/form-data">
                                <h6 class="fw-normal">Service</h6>
                                <div class="row g-3 offset-md-2">
                                    <div class="col-md-4">
                                        <label class="form-label" for="multicol-country">Main Menu</label>                                        
                                        <?php
                                            $sqlm="SELECT * FROM main_category";
                                            $rsm=mysqli_query($con,$sqlm)or die(mysqli_error($con));
                                            if(mysqli_num_rows($rsm)>0){
                                        
                                        echo '<select id="multicol-country" name="main_menu" class="select2 form-select"
                                            data-allow-clear="true">';
                                            while($rowm=mysqli_fetch_assoc($rsm)){ 
                                                if($rowq['main_menu_id'] == $rowm['main_cat_id']){
                                                    $select = "selected";
                                                }else{
                                                    $select = "";
                                                }

                                           echo "<option {$select} value='{$rowm['main_cat_id']}'>{$rowm['main_menu']}</option>";
                                            }echo "</select>";
                                           
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Sub Category Name</label>
                                        <input type="text" class="form-control" name="sub_menu" value="<?php echo $rowq['sub_menu'];?>">
                                    </div>
                                </div>                       
                                
                                <div class="pt-4 offset-md-2">
                                    <input type="hidden" value="<?php echo $rowq['sub_cat_id'];?>" name="id">
                                    <button type="submit" name="Update" value="Update" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                </div>                                
                            </form>
                        </div>

                        <?php }?>

                        <?php 	
                            if(!isset($_GET['Action'])){ 
                                
                            
                        ?>

                        <h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Action/</span>
                            Sub Category Management</h4>

                        <!-- Bootstrap Table with Header - Dark -->
                        
                        <div class="card">
                       
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <h5 class="card-header">Add Category</h5><a class="btn btn-outline-success" href="sub-category.php?Action=Add" style="margin:15px;">Add </a>
                                </div>
                            </div>
                            <?php
                                $limit = 6;
                                if(isset($_GET['page'])){
                                    $page = $_GET['page'];
                                }else{
                                    $page = 1;
                                }
                                $offset = ($page - 1) * $limit;
                                
                                $sqlp = "SELECT * FROM `sub_category` ORDER BY sub_cat_id DESC LIMIT {$offset},{$limit}";
                                $page_res = mysqli_query($con,$sqlp) or die(mysqli_error($con));
                                if(mysqli_num_rows($page_res) > 0){
                            ?>
                            
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Main Menu</th>
                                            <th>Sub Menu</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                    <?php                                    
                                        
                                        $sql = mysqli_query($con,"SELECT * FROM sub_category JOIN main_category ON sub_category.main_menu_id = main_category.main_cat_id order by sub_cat_id ASC LIMIT {$offset},{$limit}");
                                        while ($rowd=mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td><strong><?php echo $rowd['sub_cat_id'];?></strong></td>
                                            <td><?php echo $rowd['main_menu'];?></td> 
                                            <td><?php echo $rowd['sub_menu'];?></td>                
                                            <td>
                                                <a href="sub-category.php?Action=Update&id=<?php echo $rowd['sub_cat_id']?>" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                <a href="javascript:resume_id('<? echo $rowd['sub_cat_id']?>')" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i>Delete</a>
                                            </td>
                                        </tr>
                                    <?php }?>    
                                    </tbody>
                                </table>
                            </div>
                            
                            <nav aria-label="Page navigation example" style="margin:10px;">
                            <?php
                                $pagi = "SELECT * FROM `sub_category`";
                                $result = mysqli_query($con,$pagi) or die(mysqli_error($con));
                                if(mysqli_num_rows($result) > 0){
                                    $total_record = mysqli_num_rows($result);
                                    $total_page = ceil($total_record / $limit);
                                    echo '<ul class="pagination justify-content-center">';
                                    if($page > 1){
                                        echo '<li class="page-item"><a class="page-link" href="sub-category.php?page='.($page - 1).'">Prev</a></li>';
                                    }
                                    for($p = 1; $p <=$total_page; $p++){
                                        if($p == $page){
                                            $active = "active";
                                        }else{
                                            $active = "";
                                        }
                                        echo '<li class="page-item '.$active.'"> <a class="page-link" href="sub-category.php?page='.$p.'">'.$p.'</a></li>';
                                                  
                                    }if($total_page > $page){
                                        echo '<li class="page-item"><a class="page-link" href="sub-category.php?page='.($page + 1).'">Next</a></li>';
                                    }
                                    echo '</ul>';
                                }
                            
                            ?>
                                
                            </nav>
                            
                          <?php }?>  
                        </div>

                        <?php } ?>
                        <!--/ Bootstrap Table with Header Dark -->

                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php
            
                      include ('footer.php');
                    
                    ?>
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>



        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>


        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->


    <div class="buy-now">
        <a href="" target="_blank" class="btn btn-danger btn-buy-now">Chat Now</a>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/libs/hammer/hammer.js"></script>


    <script src="assets/vendor/libs/i18n/i18n.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>
</body>

</html>

<script type="text/javascript">
   function resume_id(res_id){

   var agree=confirm("This will record.  Are you sure you wish to continue?");
   if (agree) {
   window.location.href='<?php echo $_SERVER['PHP_SELF']; ?>?remove=yes&id='+res_id;
   window.submit();
   }
   else {

   }
   }

</script>