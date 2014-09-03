<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">div {float: left; margin-right: 20px;}</style>
</head>
<body>

<h1><?php echo $advertisement->title; ?></h1>
<h3><?php echo $advertisement->category; ?></h3>
<p><?php echo $advertisement->description; ?></p>

<div><img src="<?php echo base_url()."images/".$advertisement->img1; ?>"></div>
<?php  if($advertisement->img2 != "0") {  ?>
<div><img src="<?php echo base_url()."images/".$advertisement->img2; ?>"></div>
<?php } ?>
<?php  if($advertisement->img3 != "0") {  ?>
<div><img src="<?php echo base_url()."images/".$advertisement->img3; ?>"></div>
<?php } ?>
</body>
</html>