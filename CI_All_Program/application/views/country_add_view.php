<?php
echo $msg;
?>  
<head>
    <style>
        .err{
            color: red;
        }
    </style>
</head>
<form action="<?php echo base_url(); ?>index.php/Home/read_add_country" method="post">
    <label>Enter Country</label>
    <input type="text" name="country_name"> <?php echo form_error('country_name'); ?>
    <br><br>
    <input type="submit" name="add" value="Add">
</form>






