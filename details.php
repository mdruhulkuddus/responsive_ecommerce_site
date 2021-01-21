<?php
	@session_start();
	$session=session_id();
	$date=date('d-m-y');

		include("database/db_connect.php");
		$id=$_GET["id"];
		$selet_pdt=mysql_query("SELECT * FROM productinformation WHERE Product_id='$id'  ");
		$fetch_pdt=mysql_fetch_array($selet_pdt);
		
		
		$quantity=$_POST["quantity"];
		$pdtID=$fetch_pdt['Product_id'];
		$pdtName=$fetch_pdt['Product_name'];
		$pdtPrice=$fetch_pdt['Product_price'];
		$pdtDetails=$fetch_pdt['Product_details'];
		$stock= $fetch_pdt['Product_stock'];

		if(isset($_POST["Buy"]))
		{
			if($quantity<=$stock)
			{
			mysql_query("INSERT INTO shopping_card (`session_id`,`product_id`,`product_name`,`product_price`,`quantity`,`product_details`,`date`) VALUES('$session','$pdtID','$pdtName','$pdtPrice','$quantity','$pdtDetails','$date')
		 ");
			print"<script>location='index.php?page=shop_card'</script>";
			}
			else
			{
				print"Your Order Not accepted .  plz submit Amount Order Less than Stock";
			}
			
		}	

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
  </head>
  <body>
  <form name="frmdetails" method="post">
  <style type="text/css">
				.item{ color:#006600; font-family:"Courier New", Courier, monospace; letter-spacing:0px; font-size:20px; padding-top:15px;}
				.item2{ color:#006600; font-family:"Courier New", Courier, monospace; letter-spacing:0px; font-size:24px; padding-top:15px;}
				.btn{ height:20px; width:100px; padding-bottom:30px; }
			</style>
			
   <div class="col-lg-9" style="background:#f0f0f0">
 		<div class="row well" style="background:#FFFFFF">
			<div class="col-lg-12" style="background:#0099FF; color:#FFFFFF; height:40px; font-size:26px; font-family:'Times New Roman', Times, serif; text-align:center; ">
			Product Details
			</div>
			<div class="col-lg-6" style="">
				<div class="col-lg-12" style="text-align:center">
					<img src="images/<?php  print $fetch_pdt['Product_id'] ?>.jpg"  height="250" width="300"/>
				</div>
			</div>
			
			
			
			<div class="col-lg-6" style="">
				<div class="col-lg-12 item2"><strong><?php  print $fetch_pdt['Category_name'] ?></strong> <i>class of the</i> <strong><?php  print $fetch_pdt['Item_name'] ?></strong> </div>
				<div class="col-lg-12 item"><strong>Model: </strong><?php print $fetch_pdt['Product_name'] ?></div>
				<div class="col-lg-12 item"><strong>ID No: </strong><?php print $fetch_pdt['Product_id'] ?></div>
				<div class="col-lg-12 item"><strong>Version: </strong><?php print $fetch_pdt['Product_details'] ?></div>
				<div class="col-lg-12 item"><strong>Stock: </strong> <?php print $fetch_pdt['Product_stock'] ?> pices</div>
				<div class="col-lg-12 item"><strong>Price: </strong><?php  print $fetch_pdt['Product_price'] ?> BDT Only</div>
			</div>
			<div class="col-lg-12" style=" text-align:center">
				<div class="col-lg-12"><span class="item"><strong>Amount of Order : </strong> </span> &nbsp;&nbsp;<input type="text" name="quantity" class="input"placeholder="insert your Order" required style="width:200px; height:25px; border-radius:2px; border:1px #91C2FE solid;" ><span class="item"> pices </span></div>
				<div class="col-lg-12"><input type="submit" name="Buy" value="Buy Now" class="btn" style="height:25px; width:200px; border:1px #FFFFFF solid; background:#3399FF; color:#FFFFFF; margin-top:10px;  margin-bottom:10px;" /> </div>
			</div>
			<div class="col-lg-12" style=" height:10px; background:#0099FF;">
				
			</div>
		</div>
		
		<div class="col-lg-12" style="background:#3399FF; color:#FFFFFF; text-align:center; font-size:28px; text-shadow:0px 2px 2px 3px #000; font-family:'Cataneo BT'; letter-spacing:1px;"><strong><i>Relational Product...</i></strong></div>
		
		
	</div>
    </form>
  </body>
</html>
		<?php
		$itemName=$fetch_pdt['Item_name'];
		$categoryName=$fetch_pdt['Category_name'];
		
		?>
		<div class="col-lg-9 well" style="background:#f4f4f4; text-align:center; overflow:hidden">
						 <style type="text/css">
							
								.details:hover{ color:#FFFFFF; cursor:pointer;}
								.img
								{
									transition:all 0.5s;
								}
								.img:hover
								{
									opacity:1;
									transform:scale(1.1);
								}
							</style>
							
						 
							<?php
							$select_pdt=mysql_query("SELECT * FROM productinformation WHERE Item_name='$itemName' and Category_name='$categoryName' ORDER BY RAND() limit 9");
							while($fetch_pdt=mysql_fetch_array($select_pdt))
							{
							?>
							
							<div class="col-lg-4 well" style="background:#FFFFFF; overflow:hidden">
								<div class="col-lg-12 img" style="float:left"><img src="images/<?php  print $fetch_pdt['Product_id'] ?>.jpg" class="img-responsive" style=" height:181px; width:220px; "></div>
								<div class="col-lg-12" style="float:left; font-family:'Courier New', Courier, monospace; font-size:16px; font-weight:bold"><?php  print $fetch_pdt['Product_name'] ?></div>
								<div class="col-lg-12" style="float:left; font-family:'Courier New', Courier, monospace; font-size:16px;"><?php  print $fetch_pdt['Product_price'] ?>&#2547;</div>
								<div class="col-lg-12 details" style=" text-align:center; font-family:'Courier New', Courier, monospace; font-weight:bold; font-size:16px; border-radius:4px 4px;"><a href="index.php?page=datails&id=<?php  print $fetch_pdt['Product_id'] ?>">View Details</a></div>
		
							</div>
							<?php
							}
								
								?>
						 </div>
					</div>
					