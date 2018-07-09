<br><br>
<form action="<?php echo base_url(); ?>index.php/home/search_by_like" method="post">
    <input type="text" name="search_txt" placeholder="search">
    <input type="submit" name="search_btn" value="Search">
</form>
<br><br>
<?php
//foreach ($ret->result() as $row){
//    echo $row->fname;
//    echo '<br>';
//}
?>

<br><br>
<table border="1px">
    <tr>
        <th>S.No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php
    $i = 1;
    foreach ($ret->result() as $row) {
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row->fname; ?></td>  
            <td><?php echo $row->email; ?></td>
            <td>
                <img src="<?php echo base_url(); ?>upload/image/<?php echo $row->image; ?>" width="100" height="100">
            </td>
            <td>    
                <a href="<?php echo base_url(); ?>index.php/Home/delete_user_record/<?php echo $row->user_id; ?>">Delete</a>
                <a href="<?php echo base_url(); ?>index.php/Home/get_update_record/<?php echo $row->user_id; ?>">Update</a>
            </td>
            <?php
            $i++;
        }
        ?>
    </tr>

</table>
<br>
<br>
<a href="<?php echo base_url(); ?>">home</a>

<br><br><br>
<a href="<?php echo site_url(); ?>/home/logout">logout</a>
