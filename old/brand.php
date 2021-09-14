<?php
require('top.inc.php'); 
$br=mysqli_real_escape_string($con,$_GET['id']);
$br_name=mysqli_fetch_assoc(mysqli_query($con, "select brand from brand where id=$br"));
$product=get_product($con,'','',$br);
?>
<br>
<br>
<br>
<br>
<br>
<main>
<div class="container-fluid">
	<div class="titles">Brand - <?php echo $br_name['brand']; ?><br><br><h5> Showing <?php echo count($product);?> Product(s)</h5></div>
</div>

<div class="container">
<br>
<?php if(count($product)>0){ ?>	

<br>
<br>
<?php
 foreach ($product as $list) {
 ?>
<div class="row">
  <div class="column" >
    <div class="card">
      <a href="product.php?id=<?php echo $list['id']; ?>">
      <img src= "<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'];?>" alt="<?php echo $list['name'] ?>" style="width:100%">
      <h1><?php echo $list['name']; ?></h1>
      </a>
      <p class="price"><?php echo $list['mrp']; ?></p>
      <p><?php echo $list['short_desc']; ?></p>
      <p><button>Add to Cart</button></p>
    </div>
  </div>
</div>
<?php }} 
else
	echo "<div class='titles'> No Products Found :-(</div>";
?>

</div>
</main>

<?php
include('footer.inc.php');
?>