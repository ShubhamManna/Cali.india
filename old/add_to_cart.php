<?php
class add_to_cart{
	function addp($pid,$qty,$size){
		$_SESSION['cart'][$pid][$size]['qty']=$qty;
	}
	function removep($pid){
		if(isset($_SESSION['cart'][$pid])){
			unset($_SESSION['cart'][$pid]);
		}
	}
	function updatep($pid,$qty,$size){
		if(isset($_SESSION['cart'][$pid])){
			$_SESSION['cart'][$pid][$size]['qty']=$qty;
		}
	}
	function emptyp(){
		unset($_SESSION['cart']);
	}
	function totalp(){
		if(isset($_SESSION['cart']))
			return count($_SESSION['cart']);
		else
			return 0;
	}
}
?>