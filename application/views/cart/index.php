<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>
<body>
    <script>
/* Update item quantity */
function updateCartItem(obj, rowid){
    $.get("<?php echo base_url('index.php/cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
        if(resp == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>
    <div class="container">
        <h2>Shopping Cart</h2>
<div class="row cart">
    <table class="table">
    <thead>
        <tr>
            <th width="10%"></th>
            <th width="30%">Product</th>
            <th width="15%">Price</th>
            <th width="13%">Quantity</th>
            <th width="20%">Subtotal</th>
            <th width="12%"></th>
        </tr>
    </thead>
    <tbody>
        <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
        <tr>
            <td>
                <?php $imageURL = !empty($item["image"])?base_url('/uploads/product_images/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
                <img src="<?php echo $imageURL; ?>" width="50"/>
            </td>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '$'.$item["price"].' USD'; ?></td>
            <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
            <td>
                <a href="<?php echo base_url('index.php/cart/removeItem/'.$item["rowid"]); ?>" class="btn btn-danger btn-block" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i> Delete</a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="6"><p>Your cart is empty.....</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="<?php echo base_url('/index.php/products/'); ?>" class="btn btn-warning btn-block"> <i class="fas fa-backward"></i> Continue Shopping</a></td>
            <td colspan="3"></td>
            <?php if($this->cart->total_items() > 0){ ?>
            <td class="text-left">Grand Total: <b><?php echo '$'.$this->cart->total().' USD'; ?></b></td>
            <td><a href="<?php echo base_url('index.php/checkout/'); ?>" class="btn btn-success">Checkout <i class="fas fa-forward"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>
    </div>

</body>
</html>

<!-- Include jQuery library -->


