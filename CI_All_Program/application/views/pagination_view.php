<style>
    .peffect{
        background-color: blue;
        border: 5px solid black;
        color: wheat;
        padding: 5px;
        margin: 3px;
    }
</style>

<?php
foreach ($ret->result() as $row) {
    echo '<br>';
    echo $row->fname;
    ?>
    <br><br>
    <img src="<?php echo base_url(); ?>upload/image/<?php echo $row->image; ?>" width="100" height="100" alt="">
    <?php
}
?>
<!--<img src="<?php echo base_url(); ?>upload/image/Facelook_3685.jpg" width="100" height="100">-->
<br><br><br>
<?php
echo $links;
?>
<br><br><br><br>
<a href="<?php echo base_url(); ?>">home</a>





