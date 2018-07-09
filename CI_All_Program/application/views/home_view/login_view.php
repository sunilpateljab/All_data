<?php
echo $msg;
?>
<form method="post" action="<?php echo base_url(); ?>Home_controller/login">
    <input type="text" name="email" placeholder="Enter Email id">
    <br><br>
    <input type="password" name="password" placeholder="Enter Password">
    <br><br>
    <input type="submit" name="login" value="Login">
</form>
