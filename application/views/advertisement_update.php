<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css"> label {display: block;} .error { color: red; }</style>
</head>
<body>

<h1>Update Advertisement</h1> | <span><?php echo anchor("users/dashboard","Dashboard"); ?></span>

<?php
if(isset($msg))
{
	echo " <h2> $msg </h2> ";
}
?>

<?php echo form_open('advertisements/update/'.$advertisement->id); ?>

<p>
	<?php 
		echo form_label('Category','category');
		echo form_dropdown('category',array('mobile phones' => 'Mobile Phones', 'computers' => 'Computers'),set_value('category',$advertisement->category));
	?> 
</p>

<p>
	<?php 
		echo form_label('Title','title');
		echo form_input('title',set_value('title',$advertisement->title));
	?> 
</p>

<p>
	<?php 
		echo form_label('Description','desc');
		echo form_textarea('desc',set_value('desc',$advertisement->description));
	?> 
</p>


<p>
	<?php 
		echo form_submit('submit','Update');
	?> 
</p>

<?php echo form_close(); ?>

<div class="error"><?php echo validation_errors(); ?> </div>

</body>
</html>