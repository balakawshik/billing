<?php
session_start();
if(!isset( $_SESSION['id'])){
	header("location:../index.php");	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Graphical Report</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	
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
			<li class="nav-item  ">
				<a class="nav-link" href="../sales/payment.php">Payment</a>
			</li>
			<li class="nav-item dropdown  active">
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
	<div class="row pt-5">
		<div class="col-md-12 mb-5">
			<div class="form-row ">
				<input id="report_from" class="form-control col-2 mx-auto "  type="date"/><br>
				<input id="report_to" class="form-control col-2 mx-auto" type="date"/><br>
				<select class="custom-select col-2 mx-auto" name="report_type" id="report_type">
					
					<option value="1" selected>Daily</option>
					<option value="2">Monthly</option>
					<option value="3">Yearly</option>
				</select>
				<select class="custom-select col-2 mx-auto" name="report_for" id="report_for">
					
					<option value="1" selected>Purchase</option>
					<option value="2">Sales</option>
					<option value="3">Payment</option>
					
				</select>
				<button class="btn btn-primary col-2 mx-auto" id="report_generate">Generate</button>
			</div>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center" id="report_title"></h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-5 mx-auto">
			<div class="chart-container" style="position: relative; height:60vh; width:44vw">
				<canvas id="amount_chart"></canvas>
			</div>
		</div>
		<div class="col-md-5 mx-auto">
			<div class="chart-container" style="position: relative; height:60vh; width:44vw">
				<canvas id="quantity_chart"></canvas>
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
data_json={};

var amount_ctx = document.getElementById('amount_chart').getContext('2d');
var amount_chart = new Chart(amount_ctx, {
    // The type of chart we want to create
    type: 'line',
	
    // The data for our dataset
    data: {
        labels: [],
        datasets: [{
            
            backgroundColor:  ['rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(255, 99, 132, 1)'],
			borderWidth:1,
            data: []
        }]
    },

    // Configuration options go here
    options: {
		scales: {
            yAxes: [{
                stacked: true
            }]
        },
		responsive:true,
		maintainAspectRatio:false
	}
});


var quantity_ctx = document.getElementById('quantity_chart').getContext('2d');
var quantity_chart = new Chart(quantity_ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [],
        datasets: [{
            
            backgroundColor:  ['rgba(25, 99, 132, 0.2)'],
            borderColor: ['rgba(25, 99, 132, 1)'],
			borderWidth:1,
            data: []
        }]
    },

    // Configuration options go here
    options: {
		scales: {
            yAxes: [{
                stacked: true
            }]
        },
		responsive:true,
		maintainAspectRatio:false
	}
});

var d=new Date()
var from_date;
var to_date;
var report_type;
function title_change(){
	report_type=$("#report_type").val()
	report_for=$("#report_for").val()
	var title_for;
	var title_type;
	if(report_type=='1'){
		title_type="Daily ";
		
	}
	else if(report_type=='2'){
		title_type="Monthly ";
	}
	else if(report_type=='3'){
		title_type="Yearly ";
	}
	if(report_for=='1'){
		title_for="Purchase ";
		quantity_chart.data.datasets[0].label="Purcahsed Quantity"
		amount_chart.data.datasets[0].label="Purcahsed For Amount (Rs.)"
	}
	else if(report_for=='2'){
		title_for="Sales ";
		quantity_chart.data.datasets[0].label="Sold Quantity"
		amount_chart.data.datasets[0].label="Sold For Amount (Rs.)"
	}
	else if(report_for=='3'){
		title_for="Payment ";
		quantity_chart.data.datasets[0].label="UnPaid Amount"
		amount_chart.data.datasets[0].label="Paid Amount"
	}
	quantity_chart.update();
	amount_chart.update();
	$("#report_title").html(title_type+"Report for "+title_for)
	
}
function report_generate(){
	from_date=$("#report_from").val()
	to_date=$("#report_to").val();
	report_type=$("#report_type").val()
	report_for=$("#report_for").val()
	$.ajax({
		url:"statistics.php",
		data:"from="+from_date+"&to="+to_date+"&type="+report_type+"&for="+report_for,
		type:"POST",
		success:function(data){
			console.log(data);
			
			data_json=JSON.parse(data)
			console.log(data_json[0]);
			amount_chart.data.datasets[0].data=data_json[0]
			
			amount_chart.data.labels=data_json[2]
			amount_chart.update();
			quantity_chart.data.datasets[0].data=data_json[1]
			
			quantity_chart.data.labels=data_json[2]
			quantity_chart.update();
			title_change()
		}
	})
}
$(document).on("click","#report_generate",function(){
	
	report_generate()
})
report_generate()
//['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December']
</script>

</body>
</html>
