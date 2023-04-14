<?php 
    // include ('config.php');
    // if(isset($_POST['submit'])){
    //     $file=$_FILES['doc']['tmp_name'];
    //     $ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
    //     if($ext=='xlsx'){
    //         require('PHPExcel/PHPExcel.php');
    //         require('PHPExcel/PHPExcel/IOFactory.php');
            
    //         $obj=PHPExcel_IOFactory::load($file);
    //         foreach($obj->getWorksheetIterator() as $sheet){
    //             $getHighestRow=$sheet->getHighestRow();
    //             for($i=0;$i<=$getHighestRow;$i++){
    //                 $name=$sheet->getCellByColumnAndRow(0,$i)->getValue();
    //                 $email=$sheet->getCellByColumnAndRow(1,$i)->getValue();
    //                 if($name!=''){
    //                     mysqli_query($con,"INSERT INTO excel(name,email) VALUES('$name','$email')");
    //                 }    
    //             }
    //         }
    //     }else{
    //         echo "Invalid file format";
    //     }
    // }

    include ('config.php');
    if(isset($_POST['submit'])){
        $comment = $_POST['comments'];
        $sql = mysqli_query($con,"INSERT INTO comment(comments) VALUES ('$comment')") or die(mysqli_error($con));
        header('location:excel.php?msg=Insert Data Successfully');
    }


?> 

<form method="post" >
    <input type="text" name="comments">
    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
</form>
<table>
    <thead>
        <th>
            <td>Comment</td>
        </th>
    </thead>
    <tbody>
        <?php

            $stmt = mysqli_query($con,"SELECT * FROM comment");
            while($row=mysqli_fetch_assoc($stmt)){
        
        ?>
        <tr>
            <td><?= $row['comments'];?></td>
        </tr>
        <?php }?>
    </tbody>
</table>