<?php
	require('top.inc.php');
?>

<br><br><br><br><br>
<main>
	<div class="titles">
		My Orders
	</div>

	<br><br>
	<div class="container-fluid text-center">
		<?php
			if(isset($_SESSION['U_ID'])){
				$uid=$_SESSION['U_ID'];
			?>
		<table class="orders_table" border="1" cellpadding="25" cellspacing="25" style="table-layout: fixed; width:100%;">
			<thead>
				<th>Order ID#</th>
				<th>Product(s)</th>
				<th>Total Price</th>
				<th>Order Status</th>
				<th>Order Date/Time</th>
			</thead>
			<tbody>
				<?php
					$res=mysqli_query($con,"select * from orders where user_id='$uid' order by id desc");
					while($row=mysqli_fetch_assoc($res)){ 
						$opid=$row['id'];
						?>
				<tr>
					<td><?php echo "#".$opid;?><br><a class="btn" href="orderdetails.php?id=<?php echo $opid;?>"><font size="-3px">View Details</font></a></td>
					<?php $p_name="";
					$ct=0;
					$nquery=mysqli_query($con,"SELECT product.name FROM `order_details` INNER JOIN product on product_id=product.id where order_id='$opid' ");
					while($p_det=mysqli_fetch_assoc($nquery)){
						$ct=$ct+1;
						if($ct==1)
						$p_name=$p_det['name'];
						if($ct==2)
							$p_name=$p_name.", ".$p_det['name'];
					}
					if($ct>2){
						$p_name=$p_name." ... + ".$ct-2;
						$p_name=$p_name." more";
					}
					?>
					<td><?php echo $p_name;?></td>
					<td><?php echo "$ ".$row['total_price'];?></td>
					<td><?php echo $row['order_status'];?></td>
					<td><?php echo $row['added_on'];?></td>
					
				</tr>
			<?php }?>
			</tbody>
		</table>
		<?php }
		else{
			echo "<div class='titles' style='border-bottom: 0px'>
				Please Login to Continue.<br>
				<div class='container'>
					<a href='login.php' class='btn'>&nbsp;Login/Register&nbsp;</a>
				</div>
			</div>
		</div>";
		}
		?>
		<br>

		<div class="container-fluid">
			<span style="float: left;"><a onclick="window.history.back();" class="btn">
				&nbsp;❮ Continue shopping&nbsp;</a>
			</span>
		</div>
	</div>
</main>

<br><br>

<?php
include('footer.inc.php');
?>