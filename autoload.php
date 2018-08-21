<?php
include("config.php");
$content_per_page = 3;	
$group_no  = strtolower(trim(str_replace("/","",$_REQUEST['group_no'])));
$start = ceil($group_no * $content_per_page);
$sql= "SELECT distinct * FROM `products` WHERE category_id = '1'";
    if(isset($_REQUEST['brand']) && $_REQUEST['brand']!="") :
		$brand = explode(',',url_clean($_REQUEST['brand']));	
	    $sql.=" AND brand IN ('".implode("','",$brand)."')";
	endif;

    if(isset($_GET['material']) && $_GET['material']!="") :
		$material = explode(',',url_clean($_REQUEST['material']));	
        $sql.=" AND material IN ('".implode("','",$material)."')";
    endif;

    if(isset($_GET['size']) && $_GET['size']!="") :
		$size = explode(',',$_REQUEST['size']);	
        $sql.=" AND size IN (".implode(',',$size).")";
    endif;
	$sql.=" LIMIT $start, $content_per_page";
	$all_product=$db->query($sql);
    $rowcount=mysqli_num_rows($all_product);

    function url_clean($String){
    	return str_replace('_',' ',$String); 
    }
?>

        <?php if(isset($all_product) && count($all_product) && $rowcount > 0) : $i = 0; ?>
            <?php foreach ($all_product as $key => $products) : ?>
                <article class="col-md-4 col-sm-6">
                    <div class="thumbnail product">
                        <figure>
                            <a href="#"><img src="product_images/<?php echo $products['image']; ?>" alt="<?php echo $products['product_name']; ?>" /></a>
                        </figure>
                        <div class="caption">
                            <a href="" class="product-name"><?php echo $products['product_name']; ?></a>
                            <div class="price">Rs.<?php echo $products['price']; ?>/-</div>
                            <h6>Brand : <?php echo $products['brand']; ?></h6>
                            <h6>Material : <?php echo $products['material']; ?></h6>
                            <h6>Size : <?php echo $products['size']; ?></h6>
                        </div>
                    </div>
                </article>
            <?php $i++; endforeach; ?> 
        <?php endif; ?>
