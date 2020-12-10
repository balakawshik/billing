<?php
if(!empty($_POST)){
	$name=$_POST['username'];
	$pwd=$_POST['password'];
	$con=mysqli_connect("localhost","root","","shop");
	$query="select id from users where name='".$name."' and password='".$pwd."'";
	$res=mysqli_query($con,$query);
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_array($res);
		session_start();
		$_SESSION['id']=$row['id'];
		header("location:dashboard.php");
		
		
	}
	else{
		echo"<script>alert('login Failed')</script>";
	}
	unset( $_POST);
}
?>
<!DOCTYPE html>

<html>
<head>
	<title>Admin Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>


<form class="col-md-4 mx-auto mt-5 card" method="post">
	<h3 class="text-center text-secondary mt-4 mb-4">Login</h3>
	<div class="input-group mb-3">
	  <div class="input-group-prepend">
		<span class="input-group-text" >@</span>
	  </div>
	  <input type="text" class="form-control" name="username" placeholder="Username" required>
	</div>
	<div class="input-group mb-3">
	  <div class="input-group-prepend">
		<span class="input-group-text" >
			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
			</svg>
		</span>
		</div>
	  <input type="password" class="form-control" name="password" placeholder="Password" required>
	</div>
	<div class="input-group mb-3 ">
		<input type="submit" class="btn btn-primary ">
	</div>
	<small class="text-right mb-3 text-primary"><a href="#">Forgot Password</a></small>
	

</form>
</body>
</html>