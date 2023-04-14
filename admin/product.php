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

        $sql=mysqli_query($con, "update product set status='$status' where pro_id='$id'")or die(mysqli_error($con));

        header('location:product.php?msg=success');

    }

   	if (isset($_POST["Submit"]) && $_POST["Submit"]) {

        $main= mysqli_real_escape_string($con,$_POST['main']);
        $sub= mysqli_real_escape_string($con,$_POST['sub']);
        $category= mysqli_real_escape_string($con,$_POST['cat']);
        $title= mysqli_real_escape_string($con,$_POST['title']);
        $hsn= mysqli_real_escape_string($con,$_POST['hsn']);
        $details= mysqli_real_escape_string($con,$_POST['details']);
        $description= mysqli_real_escape_string($con,$_POST['description']);

        $img=$_FILES['filestor']['name'];

        $tmpName=$_FILES['filestor']['tmp_name'];

        if($img<>"")

            {

              $ext = strrchr($img, ".");

              $prefix=str_replace(" ","-",$name);

              $newName = $prefix ."-". substr(md5(rand() * time()), 0, 5) . $ext;

                move_uploaded_file($tmpName,"product/pro-img/".$newName);

            }

		mysqli_query($con,"INSERT INTO product (pro_menu,pro_sub,pro_cat,pro_title,hsn_code,pro_img,pro_details,descrip,date_reg) VALUES ('$main','$sub','$category','$title','$hsn','$newName','$details','$description',now())") or die(mysqli_error($con));
		header('location:product.php?msg=Insert Data Successfully');
	}

	if(isset($_POST["Update"])) {
		$id = mysqli_real_escape_string($con,$_POST['id']);
        $main= mysqli_real_escape_string($con,$_POST['main']);
        $sub= mysqli_real_escape_string($con,$_POST['sub']);
        $category= mysqli_real_escape_string($con,$_POST['cat']);
        $title= mysqli_real_escape_string($con,$_POST['title']);
        $hsn= mysqli_real_escape_string($con,$_POST['hsn']);
        $details= mysqli_real_escape_string($con,$_POST['details']);
        $description= mysqli_real_escape_string($con,$_POST['description']);

        $img=$_FILES['filestor']['name'];
            $tmpName=$_FILES['filestor']['tmp_name'];
            $oldimg=$_POST['oldimg'];
    
            if($img<>"")
    
            {
                $ext = strrchr($img, ".");
                $prefix=str_replace(" ","-",$name);
                $newName = $prefix ."-". substr(md5(rand() * time()), 0, 5) . $ext;                
                move_uploaded_file($tmpName,"product/pro-img/".$newName);
                @unlink("product/pro-img/".$oldimg); 
                move_uploaded_file($tmpName,"product/pro-img/".$newName);  
    
            }
            else
            {
            $newName=$oldimg;
            }


        mysqli_query($con,"UPDATE product SET pro_menu='$main',pro_sub='$sub',pro_cat='$category',pro_title='$title',hsn_code='$hsn',pro_img='$newName',pro_details='$details',descrip='$description' WHERE pro_id='$id'") or die(mysqli_error($con));
        header('location:product.php?msg=Update Successfully');
    }


    if(isset($_REQUEST['remove']) && $_REQUEST['remove']=="yes"){

        $sqld=mysqli_query($con,"select * from product where pro_id='$_REQUEST[id]'");
     
        $rowd=mysqli_fetch_array($sqld);
     
        $oldimg=$rowd['images'];   
     
           @unlink("product/sub-menu/".$oldimg);    
     
        mysqli_query($con, "delete from product where pro_id='$_REQUEST[id]'");   
     
        header("location:product.php?msg=Deleted Successfully");
     
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
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
      <script>tinymce.init({
         selector: 'textarea',
         height: 300,
         theme: 'modern',
         plugins: 'print preview fullpage   searchreplace autolink directionality   visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc   advlist lists textcolor wordcount     imagetools      contextmenu colorpicker textpattern help',
         toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
         image_advtab: true,
         templates: [
           { title: 'Test template 1', content: 'Test 1' },
           { title: 'Test template 2', content: 'Test 2' }
         ],
         content_css: [
           '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
           '//www.tinymce.com/css/codepen.min.css'
                ]
             });

      </script>

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
                             Management</h4>

                        <div class="card mb-4">
                            <h5 class="card-header">Product</h5>
                            <form class="card-body" method="post" action="" enctype="multipart/form-data">
                                <h6 class="fw-normal">2. Product Info</h6>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="multicol-country">Main Menu</label>
                                        <select id="multicol-country" name="main" class="select2 form-select"
                                            data-allow-clear="true">
                                            <option value="">Select</option>
                                            <?php 
                                                $sql1= "SELECT * FROM main_category";
                                                $rs1= mysqli_query($con,$sql1) or die("not found");
                                                while($row1=mysqli_fetch_assoc($rs1)){
                                            ?>
                                            <option value="<?php echo $row1['main_cat_id'];?>"><?php echo $row1['main_menu'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="multicol-country">Sub Menu</label>
                                        <select id="multicol-country" name="sub" class="select2 form-select"
                                            data-allow-clear="true">
                                            <option value="">Select</option>
                                            <?php 
                                                $sql2= "SELECT * FROM sub_category";
                                                $rs2= mysqli_query($con,$sql2) or die("not found");
                                                while($row2=mysqli_fetch_assoc($rs2)){
                                            ?>
                                            <option value="<?php echo $row2['sub_cat_id'];?>"><?php echo $row2['sub_menu'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="multicol-country">Product Category</label>
                                        <select id="multicol-country" name="cat" class="select2 form-select"
                                            data-allow-clear="true">
                                            <option value="">Select</option>
                                            <?php 
                                                $sql3= "SELECT * FROM category";
                                                $rs3= mysqli_query($con,$sql3) or die("not found");
                                                while($row3=mysqli_fetch_assoc($rs3)){
                                            ?>
                                            <option value="<?php echo $row3['cat_id'];?>"><?php echo $row3['cat_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" >Product Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Enter Product Title*" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" >HSN - Code</label>
                                        <input type="text" name="hsn" id="hsn" class="form-control"
                                            placeholder="Enter Product HSN-Code*" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="filestor" id="photo" class="form-control"
                                            placeholder="Upload Images" />
                                    </div>
                                    <div class="col-md-12">                                        
                                        <label class="form-label" for="multicol-phone">Product Details</label>
                                        <div class="input-group input-group-merge">
                                            <textarea  type="text" name="details" id="details" class="form-control"
                                            placeholder="Details"></textarea >
                                        </div>
                                    </div>  
                                    <div class="col-md-12">                                        
                                        <label class="form-label" for="multicol-phone">Product Description</label>
                                        <div class="input-group input-group-merge">
                                            <textarea  type="text" name="description" id="description" class="form-control"
                                            placeholder="description"></textarea >
                                        </div>
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
                            $sql4="SELECT * FROM product WHERE pro_id='$id2'";
                            $rs4=mysqli_query($con,$sql4)or die(mysqli_error($con));
                            $row4=mysqli_fetch_array($rs4);
                            
                        ?>

                        <div class="card mb-4">
                            <h5 class="card-header">Product</h5>
                            <form class="card-body" method="post" action="" enctype="multipart/form-data">
                                <h6 class="fw-normal">Product Details</h6>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="multicol-country">Main Menu</label>                                        
                                        <?php
                                            $sql5="SELECT * FROM main_category";
                                            $rs5=mysqli_query($con,$sql5)or die(mysqli_error($con));
                                            if(mysqli_num_rows($rs5)>0){
                                        
                                        echo '<select id="multicol-country" name="main" class="select2 form-select"
                                            data-allow-clear="true">';
                                            while($row5=mysqli_fetch_assoc($rs5)){ 
                                                if($row4['pro_menu'] == $row5['main_cat_id']){
                                                    $select = "selected";
                                                }else{
                                                    $select = "";
                                                }

                                           echo "<option {$select} value='{$row5['main_cat_id']}'>{$row5['main_menu']}</option>";
                                            }echo "</select>";
                                           
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="multicol-country">Sub Menu Category</label>                                        
                                        <?php
                                            $sql6="SELECT * FROM sub_category";
                                            $rs6=mysqli_query($con,$sql6)or die(mysqli_error($con));
                                            if(mysqli_num_rows($rs6)>0){
                                        
                                        echo '<select id="multicol-country" name="sub" class="select2 form-select"
                                            data-allow-clear="true">';
                                            while($row6=mysqli_fetch_assoc($rs6)){ 
                                                if($row4['pro_sub'] == $row6['sub_cat_id']){
                                                    $select = "selected";
                                                }else{
                                                    $select = "";
                                                }

                                           echo "<option {$select} value='{$row6['sub_cat_id']}'>{$row6['sub_menu']}</option>";
                                            }echo "</select>";
                                           
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="multicol-country">Product Category</label>                                        
                                        <?php
                                            $sql7="SELECT * FROM category";
                                            $rs7=mysqli_query($con,$sql7)or die(mysqli_error($con));
                                            if(mysqli_num_rows($rs7)>0){
                                        
                                        echo '<select id="multicol-country" name="cat" class="select2 form-select"
                                            data-allow-clear="true">';
                                            while($row7=mysqli_fetch_assoc($rs7)){ 
                                                if($row4['pro_cat'] == $row7['cat_id']){
                                                    $select = "selected";
                                                }else{
                                                    $select = "";
                                                }

                                           echo "<option {$select} value='{$row7['cat_id']}'>{$row7['cat_name']}</option>";
                                            }echo "</select>";
                                           
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" >Product Title</label>
                                        <input type="text" name="title" value="<?php echo $row4['pro_title'];?>" id="title" class="form-control"
                                            placeholder="Product Title" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" >HSN - Code</label>
                                        <input type="text" name="hsn" value="<?php echo $row4['hsn_code'];?>" id="title" class="form-control"
                                            placeholder="Product HSN-Code" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Image</label>
                                        <img src="product/pro-img/<? echo $row4['pro_img']; ?>" width="20">
                                        <input type="file"  name="filestor"  class="form-control">
                                        <input type="hidden" name="oldimg" value="<? echo $row4['pro_img']; ?>">
                                    </div>
                                    <div class="col-md-12">                                        
                                        <label class="form-label" for="multicol-phone">Product Details</label>
                                        <div class="input-group input-group-merge">
                                            <textarea name="details" rows="25" class="form-control"><?php echo $row4['pro_details'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">                                        
                                        <label class="form-label" for="multicol-phone">Description</label>
                                        <div class="input-group input-group-merge">
                                            <textarea name="description" rows="25" class="form-control"><?php echo $row4['descrip'];?></textarea>
                                        </div>
                                    </div>
                                                                
                                </div>                           
                                
                                <div class="pt-4">
                                    <input type="hidden" value="<?php echo $row4['pro_id'];?>" name="id">
                                    <button type="submit" name="Update" value="Update" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                </div>                                
                            </form>
                        </div>

                        <?php }?>

                        <?php 	
                            if(!isset($_GET['Action'])){ 
                            
                        ?>


                        <h4 class="py-3 breadcrumb-wrapper mb-4">
                            <span class="text-muted fw-light">Product /</span> List 
                        </h4>

                        <!-- Bootstrap Table with Header - Dark -->
                        <div class="card">
                            
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <h5 class="card-header">Product Management</h5><a class="btn btn-outline-success" href="product.php?Action=Add" style="margin:15px;">Add Product</a>
                                </div>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Main Mene</th>
                                            <th>Sub Menu</th>
                                            <th>Category</th>
                                            <th>Prodcut</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                    <?php
                                        $i=1;
                                        $sql8 = mysqli_query($con,"SELECT * FROM product JOIN main_category ON product.pro_menu = main_category.main_cat_id JOIN sub_category ON product.pro_sub = sub_category.sub_cat_id JOIN category ON product.pro_cat = category.cat_id order by pro_id");
                                        while ($rowd=mysqli_fetch_array($sql8)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><strong><?php echo $rowd['main_menu'];?></strong></td>
                                            <td><?php echo $rowd['sub_menu'];?></td>
                                            <td><?php echo $rowd['cat_name'];?></td>
                                            <th><?php echo $rowd['pro_title'];?></th>
                                            <td><img src="product/pro-img/<?= $rowd['pro_img']?>" alt="main menu" width="50px"></td>
                                            <td>
                                                <a href="product.php?Action=Update&id=<?php echo $rowd['pro_id']?>" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                <a href="javascript:resume_id('<? echo $rowd['pro_id']?>')" class="btn btn-outline-warning"><i class="fa-solid fa-trash-can"></i>Delete</a>
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