<?php
$row=$ret->row();
//echo $row->fname;
?>
<form method="post" action="<?php echo base_url(); ?>index.php/home/update_records/<?php echo $this->uri->segment(3);?>">
    Name:
    <input type="text" name="fname" value="<?php echo $row->fname; ?>">
    <br>
    Email:
    <input type="text" name="email" value="<?php echo $row->email; ?>">
    <br>
    <input type="submit" name="update" value="Update">
</form>
