<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assests/css/styles.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assests/css/button.css">
    </head>
    <body>
        <?php $this->load->view('layout/header'); ?>
        <?php echo $msg; ?>
        <form action="<?php echo base_url(); ?>Home/facelook_read_data" method="post">
            <table width="100%">


                <h2>Create a new account</h2>


                <tr> 
                    <td> 
                        <input type="text" name="fname" id="fname" value="<?php echo set_value('fname'); ?>" placeholder="First Name" size="30">  <?php echo form_error('fname'); ?>

                    </td>
                <tr>
                    <td>
                        <input type="text" name="lname" id="lname" value="<?php echo set_value('lname'); ?>"  placeholder="Last name" size="30">  <?php echo form_error('lname'); ?>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>"  placeholder="Mobile Number or Email Address" size="30">  <?php echo form_error('email'); ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="New Password" size="30">  <?php echo form_error('password'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="date" name="date" value="<?php echo set_value('date'); ?>" placeholder="select date">
                        <?php echo form_error('date'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" name="gender" checked="checked" value="f">Female
                        <input type="radio" name="gender" checked="checked" value="m">Male
                        <?php echo form_error('gender'); ?>
                    </td>

                </tr>
                <tr>
                    <td>
                        <input type="submit" name="signup" value="Signup">
                    </td>
                </tr>
            </table>

        </form>
    </body>
</html>
<a href="<?php echo base_url(); ?>">home</a>
<script>
    function validate_form() {



    }
</script>