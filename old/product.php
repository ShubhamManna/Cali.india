<?php
require('top.inc.php'); 
$prod=mysqli_real_escape_string($con,$_GET['id']);
$get_product=get_product($con,'','','','',$prod);
$c_id=$get_product[0]['categories_id'];
$b_id=$get_product[0]['brand_id'];
$v_id=$get_product[0]['vibes_id'];
$c_name=mysqli_fetch_assoc(mysqli_query($con, "select categories from categories where id=$c_id"));
$b_name=mysqli_fetch_assoc(mysqli_query($con, "select brand from brand where id=$b_id"));
$v_name=mysqli_fetch_assoc(mysqli_query($con, "select vibes from vibes where id=$v_id"));
?>

<br><br><br><br><br>


<main>
	
	<br><br>

	<div class="container row" >
		<div class="col-sm-6">
			<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product[0]['image'];?>" alt="<?php echo $get_product[0]['name']; ?>" style="width:80%; align-content: center;">
        </div>
        <div class="col-sm-6 text-center" >
	       <div class="container">
                <div class="titles">
                    <?php echo $get_product[0]['name'];?>
                </div>

                <br><br>

                    <h2>Price - <?php echo $get_product[0]['price'];?></h2>
                    <h2>MRP - <?php echo $get_product[0]['mrp'];?></h2>
                    <h2>In stock - <?php echo $get_product[0]['qty'];?></h2>
                    <div>
                        <label>
                            <h2>Qty</h2>
                        </label>
                        <select id='prod_qty'>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div>
                        <label>
                            <h2>Size</h2>
                        </label>
                        <select id='prod_size'>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>XXL</option>
                        </select>
                    </div>
                    <h3>Category : <a href="categories.php?id=<?php echo $c_id;?>" class="btn"><?php echo $c_name['categories'];?></a></h3>
                    <h3>Brand : <a href="brand.php?id=<?php echo $b_id;?>" class="btn"><?php echo $b_name['brand'];?></a></h3>
                    <h3>Vibe : <a href="vibes.php?id=<?php echo $v_id;?>" class="btn"><?php echo $v_name['vibes'];?></a></h3>
                    <br><br>
                    
                    <div class="container">                
                        <a class="btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product[0]['id']?>','add');window.location.reload();">Add to Cart</a>
                    </div>
                
                
                <br><br>
                
                <h2>Description </h2>
                <h5 style="text-align: justify;"><?php echo $get_product[0]['description'];?></h5>
            </div>
        </div>
    </div>      
</main>
<?php
include('footer.inc.php');
?>
