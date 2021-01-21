<?php
	@session_start();
	$session=session_id();
	include("database/db_connect.php");
	$tatal_price=$_GET["balance"];
	//print"total price=$tatal_price<br>";
	
if(isset($_POST["submit"]))
{
	$cus_email=$_POST["email"];
	$cus_password=$_POST["pass"];
	
	$select_credit_card=mysql_query("select * from credit_card_user where email='$cus_email' and password='$cus_password'");
	$fetch=mysql_fetch_row($select_credit_card);
	
	$credit_email=$fetch[3];
	print"email=$credit_email<br>";
	$credit_pass=$fetch[4];
	print"pass=$credit_pass<br>";
	$credt_amount=$fetch[5];
	print"amount=$credt_amount<br>";
	
	if($cus_email==$credit_email && $cus_password==$credit_pass)
	{
		if($tatal_price<=$credt_amount)
		{
			$credit_balance=$credt_amount-$tatal_price;
			mysql_query("UPDATE credit_card_user SET amount='$credit_balance' WHERE email='$credit_email'");
			print"credit balance=$credit_balance";
			//<--update-successfully -->
		
		$sql=mysql_query("SELECT * FROM shopping_card WHERE session_id='$session'");
		while($fetch_shopcrd_all=mysql_fetch_array($sql)){
		
		$pdt_id=$fetch_shopcrd_all['product_id'];
		$pdt_quantity=$fetch_shopcrd_all['quantity'];
		
		$sqlP=mysql_query("SELECT * FROM productinformation WHERE Product_id='$pdt_id'");
		while($fetch_pdtInfo_all=mysql_fetch_array($sqlP))
		{
		$pdt_stock=$fetch_pdtInfo_all['Product_stock'];
		$sub_stock=$pdt_stock-$pdt_quantity;
		//print $sub_stock;
		$sql_pdt_update=mysql_query("UPDATE productinformation SET Product_stock='$sub_stock' WHERE Product_id='$pdt_id'");
		if($sql_pdt_update)
		{
		print "updaete successfully";
		print"<script>location='index.php?page=invoice'</script>";

		}
		else
		{
		print "update unsussfully";
		}
		}
		
		}
			
			}
			
			else
			{
			print"you have not enough balance at credit card";
			}
			
		}
		
		else
			{
				print"please insert right email & pass";
			}
				
	}
	

?>

<html>
	<head></head>
	<body>
		<form method="post" >
		<div class="col-lg-9 well" style="background:#f4f4f4; text-align:center; overflow:hidden">
			
			<div class="col-lg-12" style="background:#FFFFFF">
				<div class="col-lg-12" style="background:#0099FF; color:#FFFFFF; font-size:24px; font-family:'Courier New', Courier, monospace;">Credit Transaction</div>
				
				<div class="col-lg-12" style="background:#FFFFFF; height:30px"></div>
				<div class="col-lg-7 col-sm-7" style="color:#009933; font-size:22px; font-family:'Courier New', Courier, monospace;"><strong>Email</strong></div>
				<div class="col-lg-5 col-sm-5"><input type="text" class="form-control" name="email" required  /></div>
				<div class="col-lg-12" style="background:#FFFFFF; height:20px"></div>
				
				<div class="col-lg-7 col-sm-7" style="color:#009933; font-size:22px; font-family:'Courier New', Courier, monospace;"><strong>Password</strong></div>
				<div class="col-lg-5" col-sm-5><input type="text" name="pass" class="form-control" required /></div>
				<div class="col-lg-12" style="background:#FFFFFF; height:20px"></div>
				<div class="col-lg-12"><input type="submit" value="SUBMIT" class="btn-success" name="submit"  /><input type="reset" class="btn-info" value="CLEAR" /></div>
				<div class="col-lg-12" style="background:#FFFFFF; height:20px"></div>
				<div class="col-lg-12" style="background:#0099FF; height:20px;"></div>
			</div>
		
		
		
		
	`	</div>
	</form>
	</body>
	</html>	