<!DOCTYPE html>
<head>
	<title></title>
	<style type="text/css"> label {display: block;} .error { color: red; }</style>
</head>
<body>

<h1>Update User</h1> | <span><?php echo anchor("users/dashboard","Dashboard"); ?></span>

<?php
if(isset($msg))
{
	echo " <h2> $msg </h2> ";
}
?>

<?php echo form_open('users/update'); ?>

<p>
	<?php 
		echo form_label('Name :','name');
		echo form_input('name',set_value('name',$user->name),'id=name');
	?>
</p>

<p>
	<?php 
		echo form_label('Password :','password');
		echo form_password('password','','id=password');
	?>
</p>

<p>
	<?php 
		echo form_submit('submit','Save','id=submit');
	?>
</p>

<?php echo form_close(); ?>

<div class="error"><?php echo validation_errors(); ?> </div>

</body>
</html>