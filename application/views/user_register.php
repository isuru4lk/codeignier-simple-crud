<!DOCTYPE <html>
<head>
	<title></title>
	<style type="text/css"> label {display: block;} .error { color: red; }</style>
</head>
<body>

<h1>Register</h1>

<?php echo form_open('users/register'); ?>

<p>
	<?php 
		echo form_label('Name :','name');
		echo form_input('name',set_value('name'),'id=name');
	?>
</p>


<p>
	<?php 
		echo form_label('User Name :','username');
		echo form_input('username',set_value('username'),'id=username');
	?>
</p>


<p>
	<?php 
		echo form_label('Email :','email');
		echo form_input('email',set_value('email'),'id=email');
	?>
</p>


<p>
	<?php 
		echo form_label('Password :','password');
		echo form_password('password',set_value('password'),'id=password');
	?>
</p>

<p>
	<?php 
		echo form_submit('submit','Submit','id=submit');
	?>
</p>

<?php echo form_close(); ?>

<p><?php echo anchor('users/login','SIGN IN'); ?></p>

<div class="error"><?php echo validation_errors(); ?> </div>

</body>
</html>