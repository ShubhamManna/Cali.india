<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}
function get_product($con,$limit='',$cat='',$brand='',$vibes='',$prod=''){
	$sql="select * from product where status=1";
	if($prod!=''){
		$sql.=" and id=$prod";
	}
	if($brand!=''){
		$sql.=" and brand_id = $brand";
	}
	if($vibes!=''){
		$sql.=" and vibes_id = $vibes";
	}
	if($cat!=''){
		$sql.=" and categories_id = $cat";
	}
	$sql.=" order by id desc";
	if($limit!=''){
		$sql.=" limit $limit";
	}
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}
?>