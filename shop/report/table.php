<?php
session_start();
if(!isset( $_SESSION['id'])){
	header("location:../index.php");	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tabular Report</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<style>
		
		
	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark no-print">
	<a class="navbar-brand" href="#">Billing Software</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mx-auto">
			<li class="nav-item ">
				<a class="nav-link" href="index.php">Home</a>
			</li>
			
			<li class="nav-item ">
				<a class="nav-link" href="../dashboard.php">Dashboard </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../sales">Billing</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../sales/payment.php">Payment</a>
			</li>
			<li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Report
			</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../report/graph.php">Graphical</a>	
					<a class="dropdown-item" href="../report/table.php">Table</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../purchase">Purchase</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="../users">Create User</a>
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

<div class="container-fluid mt-5">
	<div class="row pt-4 no-print">
		<div class="col-md-10 mx-auto">
			<div class="form-row ">
				<input id="report_from" class="form-control col-2 mx-auto " value="2019-10-10" type="date"/><br>
				<input id="report_to" class="form-control col-2 mx-auto" value="2020-12-10" type="date"/><br>
				<select class="custom-select col-2 mx-auto" name="report_for" id="report_for">
					
					<option value="1" selected>Purchase</option>
					<option value="2">Sales ( C )</option>
					<option value="3">Sales ( GST )	</option>
					<option value="4">GST Print</option>
					<option value="5">Full Print</option>
					<option value="6">Stock Report</option>
					<option value="7">Product Report</option>
					<option value="8">Returns Report</option>
					
					
				</select>
				<button class="btn btn-primary col-2 mx-auto" id="report_generate">Generate</button>
			</div>
		</div>
	</div>
	<div class="row mt-5 ">
		<h3 class="mx-auto mb-3" id="report_type"></h3>
		<div id="table_container" class="col-md-11 mx-auto">
		</div>
	</div>
</div>
<script>
var d=new Date();
var year=d.getFullYear().toString()
var month=(1+d.getMonth()).toString().length==1?"0"+(1+d.getMonth()).toString():(1+d.getMonth()).toString()
var date=d.getDate().toString().length==1?"0"+d.getDate().toString():d.getDate().toString()
$("#report_from").val(year+"-01-01")
$("#report_to").val(year+"-"+month+"-"+date)

</script>
<script>
var from_date=$("#report_from").val()
var to_date=$("#report_to").val()
var report_for=$("#report_for").val()

//script to get tabule form details
function getTable(from_date,to_date,report_for){
	
	$.ajax({
		url:"tabular_data.php",
		data:"from="+from_date+"&to="+to_date+"&for="+report_for,
		type:"POST",
		success:function(data){
			$("#table_container").html(data)
		}
	})
	$("#report_type").html(" Report From "+from_date+" To "+to_date)
}

 getTable(from_date,to_date,report_for)
$(document).on("click","#report_generate",function(){
		var report_from=$("#report_from").val()
		var report_to=$("#report_to").val()
		var report_for=$("#report_for").val()
		getTable(report_from,report_to,report_for)
})

</script>
</body>
</html>
<style type="text/css">
		@media print{
			
			.no-print{
				display:none;
			}
		}
		
</style>