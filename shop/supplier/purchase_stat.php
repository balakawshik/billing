<?php
if(!empty($_POST)){
	include("../connection.php");
	if($con){
		$type=$_POST['type'];
		$for=$_POST['for'];
		
		if($for=="1"){
			if($type=="1"){
				
				$query="SELECT sum(purchase_qty*purchase_price) as amount,sum(purchase_qty) as qty,DATE(`date`) as day
				FROM `purchase`  
				where DATE(date)>='".$_POST['from']."' and DATE(date)<='".$_POST['to']."' 
				group by DATE(date)
				ORDER BY date";
				$json=array();

				$res=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($res)){
					$day[]=$row['day'];
					$amount[]=$row['amount'];
					$qty[]=$row['qty'];
				}
				$json[]=$amount;
				$json[]=$qty;
				$json[]=$day;
				echo json_encode($json);

			}
			elseif($type=="2"){
				$query="SELECT sum(purchase_qty*purchase_price) as amount,sum(purchase_qty) as qty,
				DATE_FORMAT( date, '%b - %Y' ) AS month
				FROM `purchase`  
				where DATE(date)>='".$_POST['from']."' and DATE(date)<='".$_POST['to']."' 
				GROUP BY EXTRACT(MONTH from `date`),EXTRACT(YEAR from  `date`)
				ORDER BY date";
				
				$json=array();

				$res=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($res)){
					$month[]=$row['month'];
					$amount[]=$row['amount'];
					$qty[]=$row['qty'];
				}
				$json[]=$amount;
				$json[]=$qty;
				$json[]=$month;
				echo json_encode($json);

			}
			elseif($type=='3'){
				$query="SELECT sum(purchase_qty*purchase_price) as amount,sum(purchase_qty) as qty,
				EXTRACT(year from date) as year
				FROM `purchase`  
				where DATE(date)>='".$_POST['from']."' and DATE(date)<='".$_POST['to']."' 
				GROUP BY EXTRACT(YEAR from  `date`)
				ORDER BY date";
				
				$json=array();

				$res=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($res)){
					$year[]=$row['year'];
					$amount[]=$row['amount'];
					$qty[]=$row['qty'];
				}
				$json[]=$amount;
				$json[]=$qty;
				$json[]=$year;
				echo json_encode($json);

			}
		}	
		elseif($for=='2'){
			if($type=='1'){
				
				$query="SELECT sum(qty*price) as amount,sum(qty) as qty ,DATE(`date`) as day
				FROM `bills` natural join sales
				where DATE(date)>='".$_POST['from']."' and DATE(date)<='".$_POST['to']."'
				group by DATE(date)
				ORDER BY date";
				$json=array();
				
				$res=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($res)){
					$day[]=$row['day'];
					$amount[]=$row['amount'];
					$qty[]=$row['qty'];
				}
				$json[]=$amount;
				$json[]=$qty;
				$json[]=$day;
				
				echo json_encode($json);
			}
			elseif($type=='3'){
				$query="SELECT sum(qty*price) as amount,sum(qty) as qty ,
				 EXTRACT(YEAR from  date) as year
				FROM `bills` natural join sales
				where DATE(date)>='".$_POST['from']."' and DATE(date)<='".$_POST['to']."' 
				GROUP BY EXTRACT(YEAR from  date)
				ORDER BY date";
				$json=array();
				
				$res=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($res)){
					$year[]=$row['year'];
					$amount[]=$row['amount'];
					$qty[]=$row['qty'];
				}
				$json[]=$amount;
				$json[]=$qty;
				$json[]=$year;
				
				echo json_encode($json);
			}
			elseif($type=='2'){
				$query="SELECT sum(qty*price) as amount,sum(qty) as qty ,
				 DATE_FORMAT( DATE, '%b - %Y' ) AS month
				FROM `bills` natural join sales
				where DATE(date)>='".$_POST['from']."' and DATE(date)<='".$_POST['to']."' 
				GROUP BY EXTRACT(MONTH from date),EXTRACT(YEAR from  date)
				ORDER BY date";
				$json=array();
				
				$res=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($res)){
					$month[]=$row['month'];
					$amount[]=$row['amount'];
					$qty[]=$row['qty'];
				}
				$json[]=$amount;
				$json[]=$qty;
				$json[]=$month;
				
				echo json_encode($json);
			}
		}
		elseif($for=='3'){
			if($type=='1'){
				$query="SELECT sum(amount) as amount,sum(amount-paid) as unpaid,sum(paid) as paid ,DATE(`date`) as day
				FROM `bills`
				where DATE(date)>='".$_POST['from']."' and DATE(date)<='".$_POST['to']."' 
				group by DATE(date)
				ORDER BY date";
				$json=array();
				
				$res=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($res)){
					$day[]=$row['day'];
					$paid[]=$row['paid'];
					$unpaid[]=$row['unpaid'];
					
				}
				$json[]=$paid;
				$json[]=$unpaid;
				$json[]=$day;
				
				echo json_encode($json);
			
			}
			elseif($type=='2'){
				$query="SELECT sum(amount) as amount,sum(amount-paid) as unpaid,sum(paid) as paid ,
				DATE_FORMAT( DATE, '%b - %Y' ) AS month
				FROM `bills`
				where DATE(date)>='".$_POST['from']."' and DATE(date)<='".$_POST['to']."' 
				GROUP BY EXTRACT(MONTH from date),EXTRACT(YEAR from  date)
				ORDER BY date";
				$json=array();
				
				$res=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($res)){
					$month[]=$row['month'];
					$paid[]=$row['paid'];
					$unpaid[]=$row['unpaid'];
					
				}
				$json[]=$paid;
				$json[]=$unpaid;
				$json[]=$month;
				
				echo json_encode($json);
			
			}
			elseif($type=='3'){
				$query="SELECT sum(amount) as amount,sum(amount-paid) as unpaid,sum(paid) as paid ,
				EXTRACT(year from date) as year
				FROM `bills`
				where DATE(date)>='".$_POST['from']."' and DATE(date)<='".$_POST['to']."' 
				GROUP BY EXTRACT(YEAR from  date)
				ORDER BY date";
				$json=array();
				
				$res=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($res)){
					$year[]=$row['year'];
					$paid[]=$row['paid'];
					$unpaid[]=$row['unpaid'];
									}
				$json[]=$paid;
				$json[]=$unpaid;
				$json[]=$year;
				
				echo json_encode($json);
			}
		}
	}
	
}
?>

