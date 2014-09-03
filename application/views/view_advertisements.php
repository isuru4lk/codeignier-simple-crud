<!doctype html>
<html>
<head>
	<title></title>
	<style type="text/css">span {float: left;} .box { border-bottom: 1px solid #ccc; } </style>
</head>
<body>

<h1>Advertisements</h1>

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
</div>

<?php endforeach; ?>
<?php else : ?>

<h2>No records were found</h2>

<?php endif; ?>

</body>
</html>