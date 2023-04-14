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
        
        $sql=mysqli_query($con, "update blog set status='$status' where id='$id'")or die(mysqli_error($con));
    
        header('location:blog.php?msg=success');
 
    }

   	if (isset($_POST["Submit"]) && $_POST["Submit"]) {

        $title= mysqli_real_escape_string($con,$_POST['title']);
        $author= mysqli_real_escape_string($con,$_POST['author']);
        $short_details= mysqli_real_escape_string($con,$_POST['short_details']);
        $details= mysqli_real_escape_string($con,$_POST['details']);
        $img=$_FILES['filestor']['name'];

        $tmpName=$_FILES['filestor']['tmp_name'];

        if($img<>"")

            {

              $ext = strrchr($img, ".");

              $prefix=str_replace(" ","-",$name);

              $newName = $prefix ."-". substr(md5(rand() * time()), 0, 5) . $ext;

               move_uploaded_file($tmpName,"upload/".$newName);

            }
        

		mysqli_query($con,"INSERT INTO blog (title,author,short_details,details,images,date) VALUES ('$title','$author','$short_details','$details','$newName',now())") or die(mysqli_error($con));
		header('location:blog.php?msg=Insert Data Successfully');
	}

    // if(isset($_POST["Show"]) && $_POST["Show"]){
    //     $comment= mysqli_real_escape_string($con,$_POST['comment']);
    //      mysqli_query($con,"INSERT INTO comment(comments) VALUES ('$comment')") or die(mysqli_error($con));
    //      header('location:blog.php?msg=Comment Data save');
    // }

	if(isset($_POST["Update"])) {
		$id = mysqli_real_escape_string($con,$_POST['id']);
        $title= mysqli_real_escape_string($con,$_POST['title']);
        $author= mysqli_real_escape_string($con,$_POST['author']);
        $short_details= mysqli_real_escape_string($con,$_POST['short_details']);
        $details= mysqli_real_escape_string($con,$_POST['details']);

        $img=$_FILES['filestor']['name'];
        $tmpName=$_FILES['filestor']['tmp_name'];
        $oldimg=$_POST['oldimg'];

        if($img<>"")

        {
            $ext = strrchr($img, ".");
            $prefix=str_replace(" ","-",$name);
            $newName = $prefix ."-". substr(md5(rand() * time()), 0, 5) . $ext;
            move_uploaded_file($tmpName,"upload/".$newName);
            @unlink("upload/".$oldimg); 
            move_uploaded_file($tmpName,"upload/".$newName);  

        }
        else
        {
        $newName=$oldimg;
        }


        mysqli_query($con,"UPDATE blog SET title='$title',author='$author',short_details='$short_details',details='$details', images='$newName' WHERE id='$id'") or die(mysqli_error($con));
        header('location:blog.php?msg=Update Successfully');
    }


    if(isset($_REQUEST['remove']) && $_REQUEST['remove']=="yes"){

        $sqlp=mysqli_query($con,"select * from blog where id='$_REQUEST[id]'");
     
        $rowp=mysqli_fetch_array($sqlp);
     
        $oldimg=$rowp['images'];   
     
           @unlink("upload/".$oldimg);    
     
        mysqli_query($con, "delete from blog where id='$_REQUEST[id]'");   
     
        header("location:blog.php?msg=Deleted Successfully");
     
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

                        <h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Forms/</span>
                            Blog Management</h4>

                        <div class="card mb-4">
                            <form class="card-body" method="post" action="" enctype="multipart/form-data">
                                <h6 class="fw-normal">Blog Details</h6>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="john.doe" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Author</label>
                                        <input type="text" name="author" id="author" class="form-control"
                                            placeholder="Author" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="filestor" id="photo" class="form-control"
                                            placeholder="Upload Images" />
                                    </div>
                                    <div class="col-md-12">
                                        
                                        <label class="form-label" for="multicol-phone">Short Details</label>
                                        <div class="input-group input-group-merge">
                                            <textarea  type="text" name="short_details" id="text" class="form-control phone-mask"
                                            placeholder="Short Details" aria-label="Short Details"></textarea >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        
                                        <label class="form-label" for="multicol-phone">Details</label>
                                        <div class="input-group input-group-merge">
                                            <textarea  type="details" name="details" id="details" class="form-control"
                                            placeholder="Details"></textarea >
                                        </div>
                                    </div>
                                </div>                   
                                
                                <div class="pt-4">
                                    <button type="submit" name="Submit" value="Add Record" class="btn btn-outline-primary me-sm-3 me-1">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary">Clear</button>
                                </div>                                
                            </form>
                        </div>

                        <?php }?>

                        <?php	
                            if(isset($_GET['Action']) && $_GET['Action']=="Update"){  
                           
                            $id2=$_GET['id'];
                            $sql2="select * from blog where id='$id2'";
                            $rs1=mysqli_query($con,$sql2)or die(mysqli_error($con));
                            $row1=mysqli_fetch_array($rs1);
                            
                        ?>

                        <div class="card mb-4">
                            <h5 class="card-header">Blog</h5>
                            <form class="card-body" method="post" action="">
                                <h6 class="fw-normal">Blog Details</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" id="title" value="<?php echo $row1['title'];?>" class="form-control"
                                            placeholder="john.doe" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Author</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" name="author" value="<?php echo $row1['author'];?>" id="author" class="form-control"
                                                placeholder="john.doe" aria-label="john.doe"
                                                aria-describedby="multicol-email2" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Image</label>
                                        <img src="upload/<? echo $row1['images']; ?>" width="100">
                                        <input type="file"  name="filstor"  class="form-control">
                                        <input type="hidden" name="oldimg" value="<? echo $row1['images']; ?>">
                                    </div>
                                    <div class="col-md-12">                                        
                                        <label class="form-label" for="multicol-phone">Short Details</label>
                                        <div class="input-group input-group-merge">
                                            <textarea name="short_details" class="form-control phone-mask"
                                            placeholder="Short Details" aria-label="Short Details"><?php echo $row1['short_details'];?></textarea >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        
                                        <label class="form-label" for="multicol-phone">Details</label>
                                        <div class="input-group input-group-merge">
                                            <!-- <textarea name="job_details" rows="25"><? echo $row['job_details'];?></textarea> -->
                                            <textarea name="details" rows="25" class="form-control"><?php echo $row1['details'];?></textarea>
                                        </div>
                                    </div>
                                </div>          
                                
                                <div class="pt-4">
                                    <input type="hidden" value="<?php echo $row1['id'];?>" name="id">
                                    <button type="submit" name="Update" value="Update" class="btn btn-outline-success me-sm-3 me-1">Submit</button>
                                </div>                                
                            </form>
                        </div>

                        <?php }?>

                        <?php

                        if(isset($_GET['Action']) && $_GET['Action']=="Show"){  
                            $id2=$_GET['id'];
                            $stmt="select * from blog where id='$id2'";
                            $rslt=mysqli_query($con,$stmt)or die(mysqli_error($con));
                            $row1=mysqli_fetch_array($rslt);
                        
                        ?>

                        <div class="card mb-4">
                            <h5 class="card-header">Blog</h5>
                            <form class="card-body" method="post" action="" >
                                
                                <hr class="my-4 mx-n4" />
                                <h6 class="fw-normal">2. Blog Info</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" >Title</label>
                                        <input type="text" name="title" value="<?php echo $row1['title'];?>" id="title" class="form-control"
                                            placeholder="Title" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" >Author</label>
                                        <input type="text" name="author" value="<?php echo $row1['author'];?>" id="author" class="form-control"
                                            placeholder="(Author Name)" />
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Image</label>
                                        <img src="upload/<? echo $row1['images']; ?>" width="100">
                                        <input type="file"  name="filstor"  class="form-control">
                                        <input type="hidden" name="oldimg" value="<? echo $row1['images']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" >Short Details</label>
                                        <textarea  id="short_details" class="form-control"
                                            placeholder="Short_details"><?php echo $row1['short_details'];?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" >Details</label>
                                        <textarea  id="details" class="form-control"
                                            placeholder="details"><?php echo $row1['details'];?></textarea>
                                    </div>
                                                                
                                </div>
                                
                                <div class="pt-4">
                                    <input type="hidden" value="<?php echo $row1['id'];?>" name="id">
                                    <input type="hidden" value="<?php echo $row1['title'];?>" name="id">
                                    <button type="submit" name="Show" value="Show" class="btn btn-outline-success me-sm-3 me-1">Submit</button>
                                </div>                                
                            </form>
                        </div>

                        <?php }?>

                        <?php 	
                            if(!isset($_GET['Action'])){ 
                            
                        ?>


                        <h4 class="py-3 breadcrumb-wrapper mb-4">
                            <span class="text-muted fw-light">Blog /</span> Task List 
                        </h4>

                        <!-- Bootstrap Table with Header - Dark -->
                        <div class="card">
                            
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <h5 class="card-header">Blog Management</h5><a class="btn btn-outline-success" href="blog.php?Action=Add" style="margin:15px;">Add Blog</a>
                                </div>
                                <script type="text/javascript" src="jquery-1.8.0.min.js"></script>
                                <script type="text/javascript">
                                    $(function(){
                                    $(".search").keyup(function()
                                    {
                                    var searchid = $(this).val();
                                    var dataString = 'search='+ searchid;
                                    if(searchid!='')
                                    {
                                        $.ajax({
                                        type: "POST",
                                        url: "search_blog.php",
                                        data: dataString,
                                        cache: false,
                                        success: function(html)
                                        {
                                        $("#result").html(html).show();
                                        }
                                        });
                                    }return false;
                                    });

                                    jQuery("#result").live("click",function(e){
                                        var $clicked = $(e.target);
                                        var $name = $clicked.find('.name').html();
                                        var decoded = $("<div/>").html($name).text();
                                        $('#searchid').val(decoded);
                                    });
                                    jQuery(document).live("click", function(e) {
                                        var $clicked = $(e.target);
                                        if (! $clicked.hasClass("search")){
                                        jQuery("#result").fadeOut();
                                        }
                                    });
                                    $('#searchid').click(function(){
                                        jQuery("#result").fadeIn();
                                    });
                                    });
                                </script>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Images</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                    <?php
                                        $i=1;
                                        $sql4 = "SELECT * FROM blog ";
                                       
                                        $result = mysqli_query($con,$sql4);
                                        if(mysqli_num_rows($result) > 0){
                                            while ($row3=mysqli_fetch_array($result)) {                             
                                       
                                    ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><strong><?php echo $row3['title'];?></strong></td>
                                            <td><?php echo $row3['author'];?></td>
                                            <td><img src="upload/<?= $row3['images']?>" alt="blog_image" width="100px"></td>
                                            <td><?php echo $row3['date'];?></td>
                                            <td>
                                                <? if($row3['status']=="Active"){ ?>
                                                <a href="blog.php?Action=UpdateStatus&id=<? echo $row3['id']; ?>&status=Inactive" class="btn btn-primary"><? echo $row3['status']; ?></a>
                                                <? } else { ?>
                                                <a href="blog.php?Action=UpdateStatus&id=<? echo $row3['id']; ?>&status=Active" class="btn btn-warning"><? echo $row3['status']; ?></a>
                                                <? } ?>
                                            </td>
                                            <td>
                                                <a href="blog.php?Action=Update&id=<?php echo $row3['id']?>" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="javascript:resume_id('<? echo $row3['id']?>')" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
                                                <a href="blog.php?Action=Show&id=<?php echo $row3['id']?>" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        } 
                                    }?>    
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

<div class="modal-onboarding modal fade animate__animated" id="fileUpload" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="onboarding-media">
                    <div class="mx-2">
                        <img src="assets/img/illustrations/girl-unlock-password-light.png"
                            alt="girl-unlock-password-light" width="335" class="img-fluid"
                            data-app-light-img="illustrations/girl-unlock-password-light.png"
                            data-app-dark-img="illustrations/girl-unlock-password-dark.php">
                    </div>
                </div>
                <div class="onboarding-content mb-0">
                    <form  method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                <label for="roleEx" class="form-label">Upload Excel File</label>
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload Excel File</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" value="" name="doc" class="account-file-input" hidden="" >
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="roleEx" class="form-label">Project Assign</label>
                                        <select class="form-select" name="emprole" tabindex="0" id="roleEx">
                                        <option value="">Select</option>
                                            <?php 
                                                $sql1= "SELECT * FROM employee_role";
                                                $rs= mysqli_query($con,$sql1) or die("not found");
                                                while($row=mysqli_fetch_assoc($rs)){
                                            ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['emp_role'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-label-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit_file" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>

<div class="modal-onboarding modal fade animate__animated" id="showData" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="onboarding-media">
                    <div class="mx-2">
                        <img src="assets/img/illustrations/girl-unlock-password-light.png"
                            alt="girl-unlock-password-light" width="335" class="img-fluid"
                            data-app-light-img="illustrations/girl-unlock-password-light.png"
                            data-app-dark-img="illustrations/girl-unlock-password-dark.php">
                    </div>
                </div>
                <div class="onboarding-content mb-0">
                    <form  method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload Excel File</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" value="" name="doc" class="account-file-input" hidden="" >
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="roleEx" class="form-label">Your Role</label>
                                        <select class="form-select" tabindex="0" id="roleEx">
                                            <option>Web Developer</option>
                                            <option>Business Owner</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-label-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit_file" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>