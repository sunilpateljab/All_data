<form action="<?php echo site_url(); ?>/home/product_read" method="post" enctype="multipart/form-data">
    <input type="text" name="product_name" placeholder="Enter product name">
    <br><br>
    <input type="text" name="mrp" placeholder="Enter product mrp">
    <br><br>
    <input type="text" name="sp" placeholder="Enter product sp">
    <br><br>
    <input type="text" name="brand" placeholder="Enter product brand">
    <br><br>
    <input type="text" name="description" placeholder="Enter product description">
    <br><br>
    <input type="file" name="product_image" placeholder="Enter product product_image">
    <br><br>
    <input type="submit" name="product" value="Add_Product">
    <br><br>
</form>
