<?php
require 'db/config.php';
include 'auth.php';

$sm->assign('title', 'Sub');
$sm->assign('name', 'Menu');

if (isset($_GET['Action']) && $_GET['Action'] == "Add") {
    $sm->assign('Add', $_GET['Action']);
}

$sqls = "SELECT * FROM `menu_name` ORDER BY id";
$rslt = mysqli_query($conn, $sqls);
if(mysqli_num_rows($rslt) > 0){
    while ($row = mysqli_fetch_assoc($rslt)) {
        $menu[] = $row;
        $sm->assign('menu', $menu);
    }
}else{
    $sm->assign('menu');
}

if (isset($_POST['Submit']) && $_POST['Submit']) {

    $menu = get_safe_value($conn, $_POST['menu']);
    $submenu = get_safe_value($conn, $_POST['submenu']);
    $category = get_safe_value($conn, $_POST['category']);
    $sql = mysqli_query($conn, "INSERT INTO `category` (main,sub,cat_name) VALUES ('$menu','$submenu','$category')") or die(mysqli_error($conn));

    header('location:Category.php?msg=CategoryDataAdded');
}
if (isset($_POST["Update"])) {
    $id = get_safe_value($conn, $_POST['id']);
    $menu = get_safe_value($conn, $_POST['menu']);
    $submenu = get_safe_value($conn, $_POST['submenu']);
    $category = get_safe_value($conn, $_POST['category']);

    mysqli_query($conn, "UPDATE `category` SET main='$menu',sub='$submenu',cat_name='$category' WHERE cat_id='$id'") or die(mysqli_error($conn));
    header('location:Category.php?msg=Update_Successfully');
}

if (isset($_GET['Action']) && $_GET['Action'] == "Update") {
    $sqld = mysqli_query($conn, "SELECT * FROM `category` WHERE cat_id='" . $_GET['id'] . "'") or die(mysqli_error($conn));
    while ($rowd = mysqli_fetch_array($sqld)) {
        $sm->assign('MenuUpdate', $rowd);

        $sqlid = "SELECT * FROM `menu_name` ORDER BY id";
        $rsl = mysqli_query($conn, $sqlid);
        if (mysqli_num_rows($rsl) > 0) {

            while ($row1 = mysqli_fetch_assoc($rsl)) {
                $menu1[] = $row1;
                $sm->assign('menu1', $menu1);
                if ($rowd['main'] == $row1['id']) {
                    $select = "selected";
                } else {
                    $select = "";
                }
            }
        }

        $sqli1 = "SELECT * FROM `submenu` ORDER BY sub_id";
        $rsl1 = mysqli_query($conn, $sqli1);
        if (mysqli_num_rows($rsl1) > 0) {

            while ($row2 = mysqli_fetch_assoc($rsl1)) {
                $main[] = $row2;
                $sm->assign('main1', $main);
                if ($rowd['sub'] == $row2['sub_id']) {
                    $select = "selected";
                } else {
                    $select = "";
                }
            }
        }
    }
}





// Pagination 
$limit = 9;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$offset = ($page - 1) * $limit;

$sqlp = "SELECT * FROM `category` ORDER BY cat_id DESC LIMIT {$offset},{$limit}";
$page_res = mysqli_query($conn,$sqlp) or die(mysqli_error($conn));
if(mysqli_num_rows($page_res) > 0){
    $sm->assign('ps',$page_res);

    
    $stmt = "SELECT * FROM `category` JOIN `menu_name` ON category.main = menu_name.id JOIN `submenu` ON category.sub = submenu.sub_id ORDER BY cat_id";
    $check_stmt = mysqli_query($conn, $stmt);
    if(mysqli_num_rows($check_stmt) > 0){
        while ($row1 = mysqli_fetch_array($check_stmt)) {
            $data[] = $row1;
            $sm->assign('cat_data', $data);
        }
    }else{
        $sm->assign('cat_data');
    }

    $pagi = "SELECT * FROM `category`";
    $result = mysqli_query($conn,$pagi) or die(mysqli_error($conn));
    if(mysqli_num_rows($result) > 0){
        $total_record = mysqli_num_rows($result);
        $total_page = ceil($total_record / $limit);
        echo '<ul class="pagination justify-content-center">';
        if($page > 1){
            echo '<li><a href="Category.php?page='.($page - 1).'">Prev</a></li>';
        }
        for($p = 1; $p <=$total_page; $p++){
            $sm->assign('p',$p);
            if($p == $page){
                $active = "active";
            }else{
                $active = "";
            }
            echo '<li class="'.$active.'"> <a href="Category.php?page='.$p.'">'.$p.'</a></li>';
                      
        }if($total_page > $page){
            echo '<li><a href="Category.php?page='.($page + 1).'">Next</a></li>';
        }
        echo '</ul>';
    }
}



// Detele Data

if (isset($_POST['delete_btn_set'])) {
    $del_id = $_POST['delete_id'];
    $reg_query = "DELETE FROM `category` WHERE cat_id='$del_id'";
    $reg_query_run = mysqli_query($conn, $reg_query);
}

$sm->display('page/Category.tpl');