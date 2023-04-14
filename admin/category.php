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

        $sql=mysqli_query($con, "update category set status='$status' where u_id='$id'")or die(mysqli_error($con));

        header('location:category.php?msg=success');

    }

   	if (isset($_POST["Submit"]) && $_POST["Submit"]) {

        $category= mysqli_real_escape_string($con,$_POST['category']);

		mysqli_query($con,"INSERT INTO category (cat_name,date_reg) VALUES ('$category',now())") or die(mysqli_error($con));
		header('location:category.php?msg=Insert Data Successfully');
	}

	if(isset($_POST["Update"])) {
		$id = mysqli_real_escape_string($con,$_POST['id']);
        $category= mysqli_real_escape_string($con,$_POST['category']);


        mysqli_query($con,"UPDATE category SET cat_name='$category' WHERE cat_id='$id'") or die(mysqli_error($con));
        header('location:category.php?msg=Update Successfully');
    }


    if(isset($_REQUEST['remove']) && $_REQUEST['remove']=="yes"){
   		mysqli_query($con, "delete from category where u_id='$_REQUEST[id]'");

   		header("location:category.php?msg=Deleted Successfully");
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

                        <h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Category/</span>
                             Management</h4>

                        <div class="card mb-4">
                            <h5 class="card-header">Category</h5>
                            <form class="card-body" method="post" action="">
                                <h6 class="fw-normal">2. Category Info</h6>
                                <div class="row g-3">
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
                                            <option  value="<?php echo $row['main_cat_id'];?>"><?php echo $row['main_menu'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="multicol-country">Sub Menu</label>
                                        <select id="multicol-country" name="main_menu" class="select2 form-select"
                                            data-allow-clear="true" required/>
                                            <option value="">Select</option>
                                            <?php 
                                                $main_cat_id = $_POST['main_cat_id'];
                                                $sqls= "SELECT * FROM sub_category JOIN main_category ON sub_category.main_menu_id = main_category.main_cat_id WHERE main_menu_id=main_cat_id";
                                                $rss= mysqli_query($con,$sqls) or die("not found");
                                                while($rows=mysqli_fetch_assoc($rss)){
                                            ?>
                                            <option value="<?php echo $rows['main_cat_id'];?>"><?php echo $rows['sub_menu'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" >Category Name</label>
                                        <input type="text" class="form-control" name="category" placeholder="Category Name" required/>
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
                            $sql2="select * from category where cat_id='$id2'";
                            $rs1=mysqli_query($con,$sql2)or die(mysqli_error($con));
                            $row1=mysqli_fetch_array($rs1);
                            
                        ?>

                        <div class="card mb-4">
                            <h5 class="card-header">Category</h5>
                            <form class="card-body" method="post" action="">
                                <h6 class="fw-normal">Category Details</h6>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label" >Category Name</label>
                                        <?php
                                            $sqll="SELECT * FROM category";
                                            $rsl=mysqli_query($con,$sqll)or die(mysqli_error($con));
                                            if(mysqli_num_rows($rsl)>0){
                                        
                                        echo '<select id="multicol-country" name="category" class="select2 form-select"
                                            data-allow-clear="true">';
                                            while($rowl=mysqli_fetch_assoc($rsl)){ 
                                                
                                           echo "<option {$select} value='{$rowl['cat_name']}'>{$rowl['cat_name']}</option>";
                                            }echo "</select>";
                                           
                                        }
                                        ?>
                                    </div>
                                                                
                                </div>                           
                                
                                <div class="pt-4">
                                    <input type="hidden" value="<?php echo $row1['cat_id'];?>" name="id">
                                    <button type="submit" name="Update" value="Update" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                </div>                                
                            </form>
                        </div>

                        <?php }?>

                        <?php 	
                            if(!isset($_GET['Action'])){ 
                            
                        ?>


                        <h4 class="py-3 breadcrumb-wrapper mb-4">
                            <span class="text-muted fw-light">Category /</span> List 
                        </h4>

                        <!-- Bootstrap Table with Header - Dark -->
                        <div class="card">
                            
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <h5 class="card-header">Category Management</h5><a class="btn btn-outline-success" href="category.php?Action=Add" style="margin:15px;">Add Category</a>
                                </div>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                    <?php
                                        $i=1;
                                        $sql = mysqli_query($con,"SELECT * FROM category order by cat_id");
                                        while ($rowd=mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $rowd['cat_name'];?></td>
                                            <td>
                                                <a href="category.php?Action=Update&id=<?php echo $rowd['cat_id']?>" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                <a href="javascript:resume_id('<? echo $rowd['cat_id']?>')" class="btn btn-outline-warning"><i class="fa-solid fa-trash-can"></i>Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>    
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