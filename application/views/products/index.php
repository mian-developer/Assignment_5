<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2>Products</h2>
    
<!-- Cart info -->
<a href="<?php echo base_url('index.php/cart'); ?>"  class="btn btn-info pull-right" title="View Cart">
    <i class="fas fa-shopping-cart"></i>
    <span>(<?php echo $this->cart->total_items(); ?>)</span>
</a>
<div>
    <a style="margin-right: 5px" href="<?php echo base_url('index.php/auth/logout'); ?>"  class="btn btn-default pull-right" title="View Cart">
    <i class="fas fa-sign-out-alt"></i> Logout
</a>
</div>


<!-- List all products -->
<div class="row">
    <div class="col-lg-12">
    <?php if(!empty($products)){ foreach($products as $row){ ?>
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <img src="<?php echo base_url('uploads/product_images/'.$row['image']); ?>" />
                <div class="caption">
                    <h4 class="pull-right">$<?php echo $row['price']; ?> USD</h4>
                    <h4><?php echo $row['name']; ?></h4>
                    <p><?php echo $row['description']; ?></p>
                </div>
                <div class="atc">
                    <a href="<?php echo base_url('index.php/products/addToCart/'.$row['id']); ?>" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Add to Cart
                    </a>
                </div>
            </div>
        </div>
    <?php } }else{ ?>
        <p>Product(s) not found...</p>
    <?php } ?>
    </div>
</div>
</div>
</body>
</html>