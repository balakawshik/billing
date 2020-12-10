<?php
include("../connection.php");
if($con){
	if(isset($_POST['from']) and isset($_POST['to'])){
		$query="SELECT bill_id,bills.customer_id,name,phone,GST,amount,paid,discount,status,bills.date, amount-paid as balance
			FROM `bills` JOIN customer 
			on customer.customer_id=bills.customer_id
			where DATE(bills.date)>='".$_POST['from']."' and DATE(bills.date)<='".$_POST['to']."' ";
			$res=mysqli_query($con,$query);
			$str="	<table class='table table-hover table-bordered'>
						<thead>
							<tr>
								<th>S.No</th>
								<th>Bill ID</th>
								<th>Customer ID</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Amount</th>
								<th>Paid</th>
								<th>Balance</th>
								<th>Status</th>
								<th>Date</th>
							</tr>
						</thead>";
			$i=1;			
			while($row=mysqli_fetch_array($res)){
				
				
				$str.="	<tr bill_id='".$row['bill_id']."'>
							<td>".$i++."</td>
							<td>".$row['bill_id']."</td>
							<td>".$row['customer_id']."</td>
							<td>".$row['name']."</td>
							<td>".$row['phone']."</td>
							<td>".$row['amount']."</td>
							<td>".$row['paid']."</td>
							<td>".$row['balance']."</td>
							<td><a class='bill_paid'>Paid</a> | <a class='generate_bill'>Print</a> | <a class='cancel_bill'>Cancel</a></td>
							<td>".$row['date']."</td>
						</tr>";
							
			}
			$str.="</table>";
			echo $str;
		
	}
	elseif(isset($_POST['id'])){
		$query="SELECT bill_id,bills.customer_id,name,phone,GST,amount,paid,discount,status,bills.date, amount-paid as balance
			FROM `bills` JOIN customer 
			on customer.customer_id=bills.customer_id
			where bill_id=".$_POST['id'];
			$res=mysqli_query($con,$query);
			$str="	<table class='table table-hover table-bordered'>
						<thead>
							<tr>
								<th>S.No</th>
								<th>Bill ID</th>
								<th>Customer ID</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Amount</th>
								<th>Paid</th>
								<th>Balance</th>
								<th>Status</th>
								<th>Date</th>
							</tr>
						</thead>";
			$i=1;			
			while($row=mysqli_fetch_array($res)){
				
				
				$str.="	<tr bill_id='".$row['bill_id']."'>
							<td>".$i++."</td>
							<td>".$row['bill_id']."</td>
							<td>".$row['customer_id']."</td>
							<td>".$row['name']."</td>
							<td>".$row['phone']."</td>
							<td>".$row['amount']."</td>
							<td>".$row['paid']."</td>
							<td>".$row['balance']."</td>
							<td ><a class='bill_paid'>Paid</a> | <a class='generate_bill'>Print</a> | <a class='cancel_bill'>Cancel</a></td>
							<td>".$row['date']."</td>
						</tr>";
							
			}
			$str.="</table>";
			echo $str;
		
	}
}
?>
