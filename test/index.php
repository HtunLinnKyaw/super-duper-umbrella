<?php 
	require_once "conn.php";
 ?>

 <?php 

 	if(isset($_POST['submit'])){
 		$ownername = $_POST['adname'];
 		$image = $_FILES['file'];
 		$link = $_POST['link'];
 		$start_date = $_POST['start'];
 		$end_date = $_POST['end'];

 		$imagefilename = $image['name'];
 		
 		$imagefileError = $image['error'];
 		
 		$imagefileTmp = $image['tmp_name'];
 		

 		$filename_separate = explode('.', $imagefilename);
 		

 		//$file_extension = strtolower($filename_separate[1]);
 		//print_r($file_extension);
 		//echo "<br>";

 		 $file_extension = strtolower(end($filename_separate));
 		
 		 $extension = array('jpeg','jpg','png','gif');
 		 if(in_array($file_extension, $extension)) {
 		 	$upload_image = "images/". $imagefilename;
 		 	move_uploaded_file($imagefileTmp, $upload_image);
 		 
 		 	$sql= "insert into `ads` (owner_name,photo,link,start,end) values('$ownername', '$upload_image','$link','$start_date','$end_date')";
 		 	$result = mysqli_query($conn,$sql);
 		 	if($result){
 		 		echo "
 		 			<script> alert('success');</script>
 		 		";
 		 	}else{
 		 		die(mysqli_error($conn));
 		 	}
 		 }
 	}

  ?>



 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  	
  	<style type="text/css">
  		body{
  			padding: 100px;
  		}
  	</style>
  </head>
  <body>
    
  	<div class="container">
  		<div class="row">
	  		<div class="col-3"></div>
	  		<div class="col-6">
	  			<div class="row">
	  				<div class="card">

	  					<div class="card-body mb-2">
	  							<form method="post" action="" enctype="multipart/form-data">
	  								<h2 class="text-secondary">Upload Ads</h2>
		  							<div class="form-group">
		  								<label class="form-label">Owner Name</label>
	  									<input type="text" name="adname" class="form-control">
		  							</div>
		  							<div class="form-group">
		  								<label class="form-label">Photo</label>
	  									<input type="File" name="file" class="form-control">
		  							</div>
		  							<div class="form-group">
		  								<label class="form-label">Link</label>
	  									<input type="text" name="link" class="form-control">
		  							</div>
		  							<div class="form-group">
		  								<label class="form-label">Start Date</label>
	  									<input type="date" name="start" class="form-control">
		  							</div>
		  							<div class="form-group">
		  								<label class="form-label">End Date</label>
	  									<input type="date" name="end" class="form-control">
		  							</div>
		  							<button class="btn btn-primary mt-2" name="submit">Publish</button>
	  							</form>
	  					</div>
	  				</div>
	  				
	  		</div>
	  		<div class="col-4">
	  			<div class="row">
	  				
	  			
	  			
	  		</div>
  		</div>
  	</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>