
<?php
include("../connection.php");
if($con and !empty($_POST) and isset($_POST['purchase_id']) ){
	$query="select * from purchase join product on purchase.product_id=product.product_id where purchase_id='".$_POST['purchase_id']."'";
	$res=mysqli_query($con,$query);
	if(mysqli_num_rows($res)==1){
		while($row=mysqli_fetch_array($res)){
			echo json_encode($row);
			
		}
	}
	
		
}

?>