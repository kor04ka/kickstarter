<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php 

	$connect = mysqli_connect('127.0.0.1', 'root', '', 'kickstarter');

	$query_db = 'SELECT * FROM projects';

	$query = mysqli_query($connect, 'SELECT * FROM projects');

	$res = $query->fetch_assoc();
?>
<body>
	
<div class="col-12">
	<div class="row">
		<div class="col-2 pt-3">
			<a href="" class="text-dark ml-3">Explore</a>
			<a href="" class="text-dark ml-3">Start a project</a>
		</div>
		<div class="col-8 text-center">
			<img src="logo.png" class="w-25">
			<p>#BlackLivesMatter</p>
		</div>
		<div class="col-2 text-left pt-3">
			<a href="" class="mr-3"> <i class="fa fa-search"></i> Search</a>
			<a href="acc.php"><img src="lk.png" class="rounded-circle" ></a>

		</div>
	</div>
</div>
<div class="col-10 mx-auto">
	<h4 class="">Explore <span class="text-success font-weight-bold"></span> projects</h4>
	<p></p>
	<div class="row mt-5">

		<?php 
			while ($row = mysqli_fetch_assoc($query)) {
		?>
			<div class="col-4" style="display: block; height: 700px;">
				<div style="height: 100%;">
					<div style="background-image: url(<?php echo $row['img']?>); width: 100%; height: 40.2%; background-size: cover;"></div>
					<p></p>
					<div>
						<h2 class=""><?php echo $row['title']?></h2>
						<p><?php echo $row['description']?></p>
					</div>
				</div>
				<div style="position: absolute; bottom: 5%;">
					<h4>by <?php echo $row['user']?></h4>
					<p><?php echo $row['place']?></p>
					<p>Goal $<?php echo $row['goal']?></p>
					<p>Reached <span class="text-success">$<?php echo $row['donated']?></span></p>
					<form action="updateDonate.php">
						<input style="display: none;" value="<?php echo $row['id']?>" name="id">
						<button class="btn btn-success" style="border: 0;">Дать 10$</button>
					</form>
				</div>
			</div>
		<?php
			};
		?>
	</div>

</div>
</body>
</html>