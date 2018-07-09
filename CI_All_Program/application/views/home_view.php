<h2 style="text-align: center;background-color: gray;color: wheat;padding: 5px;">Welcome to CI</h2>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assests/css/button.css">
        <style>
            body{
                margin: 0;
            }
            a{
                color: white;
                font-size: 18px;
                background-color: green;
                padding:8px;
                margin: 3px;
                text-align: center;
                border-radius: 15px;
                text-decoration: none;
                float: left;

            }
        </style>
    </head>


</html>
<a href="<?php echo site_url(); ?>home/login">Login</a>
<a href="<?php echo site_url('home/user_register'); ?>">Register</a>
<a href="<?php echo site_url('home/facelook_register'); ?>">Facelook</a>
<a href="<?php echo site_url('home/get_user_data'); ?>">Retriving/show_facelook_data</a>
<a href="<?php echo site_url('home/get_user_Multiple_data'); ?>">show_Multiple_record</a>
<a href="<?php echo site_url('home/add_country'); ?>">Add_country</a>
<a href="<?php echo site_url('home/get_country_data'); ?>">get_country_data</a>
<a href="<?php echo site_url('home/search_user'); ?>">search_user</a>
<a href="<?php echo site_url('home/test_my_helper'); ?>">userdefined_helper</a>
<a href="<?php echo site_url('home/test_my_library'); ?>">userdefined_library</a>
<a href="<?php echo site_url('user_controller/f1'); ?>">f1</a>
<a href="<?php echo site_url('user_controller/f2'); ?>">f2</a>
<a href="<?php echo site_url('user_controller/f3'); ?>">f3</a>
<a href="<?php echo site_url('user/routing'); ?>">url_routing</a>
<a href="<?php echo site_url('home/test_pagination'); ?>">Pagination</a>
<a href="<?php echo site_url(); ?>/home/test_download">Download</a>
<a href="<?php echo site_url(); ?>/home/upload_view">Upload</a>
<a href="<?php echo site_url(); ?>/home/product_view">Product_Add</a>
<a href="<?php echo site_url(); ?>/home/test_constant">Constant_variable</a>
<a href="<?php echo site_url(); ?>Home_controller/landpage">Land_page</a>