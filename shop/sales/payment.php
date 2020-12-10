<!DOCTYPE html>
<html>
<head>
	<title>Payment </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
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
			<li class="nav-item">
				<a class="nav-link" href="../sales">Billing</a>
			</li>
			<li class="nav-item active">
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
				</tbody>
				
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

	<div class="container-fluid mt-5 no-print">
		<div class="row  pt-5">
			<div class="col-md-10 mx-auto">
				<div class="form-row ">
					<input id="bill_from" class="form-control col-2 mx-auto "  type="date"><br>
					<input id="bill_to" class="form-control col-2 mx-auto"  type="date"><br>
					<button class="btn btn-primary col-2 mx-auto" id="get_bills">Generate</button>
					<label > OR </label>
					<input id="bill_id" class="form-control col-2 mx-auto" type="number" placeholder="Bill ID"><br>
					
					<button class="btn btn-primary col-2 mx-auto" id="get_bill">Get Bill</button>
				</div>
			</div>
		</div>
		
		<div class="row mt-5">
			
			<div id="table_container" class="col-md-10 mx-auto">
			</div>
		</div>
	</div>
<script>
var d=new Date();
var year=d.getFullYear().toString()
var month=(1+d.getMonth()).toString().length==1?"0"+(1+d.getMonth()).toString():(1+d.getMonth()).toString()
var date=d.getDate().toString().length==1?"0"+d.getDate().toString():d.getDate().toString()
$("#bill_from").val(year+"-01-01")
$("#bill_to").val(year+"-"+month+"-"+date)

</script>

<script>
function get_bills(){

	var from=$("#bill_from").val()
	var to=$("#bill_to").val()
	$.ajax({
		url:"get_bills.php",
		data:"from="+from+"&to="+to,
		type:"POST",
		success:function(data){
			$("#table_container").html(data)
		}
	})

}

$(document).on("click","#get_bill",function(){
	var id=$("#bill_id").val()
	if(id==""){
		alert("Bill ID is Empty");
		
	}
	else{
		$.ajax({
			url:"get_bills.php",
			data:"id="+id,
			type:"POST",
			success:function(data){
				$("#table_container").html(data)
			}
		})
	}
})
get_bills()
$(document).on("click","#get_bills",function(){
	get_bills()
})
$(document).on("click",".bill_paid",function(){
	var id=$(this).parent().parent().attr("bill_id")
	var paid=prompt("Enter amount Paid")
	if(paid==""){
		alert("Amount cant be empty")
	}
	else{
		$.ajax({
			url:"manage_bill.php",
			data:"id="+id+"&amount="+paid,
			type:"POST",
			success:function(data){
				alert(data);
			}
		})
	}
})
var data=0;
$(document).on("click",".generate_bill",function(){
	var id=$(this).parent().parent().attr("bill_id")
	$.ajax({
		url:"manage_bill.php",
		data:"id="+id,
		type:"POST",
		success:function(data){
			
			$("#print_table").html(data);
		}
	})
	
	$.ajax({
		url:"manage_bill.php",
		data:"id="+id+"&print=1",
		type:"POST",
		success:function(data){
	
			
			data=JSON.parse(data);
			console.log(data);
			$("#invoice_no").html("Invoice No. "+data[0])
			$("title").html("Invoice No. "+data[0])
			$("#invoice_date").html("Date. "+data[5])
			$("#print_client_name").html("To : "+data[7])
			$("#print_client_id").html("Client ID. "+data[1])
			$("#print_client_address").html("Address : "+data[8])
			$("#print_client_phone").html("Phone : "+data[9])
			var gst=(data[11]=="")? " ------------------ ":data[11]
			$("#print_client_GST").html("GST : "+gst)
			total=parseFloat(data[2])
			paid=parseFloat(data[4])
			var balance=parseFloat(total).toFixed(2)-parseFloat(paid).toFixed(2);
			var gst=parseFloat(total).toFixed(2)*2.5/100;
			$(".gst").html(gst.toFixed(2))
			
			$("#print_amount_paid").html("Rs."+data[4]+"/-")
			var balance=parseFloat(data[2])-parseFloat(data[4])
			$("#print_amount_balance").html("Rs."+balance.toFixed(2)+"/-")
			var sub_total=parseFloat(data[2])*100/(100-parseFloat(data[3]))
			var discount_amount=sub_total-parseFloat(data[2])
			
			$(".print_total").html(sub_total.toFixed(2))
			$("#print_discount").html(discount_amount.toFixed(2))
			$(".final_amount").html(parseFloat(data[2]).toFixed(2))

			window.print()
		}
	})
})
$(document).on("click",".cancel_bill",function(){
	var id=$(this).parent().parent().attr("bill_id")
	$.ajax({
		url:"manage_bill.php",
		data:"id="+id+"&cancel=1",
		type:"POST",
		success:function(data){
			alert(data)
		}
	})
})
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