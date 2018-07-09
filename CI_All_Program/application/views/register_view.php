
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assests/css/register.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assests/css/button.css">
    </head>
    <body>
        <form method="post" action="<?php base_url(); ?>read_user_data">
            <input type="text" name="name" placeholder="Enter Your Name">
            <br><br>
            <input type="text" name="email" placeholder="Enter Your Email">
            <br><br>
            <input type="text" name="mobile" placeholder="Enter Your Mobile">
            <br><br>
            <input type="password" name="password" placeholder="Enter Your Password">
            <br><br>
            <input type="submit" name="register" value="Register">
        </form>
    </body>
</html>
<a href="<?php echo base_url(); ?>">Home</a>