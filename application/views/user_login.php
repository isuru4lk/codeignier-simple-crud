<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">label { display: block;} .errors { color: red; }</style>
</head>
<body>

<h1>User Login</h1>

<?php echo form_open('users/validate_login'); ?>

<p>
	<?php
		echo form_label('User Name','username');
		echo form_input('username',set_value('username'));
	?>
</p>

<p>
	<?php
		echo form_label('Password','password');
		echo form_password('password',set_value('password'));
	?>
</p>

<p>
	<?php echo form_submit('submit','Login'); ?>
</p>

<?php echo form_close(); ?>

<p><?php echo anchor('users/register','SIGN UP'); ?></p>

<div class="errors"><?php echo validation_errors(); ?></div>
</body>
</html>