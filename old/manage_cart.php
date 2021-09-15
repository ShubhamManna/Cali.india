<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.php');
$pid=get_safe_value($con,$_POST['pid']);
$qty=get_safe_value($con,$_POST['qty']);
$type=get_safe_value($con,$_POST['type']);
$size=get_safe_value($con,$_POST['size']);
$obj=new add_to_cart();
if($type=='add'){
	$obj->addp($pid,$qty,$size);
}
if($type=='remove'){
	$obj->removep($pid);
}
if($type=='empty'){
	$obj->emptyp();
}
echo $obj->totalp();
?>