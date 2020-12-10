<?php
session_start();
if(!isset( $_SESSION['id'])){
	header("location:../index.php");	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	
		.print table tr th , .print table tr td{
				font-size:0.9rem;
			
		}
		.print table tr{
			line-height:5px;
		}
		
	</style>
	
	<style>
		
		.print{
			display:none;
			
		}
	</style>
	<style>
         #divResize { 
			position:absolute;
			top:100px;
			background:white;
            border:dashed 2px #aaa;
			height:300px;
			overflow:scroll;
            padding:5px; 
            margin:5px;
            cursor:move; 
            float:left;
			box-shadow:5px 5px 7px 0px rgba(100,100,100,0.3);
        } 
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
				<a class="nav-link" href="../index.php">Home</a>
			</li>
			
			<li class="nav-item ">
				<a class="nav-link" href="../dashboard.php">Dashboard </a>
			</li>
			<li class="nav-item active">
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

<div class=" print container mt-4 table table-bordered ">
	<div class="row mt-4">	
		<div class=" col-12 w-100">
			<div class="text-center ">
				<h4 >Nova Agencies</h4>
				<p>3332/2-A1 Anthony Samy nagar, Thanjavur - 613001</p>
			</div>
			<div class="row">
				<div class="font-weight-bold pl-5 col-6">GSTIN: 33BUUPM89781ZX</div>
				<div class="col-6 pr-5 text-right">
				<span class="font-weight-bold">Phone:</span> 8940877087, 9791470938</div>
			</div>
			<hr>
			
		</div>
	</div>
	<div class="row">
		
		
		<div class="col-md-8">
			<h5 id="print_client_name">To:</h5>
			<span id="print_client_GST"></span><br>	
			<span id="print_client_address"></span><br>			
			<span id="print_client_phone"></span><br>
		</div>
		<div class="col-md-4 ">
			<h5 id="invoice_no">Invoice No.9</h5>
			<h6 id="invoice_date">Date:09/12/2020</h6>
		</div>
		
	</div>
		
		<table class="table mt-2 table-bordered">
			<thead>
					<tr>
						<th style="width:8%;">S.No</th>
						<th style="width:44%;">Name</th>
						<th style="width:8%;">Kgs</th>
						<th style="width:8%;">Pcs</th>
						<th style="width:8%;">Rate</th>
						<th style="width:9%;">GST %</th>
						<th style="width:15%;">Amount</th>
						
					</tr>
					
				</thead>
				<tbody id="print_table">		
				</tbody >
				
		</table>
		<table class="table  table-bordered">
			<tr class="text-center">
					<th >Taxable value</th>
					<th colspan=2>CGST</th>
					<th colspan=2>SGST</th>
					<th>TOTAL</th>
					<th class="print_total" style="width:15%;"></th>
				</tr>
				<tr class="text-center">
					<td></td>
					<td >Rate</td>
					<td >Amount</td>
					<td >Rate</td>
					<td >Amount</td>
					<td>Discount</td>
					<td id="print_discount"></td>
				</tr>
				<tr class="text-center">
					<td class="final_amount"></td>
					<td >2.50</td>
					<td class="gst"></td>
					<td >2.50</td>
					<td class="gst"></td>
					<td>CGST</td>
					<td class="gst"></td>
				</tr>
				<tr class="text-center">
					<td ></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>SGST</td>
					<td class="gst"></td>
				</tr>
				
				<tr class=" text-center">
					
					<th colspan=6>BILL AMOUNT</th>
					<td class="final_amount" colspan=1></td>
				</tr>
		</table>
		<table class="table">
		
				<tr class="  text-center">
					
					<th style="width:25%;">AMOUNT PAID</th>
					<td style="width:25%;" id="print_amount_paid" ></td>
					<th style="width:25%;">BALANCE</th>
					<td style="width:25%;" id="print_amount_balance"></td>
				</tr>
		</table>
		<div class="row mt-5 ">
		<div class="col-md-1"></div>
		<div class="col-md-5">Receiver's Signature</div>
		<div class="col-md-5 text-right">Authorized Signature</div>
		<div class="col-md-1"></div>
		</div>
		<hr>
</div>
<div class="no-print container-fluid mt-5">
	<div class="row pt-3">
		<div class="col-md-3 mx-auto ">
			<button class="btn btn-primary open_customer_table m-3"><i class="fa fa-folder-open"></i></button>
			<form class="jumbotron pt-4 pb-5" id="add_customer">
				
				<h3 class="text-center">Add Customer</h3>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" >Name</span>
				  </div>
				  <input type="text" class="form-control" name="name" placeholder="Customer name" required>
				</div>
				<div class="input-group mb-3">
					<textarea type="text" class="form-control" name="address" placeholder="Address" required></textarea>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" ><i class="fa fa-phone"></i></span>
					</div>
					<input type="text"  class="form-control" name="phone" placeholder="Mobile Number" pattern="^[0-9]{10}" title="Must be 10 digits" required>
				</div>
				
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="type">Cutomer Type</label>
					</div>
					<select class="custom-select" name="type" id="type">
						
						<option value="0" selected>Regular</option>
						<option value="1">Wholesale</option>
						<option value="2">Unknown</option>
					</select>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" >GST</span>
					</div>
					<input   class="form-control" name="gst" placeholder="GST Number" >
				</div>
				<input type="submit" class="btn btn-success float-right" value="Add ">
				
			</form>
		</div>
		<div class="col-md-4">
			<form class="jumbotron pl-2 pr-2 pt-4 pb-2 mb-3" id="sales_form" method="post">
				<h3 class="text-center">Billing</h3>
				<div class="form-row">
					<div class="input-group col-6 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" >ID</span>
						</div>
						<input type="number"  class="form-control" name="customer_id" id="bill_customer_id" placeholder="Customer ID" >
					</div>
					<div class="input-group col-6 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" ><i class="fa fa-phone"></i></span>
						</div>
						<input type="number"  class="form-control" name="phone" id="bill_customer_phone" placeholder="Mobile Number" >
					</div>
					
				</div>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>GST</th>
						<th>Type</th>
					</tr>
					<tr>
						<td id="bill_customer_name" ></td>
						<td id="bill_customer_GST"></td>
						<td id="bill_customer_type"></td>
					</tr>
				</table>
				<div class="form-row">
					
					<div class=" col-3 mb-3">
						<small class="font-weight-bold">Product ID</small>
					</div>
				
					<div class="col-3">
						<small class="font-weight-bold">Name</small>
					</div>
					<div class="col-3">
						<small class="font-weight-bold">Type</small>
					</div>
					<div class="col-3">
						<small class="font-weight-bold">QTY</small>
					</div>
					
				</div>
				<div id="products">
					<div class="form-row mb-3">
						
						<div class="input-group-sm  col-3 ">
							
							<input type="number"  class="form-control" name="product_id" id="product_id" placeholder="Product ID" required>
						</div>
						<div class="input-group-sm col-3 ">
							
							<input   class="form-control" name="product_name" list="products_list" id="product_name" placeholder="Item Name" required>
							
								<datalist id="products_list">
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
							
							<input class="form-control" id="product_type" list='type_list' name="product_type" placeholder="ex. 0.5kg" required>
								<datalist id="type_list">
								</datalist>
						</div>
						<div class="input-group-sm col-3 ">
							
							<input type="number"   step=".01" class="form-control" id="product_quantity" name="product_quantity" placeholder="ex. 12" required>
						</div>

						<div id="product_description" class="p-2"></div>
					</div>
					<div class='form-row'>
						<div class="input-group col-6 ">
							<div class="input-group-prepend">
								<span class="input-group-text" >Price</span>
							</div>
							<input type="number" value=0 step=".01" class="form-control" name="product_price" id="product_price" placeholder=""  required >
						</div>
						<button id="add_product" class="btn-sm btn-primary float-right">Add</button>	
					</div>
				</div>
				
			</form>
			<div class="jumbotron p-4">
				<h5 class="text-center">Discount</h5>
				<div class="custom-control custom-radio">
					<input type="radio" id="discount_type_amount"  name="discount_type" class="custom-control-input" checked>
					<label class="custom-control-label" for="discount_type_amount">Amount</label>
				</div>
				<div class="custom-control custom-radio mb-3">
					<input type="radio" id="discount_type_percent" name="discount_type" class="custom-control-input" >
					<label class="custom-control-label" for="discount_type_percent" >Percentage</label>
				</div>
				<div class="input-group col-12 ">
					<div class="input-group-prepend">
						<span class="input-group-text" >Discount</span>
					</div>
					<input type="number" value=0 step=".01" class="form-control"  id="discount" placeholder="" required >
				</div>
			</div>
			
		</div>
		<div class="col-md-5">
		<table  class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Name</th>
						<th>QTY</th>
						<th>Rate</th>
						<th>Price</th>
						<th>Delete</th>
					</tr>
					
				</thead>
				<tbody id="bill_table">
				</tbody >
				
			</table>
			<div class="card">
				<button id="bill_total_refresh" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
				<div id="bill_details" class="card-body">
					<div id="amount_details">
						<h5 class="w-100" id="sum_bill_amount"></h5>
						<h5 class="w-100" id="discount_amount"></h5>
						<h5 class="w-100" id="discount_on_bill_in_percent"></h5>
						<h5 class="w-100" id="total_bill_amount"></h5>
					</div>
					<span id="bill_status"></span>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" >Paid</span>
						</div>
						<input type="number" step=".01" id="bill_amount_paid" value=0 class="form-control" placeholder="Amount Paid" required />
					</div>
					<button id="confirm_bill" class="btn btn-secondary">Confirm</button>
				</div>
			</div>
		</div>
	</div>
	<div id="divResize">
        I am Draggable and Resizable 
    </div>
</div>
<script>
$(document).on("submit","#add_customer",function(e){
	e.preventDefault()
	var client_data=$(this).serialize()
	console.log(client_data)
	$.ajax({
		url:"../customer/manage.php",
		data:client_data+"&new=1",
		type:"POST",
		success:function(data){
			alert(data)
			document.forms["add_customer"].reset()
			
		}
	})
})
</script>
<script>
function print_table(){
	var i=1;
	$("#print_table").html("");
	var sum_amount=0;
	for(key in product_json){
		values=product_json[key];
		var amount=parseFloat(values[3])*parseFloat(values[4]);
		matches=(values[1]+values[2]).match(/(\d+)/)
		var kgs="-"
		if(matches){
			var unit_weight=matches[0]
			kgs=parseFloat(unit_weight*values[3]/1000).toFixed(2)
		}
		sum_amount+=amount;
		$("#print_table").append(`
			<tr id='`+key+`'>
				<td  class='text-right'>`+i+`</td>
				<td>`+values[1]+" - "+values[2]+`</td>
				<td  class='text-right'>`+kgs+`</td>
				<td  class='text-right'>`+values[3]+`</td>
				<td  class='text-right'>`+values[4]+`</td>
				<td>5%</td>
				<td  class='text-right'>`+amount.toFixed(2)+`</td>
				
			</tr>
			`);
		
		i=i+1;
		
	}
}
</script>
<script>

function fill_customer_details(json_data){
	customer_json=JSON.parse(json_data);
	console.log(customer_json);
	cus_type=new Array(4);
	cus_type=["Regular","Wholesale","Unknown"]
	$("#bill_customer_id").val(customer_json[0]);
	$("#bill_customer_phone").val(customer_json[3]);
	$("#bill_customer_GST").html(customer_json[5]);
	$("#bill_customer_name").html(customer_json[1]);
	$("#bill_customer_type").html(cus_type[customer_json[4]]);
	
	
}
$(document).on("keyup","#bill_customer_id",function(){
	var customer_id=$(this).val();
	$.ajax({
		url:"../customer/customer_details.php",
		data:"customer_id="+customer_id,
		type:'POST',
		success:function(data){
			if(data!=""){
				fill_customer_details(data);
				if($("#bill_customer_id").hasClass("is-invalid")){
					$("#bill_customer_id").removeClass("is-invalid")
				}
				$("#bill_customer_id").addClass("is-valid");
			}
			else{
				if($("#bill_customer_id").hasClass("is-valid")){
					$("#bill_customer_id").removeClass("is-valid")
				}
				$("#bill_customer_id").addClass("is-invalid");
			}
		}
		
	})
});
$(document).on("keyup","#bill_customer_phone",function(){
	var customer_phone =$(this).val();
	$.ajax({
		url:"../customer/customer_details.php",
		data:"customer_phone="+customer_phone,
		type:'POST',
		success:function(data){
			if(data!=""){
				fill_customer_details(data);
				if($("#bill_customer_phone").hasClass("is-invalid")){
					$("#bill_customer_phone").removeClass("is-invalid")
				}
				$("#bill_customer_phone").addClass("is-valid");
			}
			else{
				if($("#bill_customer_phone").hasClass("is-valid")){
					$("#bill_customer_id").removeClass("is-valid")
				}
				$("#bill_customer_phone").addClass("is-invalid");
			}
		}
		
	})
});

</script>
<script>
product_detail_json={};
product_json={}
index=0;
</script>
<script>

$(document).on("keyup","#product_id",function(){
	var id=$(this).val();
	
	if(id!=""){
		$.ajax({
			url:"product_details.php",
			data:"product_id="+id,
			type:'POST',
			success:function(data){
				console.log(data)
				if(data!=""){
					product_detail_json=JSON.parse(data);
					
					if($("#product_id").addClass("is-invalid")){
						$("#product_id").removeClass("is-invalid");
						$("#product_id").addClass("is-valid");
					}
					else{
						$("#product_id").addClass("is-valid");
					}
					
					$("#product_name").val(product_detail_json['product_name']);
					$("#product_type").val(product_detail_json['type']);
					$("#product_price").val(product_detail_json['selling_price']);
					$("#product_quantity").attr("max",parseFloat(product_detail_json['qty']));
					$("#product_quantity").attr("placeholder","<"+parseFloat(product_detail_json['qty']));
					$("#product_description").html("Description: "+product_detail_json['description']);
				}
				else{
					if($("#product_id").hasClass("is-valid")){
						$("#product_id").removeClass("is-valid");
						$("#product_id").addClass("is-invalid");
					}
					else{
						$("#product_id").addClass("is-invalid");
					}
				}

			}
		})
	}
});
	
	
	
$(document).on("change","#product_name",function(){
	var name=$(this).val();
		
	if(name!=""){
		$.ajax({
			url:"product_details.php",
			data:"product_name="+name,
			type:'POST',
			success:function(data){
				
				$("#type_list").html(data);
			}
		})
	}
});
$(document).on("change","#product_type",function(){
	var type=$(this).val();
	var name=$("#product_name").val();
	
	if(type!="" && name!=""){
		$.ajax({
			url:"product_details.php",
			type:"POST",
			data:"product_name="+name+"&type="+type,
			success:function(data){
				if(data!=""){
					product_detail_json=JSON.parse(data);
					$("#product_id").val(product_detail_json['product_id']);
					if($("#product_id").addClass("is-invalid")){
						$("#product_id").removeClass("is-invalid");
						$("#product_id").addClass("is-valid");
					}
					else{
						$("#product_id").addClass("is-valid");
					}
					$("#product_price").val(product_detail_json['selling_price']);
					$("#product_quantity").attr("max",parseFloat(product_detail_json['qty']));
					$("#product_quantity").attr("placeholder","<"+parseFloat(product_detail_json['qty']));
					$("#product_description").html("Description: "+product_detail_json['description']);
				}
				else{
					if($("#product_id").hasClass("is-valid")){
						$("#product_id").removeClass("is-valid");
						$("#product_id").addClass("is-invalid");
					}
					else{
						$("#product_id").addClass("is-invalid");
					}
				}
			}
		})
	}
})
function restructure_bill_table(){
	var i=1;
	$("#bill_table").html("");
	var sum_amount=0;
	for(key in product_json){
		values=product_json[key];
		var amount=parseFloat(values[3])*parseFloat(values[4]);
		
		sum_amount+=amount;
		$("#bill_table").append(`
			<tr id='`+key+`'>
				<td>`+i+`</td>
				<td>`+values[1]+" - "+values[2]+`</td>
				<td>`+values[3]+`</td>
				<td>`+values[4]+`</td>
				<td>`+amount.toFixed(2)+`</td>
				<td><button class="btn btn-danger">X</button></td>
			</tr>
			`);
		
		i=i+1;
		
	}
	sum_amount=parseFloat(sum_amount).toFixed(2);
	var percent_option=$("#discount_type_percent").is(":checked");
	if(percent_option){
		if($('#discount').val()!=""){
			var discount=parseFloat($('#discount').val());
		}
		else{
			var discount=0;
		}
		total_amount=parseFloat(sum_amount)-parseFloat(sum_amount)*discount/100;
		discount_amount=parseFloat(sum_amount)*discount/100;
		
	}
	else{
		if($('#discount').val()!=""){
			var discount_amount=parseFloat($('#discount').val());
		}
		else{
			var discount_amount=0;
		}
		total_amount=parseFloat(sum_amount)-parseFloat(discount_amount);
		var discount=parseFloat(discount_amount)/parseFloat(sum_amount)*100;
		
		var discount=discount.toFixed(2)
		
	}
	$("#sum_bill_amount").html("Sub Total: <span id='SBA' class='float-right'>"+sum_amount+"</span>");
	$("#discount_amount").html("Discount Amount:<span id='DA' class='float-right'>"+discount_amount.toFixed(2)+"</span>");
	$("#discount_on_bill_in_percent").html("Discount (%) :<span id='DBP' class='float-right'>"+discount+"</span>");
	$("#total_bill_amount").html("Amount Payable : <span id='TBA' class='float-right'>"+total_amount.toFixed(2)+"</span>");
	
}
</script>
<script>

	var p_id=$("#product_id");
	var p_name=$("#product_name");
	var p_quantity=$("#product_quantity");
	var p_type=$("#product_type");
	var p_price=$("#product_price");
	var p_desc=$("#product_description");
	
$(document).on("click","#add_product",function(e){
	id=p_id.val();
	quantity=p_quantity.val();
	max_quantity=parseFloat(p_quantity.attr("max"));
	name=p_name.val();
	type= p_type.val();
	price=p_price.val();
	
	if(id!="" && quantity!="" && name!="" && type!="" && price!="" && quantity<=max_quantity){
			e.preventDefault();
			product_json[index]=[id,name,type,quantity,price];
			p_id.val("");
			p_id.removeClass("is-valid");
			p_id.removeClass("is-invalid");
			p_name.val("");
			p_type.val("");
			p_price.val("0");
			p_quantity.val("");
			p_desc.html("");
			index=index+1;
			restructure_bill_table();	
	}
	
});
$(document).on("click",".btn-danger",function(){
	var row=$(this).parent().parent();
	var row_id=row.attr("id");
	delete product_json[row_id];
	row.remove();
	restructure_bill_table();
	
});

$(document).on("click","#bill_total_refresh",function(){
	restructure_bill_table();
});


</script>

<script>
$(document).on("click","#confirm_bill",function(){
	restructure_bill_table();
	total=$("#TBA").html();
	paid=$("#bill_amount_paid").val();
	discount=$("#DBP").html();
	bill_customer_id=$("#bill_customer_id").val();
	if($("#bill_table").html()!="" && bill_customer_id!="" ){
		$.ajax({
			url:"bill.php",
			type:"POST",
			data:"json="+JSON.stringify(product_json)+"&total="+total+"&paid="+paid+"&discount="+discount+"&customer_id="+bill_customer_id,
			success:function(data){
				console.log(data);
				var bill_status_json=JSON.parse(data);
				$("#bill_status").html("Billing "+bill_status_json[0]);
				if(bill_status_json[0]=="success"){
					$("#bill_status").addClass("badge mb-2 badge-success");
					$("#confirm_bill").remove();
					$("#bill_details").append("<button id='print_bill' class='btn float-right btn-primary'>Print</button>'");
					print_table();
					var d =new Date();
					$("#print_bill_details").html($("#amount_details").html());
					$("#invoice_no").html("Invoice No. "+bill_status_json[1]);
					$("title").html("Invoice No. "+bill_status_json[1])
					$("#invoice_date").html("Date. "+d.toLocaleDateString());
					$("#print_amount_paid").html("Rs."+parseFloat(paid).toFixed(2)+" /-");
					var balance=parseFloat(total).toFixed(2)-parseFloat(paid).toFixed(2);
					var gst=parseFloat(total).toFixed(2)*2.5/100;
					$(".gst").html(gst.toFixed(2))
					$(".print_total").html($("#SBA").html())
					$("#print_discount").html($("#DA").html())
					$(".final_amount").html($("#TBA").html())
					$("#print_amount_balance").html("Rs."+balance.toFixed(2)+" /-");
					$("#print_client_name").html("To : "+customer_json[1]);
					
					$("#print_client_address").html("Address : "+customer_json[2]);
					$("#print_client_phone").html("Phone : "+customer_json[3]);
					var gstnumber=customer_json[5].length>5?customer_json[5]:"---------------"
					$("#print_client_GST").html("GST No. "+gstnumber);
					
				}
				else{
					$("#bill_status").addClass("badge badge-danger mb-2");
				}
				
			}
		})
	}
	else{
		alert("No Items added or Customer ID missing");
	}
});
</script>
<script>
$(document).on("click","#print_bill",function(){
	window.print()
})
var key=0;
$(document).ready(function(){
	$(document).keypress(function(e){
		
		
		if(e.which==0){
			
			key=e.which
			$("#product_price").removeAttr("readonly")
		}
	
		else if(e.keycode==0){
				alert("hi")
				$("#product_price").removeAttr("readonly")
		}
		if(e.which==17){
			
			key=e.which
			$("#product_price").attr("readonly","true")
		}
	
		else if(e.keycode==17){
				alert("hi")
				$("#product_price").attr("readonly","true")
		}
		
		
		
	})
})
</script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
$("#divResize").hide()
function customer(){
	$.ajax({
		url:"../customer/customer_table.php",
		success:function(data){
			$("#divResize").html(data)
		}
	})
}
$(document).on("click",".open_customer_table",function(){
	customer()
	$("#divResize").show()
})

$(document).on("click",".btn-warning",function(){
	$("#divResize").hide()
})
$(function() { $("#divResize").draggable().resizable(); });
customer();
</script>

</body>
</html>
<style type="text/css">
		@media print{
			.print{
				display:block;
				
			}
			*{
			font-size:20px;
			}
			.no-print{
				display:none;
			}
		}
		
</style>