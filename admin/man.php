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

        $sql=mysqli_query($con, "update sub set status='$status' where id='$id'")or die(mysqli_error($con));

        header('location:man.php?msg=success');

    }

       
   	if (isset($_POST["Submit"]) && $_POST["Submit"]) {

        $menu= mysqli_real_escape_string($con,$_POST['menu']);
        $category= mysqli_real_escape_string($con,$_POST['category']);
        $sub_menu= mysqli_real_escape_string($con,$_POST['sub_menu']);        

		$sql = mysqli_query($con,"INSERT INTO sub (menu,category,sub_menu) VALUES ('$menu','$category','$sub_menu')") or die(mysqli_error($con));
		header('location:man.php?msg=Insert Data Successfully');
	}

	if(isset($_POST["Update"])) {
		$id = mysqli_real_escape_string($con,$_POST['id']);
        $menu= mysqli_real_escape_string($con,$_POST['menu']);
        $category= mysqli_real_escape_string($con,$_POST['category']);
        $sub_menu= mysqli_real_escape_string($con,$_POST['sub_menu']);


        mysqli_query($con,"UPDATE sub SET menu='$menu',category='$category',sub_menu='$sub_menu' WHERE id='$id'") or die(mysqli_error($con));
        header('location:man.php?msg=Update Successfully');
    }


    if(isset($_REQUEST['remove']) && $_REQUEST['remove']=="yes"){
        
        $sqlp=mysqli_query($con,"select * from sub where id='$_REQUEST[id]'");
     
        $rowp=mysqli_fetch_array($sqlp);           
     
        mysqli_query($con, "delete from sub where id='$_REQUEST[id]'");   
     
        header("location:man.php?msg=Deleted Successfully");
     
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

                        <h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Product/</span>
                            Manu Management</h4>

                        <div class="card mb-4">
                            <form class="card-body" method="post" action="" enctype="multipart/form-data">
                                <h6 class="fw-normal">Menu </h6>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Main Menu Name</label>
                                        <select id="multicol-country" name="menu" class="select2 form-select"
                                            data-allow-clear="true">
                                            <option value="">Select</option>
                                            <option value="Men">Men's</option>
                                            <option value="Women">Women's</option>
                                            <option value="Kid">Kid's</option>
                                            <option value="Body Care">Body Care</option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Category Name</label>
                                        <select id="multicol-country" name="category" class="select2 form-select"
                                            data-allow-clear="true">
                                            <option value="">Select</option>
                                            <option value="Topwear">Topwear</option>
                                            <option value="Bottomwear">Bottomwear</option>
                                            <option value="Footwear">Footwear</option>                                            
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Category Name</label>
                                        <input type="text" class="form-control" name="sub_menu" placeholder="Enter Sub-Category Name">
                                    </div>
                                </div>                           
                                
                                <div class="pt-4">
                                    <button type="submit" name="Submit" value="Add Record" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                </div>                                
                            </form>
                        </div>

                        <?php }?>

                        <?php 	
                            if(isset($_GET['Action']) && $_GET['Action']=="Update"){  
                            $id2=$_GET['id'];
                            $sqlq="select * from sub where id='$id2'";
                            $rs=mysqli_query($con,$sqlq)or die(mysqli_error($con));
                            $rowq=mysqli_fetch_array($rs);
                            
                        ?>

                        <div class="card mb-4">
                            <h5 class="card-header">Edit/ Main Menu</h5>
                            <form class="card-body" method="post" action="" enctype="multipart/form-data">
                                <h6 class="fw-normal">Menu</h6>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Main Menu Name</label>
                                        <?php
                                            $sqll="SELECT * FROM sub";
                                            $rsl=mysqli_query($con,$sqll)or die(mysqli_error($con));
                                            if(mysqli_num_rows($rsl)>0){
                                        
                                        echo '<select id="multicol-country" name="menu" class="select2 form-select"
                                            data-allow-clear="true">';
                                            while($rowl=mysqli_fetch_assoc($rsl)){ 
                                                
                                           echo "<option {$select} value='{$rowl['menu']}'>{$rowl['menu']}</option>";
                                            }echo "</select>";
                                           
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Main Menu Name</label>
                                        <?php
                                            $sqll="SELECT * FROM sub";
                                            $rsl=mysqli_query($con,$sqll)or die(mysqli_error($con));
                                            if(mysqli_num_rows($rsl)>0){
                                        
                                        echo '<select id="multicol-country" name="category" class="select2 form-select"
                                            data-allow-clear="true">';
                                            while($rowl=mysqli_fetch_assoc($rsl)){ 
                                                
                                           echo "<option {$select} value='{$rowl['category']}'>{$rowl['category']}</option>";
                                            }echo "</select>";
                                           
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Category Name</label>
                                        <input type="text" class="form-control" name="sub_menu" value="<?php echo $rowq['sub_menu'];?>" placeholder="Enter Sub-Category Name">
                                    </div>
                                </div>                       
                                
                                <div class="pt-4">
                                    <input type="hidden" value="<?php echo $rowq['id'];?>" name="id">
                                    <button type="submit" name="Update" value="Update" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                </div>                                
                            </form>
                        </div>

                        <?php }?>

                        <?php 	
                            if(!isset($_GET['Action'])){ 
                            
                        ?>

                        <h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Product/</span>
                            Service Management</h4>

                        <!-- Bootstrap Table with Header - Dark -->
                        <div class="card">
                            
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <h5 class="card-header">Add Product Category</h5><a class="btn btn-outline-success" href="man.php?Action=Add" style="margin:15px;">Add </a>
                                </div>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Menu Name</th>
                                            <th>Category</th>
                                            <th>Sub Menu</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                    <?php
                                        $i=1;
                                        $sql = mysqli_query($con,"SELECT * FROM sub order by id");
                                        while ($row=mysqli_fetch_array($sql) > 0) {
                                    ?>
                                        <tr>
                                            <td><strong><?php echo $i++ ;?></strong></td>
                                            <td><?php echo $row['menu'];?></td> 
                                            <td><?php echo $row['category'];?></td> 
                                            <td><?php echo $row['sub_menu'];?></td> 
                                            
                                            <td>
                                                <a href="man.php?Action=Update&id=<?php echo $row['id']?>" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                <a href="javascript:resume_id('<? echo $row['id']?>')" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i>Delete</a>
                                            </td>
                                        </tr>
                                    <?php }?>    
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation example" style="margin:10px;">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
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