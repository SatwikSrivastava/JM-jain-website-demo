<?php


include('config.php');

if(isset($_POST["action"]))
{
	$query = "SELECT * FROM product JOIN main_category ON product.pro_menu = main_category.main_cat_id JOIN sub_category ON product.pro_sub = sub_category.sub_cat_id JOIN category ON product.pro_cat = category.cat_id order by pro_id";
	
	if(isset($_POST["main"]))
	{
		$main_filter = implode("','", $_POST["main"]);
		$query .= "
		 AND pro_menu IN('".$main_filter."')
		";
	}
	if(isset($_POST["sub"]))
	{
		$sub_filter = implode("','", $_POST["sub"]);
		$query .= "
		 AND pro_sub IN('".$sub_filter."')
		";
	}
	if(isset($_POST["cat"]))
	{
		$cat_filter = implode("','", $_POST["cat"]);
		$query .= "
		 AND pro_cat IN('".$cat_filter."')
		";
	}
    $statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
			<div class="col-sm-4 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
					<img src="admin/product/pro-img/'. $row['pro_img'] .'" alt="" class="img-responsive" >
					<p align="center"><strong>'. $row['pro_title'] .'</strong></p>
					<p align="center">HSN - Code <strong style="color:red;">'. $row['hsn_code'] .'</strong></p>
				</div>

			</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>