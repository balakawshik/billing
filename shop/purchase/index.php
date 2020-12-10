<?php
session_start();
if(!isset( $_SESSION['id'])){
	header("location:../index.php");	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Purchase</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<li class="nav-item active">
				<a class="nav-link" href="#">Purchase</a>
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
	
		<div class="col-md-3">
			<form class="jumbotron  pt-4 pb-5" id="add_product">
			<h2 class="text-center mb-4">Add Product</h2>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Item Name</span>
				  </div>
				  <input type="text" class="form-control" name="add_item_name" placeholder="Item name" required>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Type</span>
				  </div>
				  <input type="text" class="form-control" name="add_item_type" placeholder="Mutton-500" required>
				</div>
				<div class="input-group mb-3">
					<textarea type="text" class="form-control" name="add_item_description" placeholder="Description" required></textarea>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Selling Price</span>
				  </div>
				  <input type="number" class="form-control" step=".01" name="add_item_price" placeholder="123.56" required>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Reorder Alert</span>
				  </div>
				  <input type="number" class="form-control"  name="add_item_reorder_quantity" placeholder="Quantity" required>
				</div>
				<button class="btn btn-success float-right">Add</button>
			</form>
		</div>
		<div class="col-md-6">
			<form class="jumbotron pt-4 pb-3" id="purchase">
				<h2 class="text-center mb-4">Purchase Product</h2>
				<span class="font-weight-bold ">Product Details</span>
					<div class="form-row mt-2 mb-3" >
						<div class="input-group-sm  col-2 ">
							
							<input type="number"  class="form-control" name="product_id"  id="purchase_product_id" placeholder="Product ID" required>
						</div>
						<div class="input-group-sm col-3 ">
							
							<input   class="form-control purchase_product_name"  list="purchase_products_list"  placeholder="Item Name" required>
							
								<datalist id="purchase_products_list">
									<?php
										include("../connection.php");
										if($con){
											$query="select distinct `product_name` from product";
											$res=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($res)){
												echo'<option value="'.$row['product_name'].'">';
												
											}
											
										}
										
									?>
								</datalist>
						</div>
						<div class="input-group-sm col-3 ">
							
							<input class="form-control purchase_product_type" list='purchase_type_list' placeholder="Eg. Mutton-500" required>
								<datalist id="purchase_type_list">
								</datalist>
						</div>
						<div class="input-group-sm col-2 ">
							
							<input type="number"   step=".01" class="form-control" id="purchase_product_quantity" name="quantity" placeholder="Quantity" required>
						</div>
						<div class="input-group-sm  col-2 ">
							
							<input type="number" step=".01" class="form-control"  name="price" id="purchase_product_price" placeholder="Purch Price" required>
						</div>
						
					</div>
					<div id="product_quantity_details">
					
					</div>
					<span class="font-weight-bold ">Supplier Details</span>
					<div class="form-row mt-2 mb-3">
						<div class="input-group-sm  col-3 ">
							
							<input type="number"  class="form-control" name="supplier_id" id="purchase_supplier_id" placeholder="Supplier ID" required>
						</div>
						<div class="input-group-sm col-3 ">
							
							<input   class="form-control purchase_supplier_name" list="purchase_supplier_list"  placeholder="Supplier Name" required>
							
								<datalist id="purchase_supplier_list">
									<?php
										include("../connection.php");
										if($con){
											$query="select distinct `name` from supplier";
											$res=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($res)){
												echo'<option value="'.$row['name'].'">';
												
											}
											
										}
										
									?>
								</datalist>
						</div>
						<div class="input-group-sm  col-3 ">
							
							<input type="number"  class="form-control" id="purchase_supplier_phone" pattern="[0-9]{10}" title="Must be 10 Digits" placeholder="Phone Number" required>
						</div>
						
					</div>
					<button id="purchase_button" class="btn btn-primary ">Purchase</button>
			</form>
		</div>
		<div class="col-md-3">
		<form id="add_supplier_form"class="jumbotron pt-4 pb-5">
			<h2 class="text-center mb-4">Add Supplier</h2>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" >Name</span>
				</div>
				<input type="text" class="form-control custom-select " id="add_supplier_name" placeholder="Name" required>
			</div>
			<div class="input-group mb-3">
				<textarea type="text" class="form-control" id="add_supplier_address" placeholder="Address" required></textarea>
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fa fa-phone"></i></span>
				</div>
				<input type="text" class="form-control" placeholder="Phone" id="add_supplier_phone" pattern="^[0-9]{10}" title="Must be 10 digits"  required>
			</div>
			<button id="add_supplier_submit" class="btn btn-success float-right">Add</button>

		</form>
		</div>
			
	</div>
</div>
<!--script for Adding product-->
<script>
$(document).on("submit","#add_product",function(e){
	e.preventDefault();
	var form_data=$(this).serialize();
	$.ajax({
		url:"../product/add.php",
		data:form_data,
		type:"POST",
		success:function(data){
			alert(data);
			document.forms[1].reset();
		}
	})
});
</script>

<!--script for retrieving product details based on Product ID -->
<script>
$(document).on("keyup","#purchase_product_id",function(){
	var id=$(this).val();
	
	if(id!=""){
		$.ajax({
			url:"../sales/product_details.php",
			data:"product_id="+id,
			type:'POST',
			success:function(data){
				console.log(data)
				if(data!=""){
					product_detail_json=JSON.parse(data);
					
					if($("#purchase_product_id").addClass("is-invalid")){
						$("#purchase_product_id").removeClass("is-invalid");
						$("#purchase_product_id").addClass("is-valid");
					}
					else{
						$("#purchase_product_id").addClass("is-valid");
					}
					
					$(".purchase_product_name").val(product_detail_json['product_name']);
					$(".purchase_product_type").val(product_detail_json['type']);
					$("#product_quantity_details").html('<span>Available Quantity : '+product_detail_json[2]+'<br></span><span>Reorder Quantity : '+product_detail_json[6]+'</span>');
				}
				else{
					if($("#purchase_product_id").hasClass("is-valid")){
						$("#purchase_product_id").removeClass("is-valid");
						$("#purchase_product_id").addClass("is-invalid");
					}
					else{
						$("#purchase_product_id").addClass("is-invalid");
					}
				}

			}
		})
	}
});
</script>
<!--script for Purchasing product-->
<script>
<!--retrieving product type from database-->
$(document).on("change",".purchase_product_name",function(){
	var name=$(this).val();
	$.ajax({
		url:"../sales/product_details.php",
		data:"product_name="+name,
		type:"POST",
		success:function(data){
			$("#purchase_type_list").html(data);
		}
	})
})

<!--retrieving product id from database-->
$(document).on("change",".purchase_product_type",function(){
	var type=$(this).val();
	var name=$(".purchase_product_name").val();
	$.ajax({
		url:"../sales/product_details.php",
		data:"product_name="+name+"&type="+type,
		type:"POST",
		success:function(data){
			product_json=JSON.parse(data);
			$("#purchase_product_id").val(product_json[0])
			$("#product_quantity_details").html('<span>Available Quantity : '+product_json[2]+'<br></span><span>Reorder Quantity : '+product_json[6]+'</span>');
			
		}
	})
})
<!--retrieving supplier details from database-->
$(document).on("change",".purchase_supplier_name",function(){
	var name=$(this).val();
	$.ajax({
		url:"../supplier/supplier_details.php",
		data:"supplier_name="+name,
		type:"POST",
		success:function(data){
			supplier_json=JSON.parse(data);
			console.log(supplier_json);
			$("#purchase_supplier_id").val(supplier_json[0])
			$("#purchase_supplier_phone").val(supplier_json[3])
		}
	})
})

$(document).on("submit","#purchase",function(e){
	e.preventDefault();
	var form_data=$(this).serialize()
	$.ajax({
		url:"purchase.php",
		data:form_data,
		type:"POST",
		success:function(data){
			alert(data);
			document.forms["purchase"].reset();
		}
	})
})
</script>


<!--script for Adding supplier-->
<script>
<!--on click add supplier button post details to Localhost/supplier/add.php -->
$(document).on("click","#add_supplier_submit",function(e){
	var name=$("#add_supplier_name").val();
	var address=$("#add_supplier_address").val();
	var phone=$("#add_supplier_phone").val();
	if( name!="" && address!="" && phone!="" && phone.length==10){
		e.preventDefault()
		$.ajax({
			url:"../supplier/add.php",
			data:"add_supplier_name="+name+"&add_supplier_address="+address+"&add_supplier_phone="+phone,
			type:"POST",
			success:function(data){
				alert(data);
				document.forms["add_supplier_form"].reset();
			}
		})
	}
	
})
</script>

</body>
</html>