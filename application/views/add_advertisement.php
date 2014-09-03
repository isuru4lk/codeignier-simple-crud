<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css"> label {display: block;} .error { color: red; }</style>
</head>
<body>

<h1>New Advertisement</h1> | <span><?php echo anchor("users/dashboard","Dashboard"); ?></span>

<?php
if(isset($msg))
{
	echo " <h2> $msg </h2> ";
}
?>

<?php echo form_open_multipart('advertisements/add'); ?>

<p>
	<?php 
		echo form_label('Category','category');
		echo form_dropdown('category',array('mobile phones' => 'Mobile Phones', 'computers' => 'Computers'),set_value('category'));
	?> 
</p>

<p>
	<?php 
		echo form_label('Title','title');
		echo form_input('title',set_value('title'));
	?> 
</p>

<p>
	<?php 
		echo form_label('Description','desc');
		echo form_textarea('desc',set_value('desc'));
	?> 
</p>

<p>
	<?php 
		echo form_label('Main Image','main_img');
		echo form_upload('main_img',set_value('main_img'));
	?> 
</p>

<p>
	<?php 
		echo form_label('Image 2','img2');
		echo form_upload('img2',set_value('img2'));
	?> 
</p>

<p>
	<?php 
		echo form_label('Image 3','img3');
		echo form_upload('img3',set_value('img3'));
	?> 
</p>

<p>
	<?php 
		echo form_submit('submit','Submit');
	?> 
</p>

<?php echo form_close(); ?>

<div class="error"><?php echo validation_errors(); ?> </div>

</body>
</html>