
<?php
@session_start();
$session=session_id();
// print $session;
include("database/db_connect.php");
$date=date('d-m-y');
//print $date;
if(isset($_POST["CONFIRM"]))
{	
	print '<script>location="index.php?page=order_form"</script>';
	
}


if(isset($_POST["DELETE"]))
{
	$countcheek=count($_POST["cheek"]);
	//print $countcheek;
	for($z=0; $z<$countcheek; $z++)
	{
		$id=$_POST["cheek"][$z];
		//print $id;
		$sql=mysql_query("DELETE FROM shopping_card WHERE product_id='$id' AND session_id='$session' ");
		
	}
	if(mysql_affected_rows()>0)
		{
			print"<script>alert('Delete Successfully');</script>";
		}
		else
		{
			print"Delete UnSuccessfully plz Try again";
		}
}


if(isset($_POST["UPDATE"]))
{	
		$countcheek=count($_POST["UPquantity"]);
	for($z=0; $z<$countcheek; $z++){
		
		$pdt_id=$_POST["pdt_id"][$z];
		$addquantity=$_POST["UPquantity"][$z];;
		
		
		$select_pdt=mysql_query("SELECT * FROM productinformation WHERE Product_id='$pdt_id'");
		$fetch_pdt=mysql_fetch_array($select_pdt);
		$stock= $fetch_pdt['Product_stock'];
		
		if($addquantity<=$stock)
	
		{
			$sql=mysql_query("UPDATE shopping_card SET quantity='$addquantity' WHERE product_id='$pdt_id'");
			
			if($sql)
			{
				$sms="Update successfully";
			}
			else
			{
			$sms="Update unsuccessfully";
			}
		}
		else
		{
			print"Not enouhg product in stock & stock have $stock product";
		}
	}
	
}
?>
<?php print $sms ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
	<style>
		thead{ color:#006600; background:#F0F0F0; }
		
	</style>
	
	<script>
	
		function confirmdelete()
		{
			con_delete=confirm("Do you Want to delete ?");
			if(con_delete==true)
			{
				return true;
			}
			else
			{
				return false;
			}
		
		}
		
		function confirmupdate()
		{
			 con_update=confirm("Do You want To Update Now?");
			 if(con_update==true)
			 {
				return true;
			 }
			 else
			 {
				return false;
			 }
		 
		}
	</script>
</head>
	<body>
	<form method="post">
		<div class="col-lg-9 well" style="background:#f4f4f4; text-align:center; overflow:hidden">
		
		<div class="table-responsive" style="background:#FFFFFF;">
				<table class="table table-bordered">
				<thead>
						<tr>
							<td colspan="7" style="background:#0099FF; color:#FFFFFF; font-size:24px; font-family:'Courier New', Courier, monospace; height:40px; ">Shopping Card</td>
						</tr>
		 
		  </thead>
		  <tbody>
		  <tr bgcolor="#F0F0F0" align="center">
			<th>SL. No </th>
			<th>Mark </th>
			<th>Product Name  </th>
			<th>image </th>
			<th>Quantity </th>
			<th>Price </th>
			<th>Total Price </th>
		  </tr>
		  
		  <?php
		  $i=0;
		  $subtotal=0;
		  $select_shopping_card=mysql_query("select * from shopping_card where session_id='$session'");
		// print "select * from shopping_card where session_id='$session'";
			while($fetch=mysql_fetch_array($select_shopping_card))
			{
			$i++;
		  ?>
		  <tr>
				<td><?php print $i;?></td>
				<td><input type="checkbox" name="cheek[]" value="<?php print $fetch[1] ?>"></td>
				<td><?php print $fetch[2] ?> </td>
				<td><img  src="images/<?php print $fetch[1]?>.jpg" style="height:70px; width:50px;"/></td>
				<td><input type="text" name="UPquantity[]" value="<?php print $fetch[4] ?>" style="height:25px; width:40px; padding-left:20px;" >
				<input type="text" name="pdt_id[]" value="<?php print $fetch[1]?>" hidden >
				</td>
				<td><?php print $fetch[3] ?></td>
				<td>
					<?php
						$quantity=$fetch[4];
						$price=$fetch[3];
						$total_price=$quantity*$price;
						print"$total_price";
						$subtotal=$subtotal+$total_price;
					?>				</td>
		  </tr>
		  <?php }
		  ?>
		  <tr>
		  	<td colspan="7"></td>
		  </tr>
		  <tr bgcolor="#F0F0F0">
		  <td colspan="5" align="left"><strong>Date :</strong><?php print $date ?></td>
			<td><strong>Total Price:</strong> &nbsp;&nbsp;  </td>
			 <td> <strong><?php print $subtotal;?></strong></td>
		  </tr>
		  <tr>
			<td colspan="3" align="center">With 10% vat</td>
			<td colspan="4">&nbsp;</td>
		  </tr>
		  <tr bgcolor="#CCCCCC">
			<td  colspan="7" align="center">
				<input type="submit" value="DELETE" name="DELETE" class="btn" onClick="return confirmdelete();"  />
				<input type="submit" value="UPDATE" name="UPDATE" class="btn" onClick="return confirmupdate();" />
				<input type="submit" value="CONFIRM" name="CONFIRM" class="btn"  />			</td>
		  </tr>
		  </tbody>
	</table>
	
		</div>
	</div>
	</form>

</body>

</html>