<?php
	require('top.inc.php');
	$oid=get_safe_value($con,$_GET['id']);
?>

<br><br><br><br><br>
<main>
	<div class="titles">
		Order Details - # <?php echo $oid;?>
	</div>

	<br><br>
	<div class="container-fluid text-center">
		<?php if(isset($_SESSION['U_ID'])){
					$uid=$_SESSION['U_ID'];
				?>
		<table class="order_details_table" border="1" cellpadding="25" cellspacing="25" style="table-layout: fixed; width:100%;">
			<thead>
				<th>Sno.</th>
				<th>Product</th>
				<th>Name</th>
				<th>| Qty x Size |</th>
				<th>Total</th>
			</thead>
			<tbody>
				<?php 
				$sno=0;
				$tot_pr=0;
				$res=mysqli_query($con,"SELECT DISTINCT(product.name),product.id,product.image,qty_x_size,order_details.price,orders.total_price,orders.payment_status FROM (`order_details` inner join product on order_details.product_id=product.id) INNER join orders on orders.id=order_id where orders.user_id='$uid' and order_id='$oid';");
				while($row=mysqli_fetch_assoc($res)){
					$tot_pr=$row['total_price'];
					$sno=$sno+1;
					$p_status=$row['payment_status'];
				?>
				<tr>
					<td><?php echo "#".$sno;?></td>
					<td><a href="product.php?id=<?php echo $row['id']?>"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'];?>" style="width: 100%;height: 100%;"></a></td>
					<td><a href="product.php?id=<?php echo $row['id']?>"><?php echo $row['name'];?></a></td>
					<td><?php echo $row['qty_x_size'];?></td>
					<td><?php echo "$ ".$row['price'];?></td>
				</tr>
				<?php }
				?>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>Total Price ❯&nbsp;<br><font size="-1px">($100 Delivery Charge)</font></td>
					<td><?php echo "$ ".$tot_pr;?><br><font size="-1px"><?php echo "Payment Status - ".$p_status;?></font></td>
				</tr>
			</tbody>
		</table>
		<?php $res=mysqli_fetch_assoc(mysqli_query($con,"select * from orders where id='$oid'"));
		?>
		<br><br>
		<div class="container col-md-6 mx-auto border border-dark">
			<div class="titles">Billing Details</div>
			<br>
			<dl style="text-align: left;">
				<dt>Name</dt><dd><?php echo $res['name'];?></dd>
				<dt>Email</dt><dd><?php echo $res['email'];?></dd>
				<dt>Mobile No.</dt><dd><?php echo $res['mobile'];?></dd>
				<dt>Address</dt> <?php echo $res['addr'];?></dd>
				<dt>PinCode</dt><dd><?php echo $res['pin'];?></dd>
				<dt>City</dt><dd><?php echo $res['city'];?></dd>
				<dt>State</dt><dd><?php echo $res['state'];?></dd>
				<dt>Mode of Payment</dt><dd><?php echo "Online (".$res['payment_type'].")";?></dd>
				<dt>Delivery Status</dt><dd><?php echo $res['order_status'];?></dd>
				<dt>Time of Order</dt><dd><?php echo $res['added_on'];?></dd>
			</dl>
		</div>
		<?php 
		}
		else{
			echo "<div class='titles' style='border-bottom: 0px'>
				Please Login to Continue.<br>
				<div class='container'>
					<a href='login.php' class='btn'>&nbsp;Login/Register&nbsp;</a>
				</div>
			</div>";
			}
		?>
		<br>
		<div class="container-fluid">
			<span style="float: left;">
				<a onclick="window.history.back();" class="btn">
					&nbsp;❮ Back&nbsp;
				</a>
			</span>
		</div>
	</div>
</main>

<br><br>

<?php
include('footer.inc.php');
?>