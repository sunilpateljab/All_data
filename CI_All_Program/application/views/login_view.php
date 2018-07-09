<?php
echo $msg;
?>

<form action="<?php echo base_url(); ?>index.php/home/login" method="post">
    <input type="text" name="email" placeholder="Enter Email id">
    <br><br>
    <input type="password" name="password" placeholder="Enter Password">
    <br><br>
    <input type="submit" name="login" value="Login">
</form>
