<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Hi <?php echo $username; ?></h1> 
| <span><?php echo anchor("logout","Logout"); ?></span> | <span><?php echo anchor("users/update","Update"); ?></span>  | <span><?php echo anchor("advertisements/add","New Advertisement"); ?></span> 


<h2>Your Advertisements :</h2>
<?php
if(isset($records)) :
	foreach ($records as $row) :
?>

<div class="box">
	<h2><?php echo anchor("advertisements/view/$row->id",$row->title); ?></h2>
	<p>
		<span><img src="<?php echo base_url()."images/".$row->img1; ?>"></span>
		Added On : <?php echo $row->date; ?> <br>
		Category : <?php echo $row->category; ?>
	</p>
	<p><?php echo anchor("advertisements/update/$row->id","EDIT") ?> | <?php echo anchor("advertisements/remove/$row->id","REMOVE") ?> </p>
</div>

<?php endforeach; ?>
<?php else : ?>

<h2>No records were found</h2>

<?php endif; ?>

</body>
</html>