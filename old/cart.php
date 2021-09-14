<?php
require('top.inc.php');
?>

<br><br><br><br><br>
<main>
	<div class="titles">
		Cart
	</div>

	<br><br>
	<div class="container-fluid text-center">
		<table class="checkout_table" border="1" cellpadding="25" cellspacing="25" style="table-layout: fixed; width:100%;">
			<thead>
				<th>Products</th>
				<th>Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
				<th>Remove</th>
			</thead>
			<tbody>
				<?php 
				if(isset($_SESSION['cart'])){
					$total=0;
					if($tp>0){
					foreach ($_SESSION['cart'] as $key => $value ) {
						$prod=get_product($con,'','','','',$key);
						$pname=$prod[0]['name'];
						$price=$prod[0]['price'];
						$img=$prod[0]['image'];
				?>
				<tr>
					<td><a href="product.php?id=<?php echo $key;?>"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$img;?>" style="width: 100%;height: 100%;" ></a></td>
					<td><a href="product.php?id=<?php echo $key;?>"><?php echo $pname;?></a></td>
					<td><?php echo "$ ".$price;?></td>
					<td><?php $tq=0;
						foreach ($value as $size => $qty) {
						$tq=$tq+$qty['qty'];
						echo $qty['qty']." x ".$size."<br>";
					} ?></td>
					<td><?php 
					$tpr=$tq*$price;
					$total=$total+$tpr;
					echo "$ ".$tpr;?></td>
					<td><div class="btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $key;?>','remove');window.location.reload();">X</div></td>
				</tr>
			<?php } ?>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>Total ❯&nbsp;</td>
					<td><?php echo "$ ".$total;?></td>
					<td>&nbsp;<a class="btn" onclick="manage_cart('','empty');window.location.reload();">Empty Cart</a></td>
				</tr>
		<?php }
				else{
				echo "<tr><td colspan=6 style='text-align:center'> --- Cart is Empty ---</td></tr>";				
			}
		}
			else{
				echo "<tr><td colspan=6 style='text-align:center'> --- Cart is Empty ---</td></tr>";				
			}
			?>
			</tbody>
		</table>

		<br>

		<div class="container-fluid">
			<span style="float: left;"><a onclick="window.history.back();" class="btn">
				&nbsp;❮ Continue shopping&nbsp;</a>
			</span>
			<?php if($tp>0)
				echo "
			<span style='float:right;'><a href='checkout.php' class='btn'>
				&nbsp; Proceed to Checkout ❯&nbsp;</a>
			</span>
			";?>
		</div>
		
	</div>
	
</main>

<br><br>

<?php
include('footer.inc.php');
?>

<!--Array
(
    [9] => Array
        (
            [M] => Array
                (
                    [qty] => 1
                )

        )

    [8] => Array
        (
            [XL] => Array
                (
                    [qty] => 1
                )

        )

)-->