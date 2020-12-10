<?php
session_start();
if(!isset( $_SESSION['id'])){
	header("location:../index.php");	
}
?>
<!DOCTYPE html>

<html>
<head>
	<title>Create User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark no-print">
	<a class="navbar-brand" href="#">Billing Software</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mx-auto">
			<li class="nav-item ">
				<a class="nav-link" href="../index.php">Home</a>
			</li>
			
			<li class="nav-item ">
				<a class="nav-link" href="../dashboard.php">Dashboard </a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="../sales">Billing</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../sales/payment.php">Payment</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Report
			</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../report/graph.php">Graphical</a>	
					<a class="dropdown-item" href="../report/table.php">Table</a>
				</div>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="../purchase">Purchase</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="#">Create User</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="../logout.php"><i class="fa fa-sign-out"></i></a>
			</li>
		</ul>
	<form class="form-inline my-2 my-lg-0">
	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>
	</div>
</nav>

<form id="create_user" class="col-md-4 mx-auto mt-5 card">
	<h3 class="text-center text-secondary mt-4 mb-4">Create User</h3>
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
	  <input type="text" class="form-control" name="password" placeholder="Password" required>
	</div>
	<div class="input-group mb-3 ">
		<input type="submit" class="btn btn-primary ">
	</div>
	
	

</form>
<script>
$(document).on("submit","#create_user",function(e){
	e.preventDefault();
	var form_data=$(this).serialize();
	$.ajax({
		url:"create.php",
		data:form_data,
		type:"POST",
		success:function(data){
			alert(data)
			document.forms["create_user"].reset();
		}
	})
})
</script>
</body>
</html>