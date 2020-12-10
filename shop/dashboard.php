<?php
session_start();
if(!isset( $_SESSION['id'])){
	header("location:index.php");	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
	<a class="navbar-brand" href="#">Billing Software</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mx-auto">
			<li class="nav-item ">
				<a class="nav-link" href="index.php">Home</a>
			</li>
			
			<li class="nav-item active">
				<a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="sales">Billing</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="sales/payment.php">Payment</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Report
			</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="report/graph.php">Graphical</a>	
					<a class="dropdown-item" href="report/table.php">Table</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="purchase">Purchase</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="users">Create User</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i></a>
			</li>
		</ul>
	<form class="form-inline my-2 my-lg-0">
	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>
	</div>
</nav>
	
	<div class="container-fluid mt-5 pt-5 pb-5">
		
		<div class="row pt-5    ">
			<div class="col-md-3 mx-auto ">
				<div class="card p-2">
					<h4>Total Stock Quantity</h4>
					<div class="card-body bg-secondary text-white p-2">
						<h4 id="total_stock_quantity"></h4>
					</div>
				</div>
			</div>
			<div class="col-md-3 mx-auto ">
					<div class="card p-2">
						<h4>Total Invested Amount</h4>
						<div class="card-body bg-secondary text-white p-2">
							<h4 id="total_invest_amount"></h4>
						</div>
					</div>
			</div>
			<div class="col-md-3 mx-auto ">
					<div class="card p-2">
						<h4>Total Stock Amount</h4>
						<div class="card-body bg-secondary text-white p-2">
							<h4 id="total_stock_amount"></h4>
						</div>
					</div>
			</div>
			<div class="col-md-3 mx-auto ">
				<div class="card p-2">
					<h4>Orders : <span id="total_orders"></span></h4>
					<div class="card-body bg-secondary text-white p-2">
						<h4 id="total_order_amount"></h4>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row pt-4 ">
			<div class="col-md-3 mx-auto ">
				<div class="card p-2">
					<h4>Sell Quantity</h4>
					<div class="card-body bg-secondary text-white p-2">
						<h4 id="total_sold_quantity"></h4>
					</div>
				</div>
			</div>
			<div class="col-md-3 mx-auto ">
				<div class="card p-2">
					<h4>Sell Amount</h4>
					<div class="card-body bg-secondary text-white p-2">
						<h4 id="total_sold_amount"></h4>
					</div>
				</div>
			</div>
			<div class="col-md-3 mx-auto ">
				<div class="card p-2">
					<h4>Paid : <span id="total_paid_order"></span></h4>
					<div class="card-body bg-secondary text-white p-2">
						<h4 id="total_paid_amount"></h4>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row pt-4 ">
			<div class="col-md-3 mx-auto ">
				<div class="card p-2">
					<h4>Available Quantity</h4>
					<div class="card-body bg-secondary text-white p-2">
						<h4 id="total_available_quantity"></h4>
					</div>
				</div>
			</div>
			<div class="col-md-3 mx-auto ">
				<div class="card p-2">
					<h4>Available Amount</h4>
					<div class="card-body bg-secondary text-white p-2">
						<h4 id="total_available_amount"></h4>
					</div>
				</div>
			</div>
			<div class="col-md-3 mx-auto ">
				<div class="card p-2">
					<h4>UnPaid : <span id="total_unpaid_order"></span></h4>
					<div class="card-body bg-secondary text-white p-2">
						<h4 id="total_unpaid_amount"></h4>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="container-fluid mt-5">
		<div class="row pt-4 ">
			<div class="col-md-3 mx-auto ">
			<h3 class="text-center">Products</h3>
			<form id="product" class="jumbotron pt-4 pb-5">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" >ID</span>
					</div>
					<input type="number"  class="form-control" name="id" id="product_id" placeholder="Product ID" required>
					<button  id="product_get" class="btn btn-primary ml-2 float-right" >Get</button>
				</div>
				
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Item Name</span>
				  </div>
				  <input type="text" class="form-control" name="name" id="product_name" placeholder="Item name" required>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Type</span>
				  </div>
				  <input type="text" class="form-control" name="type" id="product_type"  required>
				</div>
				<div class="input-group mb-3">
					<textarea type="text" class="form-control" name="description" id="product_description" placeholder="Description" required></textarea>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Selling Price</span>
				  </div>
				  <input type="number" class="form-control" step=".01" name="price" id="product_price" placeholder="123.56" required>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Reorder Alert</span>
				  </div>
				  <input type="number" class="form-control"  name="reorder_quantity" id="product_reorder_quantity" placeholder="Quantity" required>
				</div>
				<button  id="product_delete" class="btn btn-danger float-right" >Delete</button>
				<button  id="product_save" class="btn btn-success mr-2 float-right" >Save</button>
				
			</form>
			</div>
			<div class="col-md-3 mx-auto ">
			<h3 class="text-center">Customer</h3>
			<form id="client" class="jumbotron pt-4 pb-5">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" >ID</span>
					</div>
					<input type="number"  class="form-control" name="id" id="client_id" placeholder="Client ID" required>
					<button  id="client_get" class="btn btn-primary ml-2 float-right" >Get</button>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Name</span>
				  </div>
				  <input type="text" class="form-control" name="name" id="client_name" placeholder="Customer name" required>
				</div>
				
				<div class="input-group mb-3">
					<textarea type="text" class="form-control" name="address" id="client_address" placeholder="Address" required></textarea>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" ><i class="fa fa-phone"></i></span>
					</div>
					<input type="number"  class="form-control" name="phone" id="client_phone" placeholder="Mobile Number" required>
				</div>
				
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="type">Cutomer Type</label>
					</div>
					<select class="custom-select" name="type" id="client_type">
						<option value="0">Regular</option>
						<option value="1">Wholesale</option>
						<option value="2">Unknown</option>
					</select>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" >GST</span>
					</div>
					<input type="text"  class="form-control" name="gst" id="client_gst" placeholder="GST Number" >
				</div>
				<button  id="client_delete" class="btn btn-danger float-right" >Delete</button>
				<button  id="client_save" class="btn btn-success mr-2 float-right" >Save</button>
				
				
			</form>
			</div>
			<div class="col-md-3 mx-auto ">
			<h3 class="text-center">Supplier</h3>
			<form id="supplier" class="jumbotron pt-4 pb-5">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" >ID</span>
					</div>
					<input type="number"  class="form-control" name="id" id="supplier_id" placeholder="Supplier ID" required>
					<button  id="supplier_get" class="btn btn-primary ml-2 float-right" >Get</button>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Name</span>
				  </div>
				  <input type="text" class="form-control" name="name" id="supplier_name" placeholder="Supplier name" required>
				</div>
				
				<div class="input-group mb-3">
					<textarea type="text" class="form-control" name="address" id="supplier_address" placeholder="Address" required></textarea>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" ><i class="fa fa-phone"></i></span>
					</div>
					<input type="number"  class="form-control" name="phone" id="supplier_phone" placeholder="Mobile Number" required>
				</div>
				
				<button  id="supplier_delete" class="btn btn-danger float-right" >Delete</button>
				<button  id="supplier_save" class="btn btn-success mr-2 float-right" >Save</button>
				
				
				
			</form>
			</div>
			<div class="col-md-3 mx-auto ">
			<h3 class="text-center">Purchase</h3>
			<form id="purcahse" class="jumbotron pt-4 pb-5">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
							<span class="input-group-text" >ID</span>
					</div>
						<input type="number"  class="form-control " name="id" id="purchase_id" placeholder="Purchase ID" required>
						<button  id="purchase_get" class="btn btn-primary ml-2 float-right" >Get</button>
				</div>
				
				
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Item Name</span>
				  </div>
				  <input type="text" class="form-control" name="name" id="purchase_name"  readonly>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Type</span>
				  </div>
				  <input type="text" class="form-control" name="type" id="purchase_type" readonly>
				</div>
				<div class="input-group mb-3">
					<textarea type="text" class="form-control" name="description" id="purchase_description" placeholder="Description" readonly></textarea>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Time</span>
				  </div>
				  <input type="text" class="form-control" name="time" id="purchase_time"  readonly>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Quantity</span>
				  </div>
				  <input type="text" class="form-control" name="quantity" id="purchase_quantity"  readonly>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Price</span>
				  </div>
				  <input type="text" class="form-control" name="price" id="purchase_price"  readonly>
				</div>
				<input type="hidden" id="purchase_product_id">
				
				<button  id="purchase_delete" class="btn btn-danger float-right" >Delete</button>
			</form>
			</div>
		</div>
		
	</div>
	<hr>
	<div class="container-fluid ">
		<div class="row  ">
			<div class="col-md-3  ">
			<h3 class="text-center">Returns</h3>
			<form id="return" class="jumbotron pt-4 pb-5">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" >ID</span>
					</div>
					<input type="number"  class="form-control" name="id" id="return_product_id" placeholder="Product ID" required>
					<button  id="return_product_get" class="btn btn-primary ml-2 float-right" >Get</button>
				</div>
				
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Item Name</span>
				  </div>
				  <input type="text" class="form-control" name="name" id="return_product_name" placeholder="Item name" required>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Type</span>
				  </div>
				  <input type="text" class="form-control" name="type" id="return_product_type" placeholder="Type" required>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Quantity</span>
				  </div>
				  <input type="number" class="form-control" name="quantity" id="return_product_quantity" placeholder="Quantity" required>
				</div>
				<button  id="return_btn" class="btn btn-secondary mr-2 float-right" >Return</button>
			</form>
		</div>
	</div>
<div id="alert_container" style="position:fixed; top:80px; right:10px;">
</div>
<script>
function alert_data(){
$.ajax({
	url:"alerts/alerts.php",
	success:function(data){
		console.log(data)
		if(data!=""){
			alert_data=JSON.parse(data);
			for(i in alert_data){
				$("#alert_container").append('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Low Quantity!</strong> '+alert_data[i][1]+" "+alert_data[i][4]+" - "+"Available : "+alert_data[i][2]+' Units. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				
			}
			$('.alert').alert()
		}
	}
})
}
alert_data();

</script>
<script>
$.ajax({
	url:"dash_statistics.php",
	type:"POST",
	data:"type=purchase",
	success:function(data){
		total_data=JSON.parse(data)
		$("#total_stock_quantity").html(total_data[0]);
		$("#total_invest_amount").html("Rs. "+parseFloat(total_data[1]).toFixed(2));
	}
})

$.ajax({
	url:"dash_statistics.php",
	type:"POST",
	data:"type=sold",
	success:function(data){
		sold_data=JSON.parse(data)
		$("#total_sold_quantity").html(sold_data[0]);
		$("#total_sold_amount").html("Rs. "+parseFloat(sold_data[1]).toFixed(2));
	}
})
$.ajax({
	url:"dash_statistics.php",
	type:"POST",
	data:"type=stock",
	success:function(data){
		stock_data=JSON.parse(data)
		$("#total_available_quantity").html(stock_data[0]);
		$("#total_available_amount").html("Rs. "+parseFloat(stock_data[1]).toFixed(2));
		
		//sellable amount
		var stock_amount=parseFloat(sold_data[1])+parseFloat(stock_data[1]);
		
		$("#total_stock_amount").html("Rs. "+stock_amount.toFixed(2));
	}
})

$.ajax({
	url:"dash_statistics.php",
	type:"POST",
	data:"type=payment",
	success:function(data){
		order_data=JSON.parse(data)
		$("#total_orders").html(order_data[0]);
		$("#total_order_amount").html("Rs. "+parseFloat(order_data[3]).toFixed(2));
		$("#total_paid_order").html(order_data[1]);
		$("#total_paid_amount").html("Rs. "+parseFloat(order_data[4]).toFixed(2));
		$("#total_unpaid_order").html(order_data[2]);
		$("#total_unpaid_amount").html("Rs. "+parseFloat(order_data[5]).toFixed(2));
	}
})
</script>
<script>

$(document).on("click","#client_get",function(e){
	e.preventDefault()
	var id=$("#client_id").val()
	if(id!=""){
		$.ajax({
			url:"customer/customer_details.php",
			data:"customer_id="+id,
			type:"POST",
			success:function(data){
				console.log(data)
				if(data!="" ){
					client_json=JSON.parse(data)
					$("#client_name").val(client_json[1])
					$("#client_address").val(client_json[2])
					$("#client_phone").val(client_json[3])
					
					$("#client_type>option:eq("+client_json[4]+")").attr('selected',true)
					$("#client_gst").val(client_json[5])
				}
				else{
					alert("some problem in parsing the data")
					console.log(data);
				}
			}
		})
	}
	
})
$(document).on("click","#client_save",function(e){
	e.preventDefault()
	var form_data=$("#client").serialize();
	$.ajax({
		url:"customer/manage.php",
		data:form_data+"&edit=1",
		type:"POST",
		success:function(data){
			alert(data)
		}
		
	})
})
$(document).on("click","#client_delete",function(e){
	e.preventDefault()
	var id=$("#client_id").val();
	$.ajax({
		url:"customer/manage.php",
		data:"id="+id+"&delete=1",
		type:"POST",
		success:function(data){
			alert(data)
		}
		
	})
})
</script>	
<script>
$(document).on("click","#product_get",function(e){
	e.preventDefault()
	
	var id=$("#product_id").val()
	if(id!=""){
		$.ajax({
			url:"product/product_details.php",
			data:"product_id="+id,
			type:"POST",
			success:function(data){
				console.log(data)
				if(data!="" ){
					product_json=JSON.parse(data)
					
					$("#product_name").val(product_json[1])
					$("#product_type").val(product_json[4])
					$("#product_description").val(product_json[5])
					
					$("#product_price").val(product_json[3])
					$("#product_reorder_quantity").val(product_json[6])
				}
				else{
					alert("some problem in parsing the data")
					console.log(data);
				}
			}
		})
	}
	


})
$(document).on("click","#product_save",function(e){
	e.preventDefault()
	var form_data=$("#product").serialize();
	$.ajax({
		url:"product/manage.php",
		data:form_data+"&edit=1",
		type:"POST",
		success:function(data){
			alert(data)
		}
		
	})
})
$(document).on("click","#product_delete",function(e){
	e.preventDefault()
	var id=$("#product_id").val();
	$.ajax({
		url:"product/manage.php",
		data:"id="+id+"&delete=1",
		type:"POST",
		success:function(data){
			alert(data)
		}
		
	})
})
</script>

<script>
$(document).on("click","#supplier_get",function(e){
	e.preventDefault()
	var id=$("#supplier_id").val()
	if(id!=""){
		$.ajax({
			url:"supplier/supplier_details.php",
			data:"supplier_id="+id,
			type:"POST",
			success:function(data){
				console.log(data)
				if(data!="" ){
					supplier_json=JSON.parse(data)
					$("#supplier_name").val(supplier_json[1])
					$("#supplier_address").val(supplier_json[2])
					$("#supplier_phone").val(supplier_json[3])
					
				}
				else{
					alert("some problem in parsing the data")
					console.log(data);
				}
			}
		})
	}
	
})
$(document).on("click","#supplier_save",function(e){
	e.preventDefault()
	var form_data=$("#supplier").serialize();
	$.ajax({
		url:"supplier/manage.php",
		data:form_data+"&edit=1",
		type:"POST",
		success:function(data){
			alert(data)
		}
		
	})
})
$(document).on("click","#supplier_delete",function(e){
	e.preventDefault()
	var id=$("#supplier_id").val();
	$.ajax({
		url:"supplier/manage.php",
		data:"id="+id+"&delete=1",
		type:"POST",
		success:function(data){
			alert(data)
		}
		
	})
})
</script>	

<script>
$(document).on("click","#purchase_get",function(e){
	
	e.preventDefault()
	var id=$("#purchase_id").val()
	if(id!=""){
		$.ajax({
			url:"purchase/purchase_details.php",
			data:"purchase_id="+id,
			type:"POST",
			success:function(data){
				console.log(data)
				h=data
				if(data!="" && data[0]!="<"  ){
					purchase_json=JSON.parse(data)
					console.log(purchase_json)
					$("#purchase_name").val(purchase_json[7])
					$("#purchase_type").val(purchase_json[10])
					$("#purchase_description").val(purchase_json[11])
					$("#purchase_time").val(purchase_json[4])
					$("#purchase_quantity").val(purchase_json[3])
					$("#purchase_price").val(purchase_json[5])
					$("#purchase_product_id").val(purchase_json[1])
					
				}
				else {
					alert("some problem in parsing the data")
					console.log(data);
				}
			}
		})
	}
	
})
var h;

$(document).on("click","#purchase_delete",function(e){
	
	e.preventDefault()
	var id=$("#purchase_id").val();
	var qty=$("#purchase_quantity").val();
	var product_id=$("#purchase_product_id").val();
	$.ajax({
		url:"purchase/manage.php",
		data:"id="+id+"&qty="+qty+"&product_id="+product_id+"&delete=1",
		type:"POST",
		success:function(data){
			alert(data)
		}
		
	})
})


$(document).on("click","#return_product_get",function(e){
	e.preventDefault()
	
	var id=$("#return_product_id").val()
	if(id!=""){
		$.ajax({
			url:"product/product_details.php",
			data:"product_id="+id,
			type:"POST",
			success:function(data){
				console.log(data)
				if(data!="" ){
					product_json=JSON.parse(data)
					
					$("#return_product_name").val(product_json[1])
					$("#return_product_type").val(product_json[4])
					
				}
				else{
					alert("some problem in parsing the data")
					console.log(data);
				}
			}
		})
	}
	


})
$(document).on("click","#return_btn",function(e){
	e.preventDefault()
	var form_data=$("#return").serialize();
	console.log(form_data)
	$.ajax({
		url:"return/manage.php",
		data:form_data+"&new=1",
		type:"POST",
		success:function(data){
			alert(data)
		}
		
	})
})

</script>

</body>

</html>
