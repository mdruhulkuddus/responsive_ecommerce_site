<?php
@session_start();
$session=session_id();

include("database/db_connect.php");
	//print $db_message;
	
if(isset($_POST["submit2"]))
{	
	$x=$_POST["price"];
	print"<script>location='index.php?page=credit_trangition&balance=$x'</script>";
}


$m_name=$_POST["memName"];
$m_address=$_POST["memAddress"];
$m_contact=$_POST["memContact"];
$m_email=$_POST["memEmail"];
$m_password=$_POST["memPassword"];
$m_conPassword=$_POST["memConPassword"];



if(isset($_POST["submit2"]))
{
		if(!empty($m_name) && !empty($m_email) && !empty($m_password))
		{
				mysql_query("INSERT INTO coustomer_information_bd(`session_id`,`member_name`,`address`,`contact`,`email`,`password`,`confirm_password`) VALUE('$session','$m_name','$m_address','$m_contact','$m_email','$m_password','$m_conPassword')");
				
				$loc="../../images/$session.jpg";
			move_uploaded_file($_FILES['memImage']['tmp_name'],$loc);
				
				if(mysql_affected_rows()>0)
				{
					print"Data Insert Successfully";
				}
				else
				{
					print"Data Insert Unsuccessfully";
				}
			
		}	
		
		
		
		else
			{
				print"Insert Data of Customer Information<br>";
			}
}



$d_date=$_POST["delDate"];
$d_shipType=$_POST["shipType"];
$d_shipTO=$_POST["shipmentTo"];
$d_address=$_POST["shipAddress"];
$d_contact=$_POST["shipcontact"];
$d_email=$_POST["shipemail"];

if(isset($_POST["submit2"]))
{
		if(!empty($d_shipTO) && !empty($d_address) && !empty($d_contact))
		{
				mysql_query("INSERT INTO delivery_information_bd(`session_id`,`delivary_date`,`shipment_type`,`shipment_to`,`shipment_address`,`contact`,`email`) VALUE('$session','$d_date','$d_shipType','$d_shipTO','$d_address','$d_contact','$d_email')");
				
				if(mysql_affected_rows()>0)
				{
					print"Data Insert Successfully";
				}
				else
				{
					print"Data Insert Unsuccessfully";
				}
			
		}	
		
		
		
		else
			{
				print"Insert Data of Shipment Information";
			}
}

	if(isset($_POST["submit"]))
	{
	$email=$_POST["email"];
	$password=$_POST["pass"];
	
		$select_customer_information=mysql_query("select * from coustomer_information_bd where email='$email' and password='$password'");
		$fetch=mysql_fetch_row($select_customer_information);
		
}
?>

<html>
	<head></head>
	<body>
		<form method="post" >
		<div class="col-lg-9 well" style="background:#f4f4f4; text-align:center; overflow:hidden">
			<div class="row" style="background:#FFFFFF;">
				<div class="col-lg-12">
					<div class="col-lg-12" style="background:#0099FF; color:#FFFFFF; height:40px; font-size:26px; font-family:'Times New Roman', Times, serif; text-align:center; ">
						Order Form
					</div>
				</div>
				<div class="col-lg-12">
					<div class="col-lg-12" style="background:#ccc; text-align:left;"><input type="checkbox" />&nbsp;Already Member</div>
					<div class="col-lg-3 "></div>
					<div class="col-lg-4 col-sm-6" align="left">Member E-mail</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="text" name="email" /></div>
					<div class="col-lg-3"></div>
					<div class="col-lg-4 col-sm-6" align="left">Member Password</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="text" name="pass" /></div>
					<div class="col-lg-7"></div>
					<div class="col-lg-5" align="left"><input type="submit" value="submit" name="submit" /></div>
				</div>
				<div class="col-lg-12">
					<div class="col-lg-12" style="background:#ccc; text-align:left">Customer Information</div>
					<div class="col-lg-3 "></div>
					<div class="col-lg-4 col-sm-6" align="left">Member Name</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="text" name="memName" value="<?php print $fetch[1] ?>" /></div>
					<div class="col-lg-3"></div>
					<div class="col-lg-4 col-sm-6" align="left">Addess</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="text" name="memAddress" value="<?php print $fetch[2] ?>" /></div>
					<div class="col-lg-3 "></div>
					<div class="col-lg-4 col-sm-6" align="left">Contact</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="text" name="memContact" value="<?php print $fetch[3] ?>" /></div>
					<div class="col-lg-3"></div>
					<div class="col-lg-4 col-sm-6" align="left">E-mail</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="text" name="memEmail" value="<?php print $fetch[4] ?>" /></div>
					<div class="col-lg-3 "></div>
					<div class="col-lg-4 col-sm-6" align="left">Password</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="password" name="memPassword" value="<?php print $fetch[5] ?>" id="password" /></div>
					<div class="col-lg-3"></div>
					<div class="col-lg-4 col-sm-6" align="left">Confirm Password</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="password" name="memConPassword" value="<?php print $fetch[6] ?>" id="confirm_pass" /><span id="stutus"></span></div>
				</div>
				<div class="col-lg-12" style="overflow:hidden">
					<div class="col-lg-12" style="background:#ccc; text-align:left">Customer Information</div>
					<div class="col-lg-3 "></div>
					<div class="col-lg-4 col-sm-6" align="left">Delivary Date</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="text" name="delDate" /></div>
					<div class="col-lg-3"></div>
					<div class="col-lg-4 col-sm-6" align="left">Shipment Type</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="text" name="shipType" /></div>
					<div class="col-lg-3 "></div>
					<div class="col-lg-4 col-sm-6" align="left">Shipment To</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="text" name="shipmentTo" /></div>
					<div class="col-lg-3"></div>
					<div class="col-lg-4 col-sm-6" align="left">Shipment Address</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="text" name="shipAddress" /></div>
					<div class="col-lg-3 "></div>
					<div class="col-lg-4 col-sm-6" align="left">Contact</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="text" name="shipcontact" /></div>
					<div class="col-lg-3"></div>
					<div class="col-lg-4 col-sm-6" align="left">E-mail</div>
					<div class="col-lg-5 col-sm-6" align="left"><input type="text" name="shipemail" /></div>
				</div>
				
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="table-responsive" style="background:#FFFFFF;">
						<table class="table table-bordered">
						<thead>
							<tr>
								<td colspan="5" style="background:#0099FF; color:#FFFFFF; font-size:18px; font-family:'Courier New', Courier, monospace; height:15px; ">Shopping Details</td>
							</tr>
		 
		  				</thead>
					    <tbody>
						  <tr bgcolor="#F0F0F0" align="center">
							<th>SL. No </th>
							<th>Product Name  </th>
							<th>image </th>
							<th>Quantity </th>
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
					<td><?php print $fetch[2] ?> </td>
					<td><img  src="images/<?php print $fetch[1]?>.jpg" style="height:40px; width:40px;"/></td>
					<td><input type="text" name="UPquantity[]" value="<?php print $fetch[4] ?>" style="height:25px; width:40px; padding-left:20px;" >
					<input type="text" name="pdt_id[]" value="<?php print $fetch[1]?>" hidden >
					</td>
					<td>
						<?php
							$quantity=$fetch[4];
							$price=$fetch[3];
							$total_price=$quantity*$price;
							print"$total_price";
							$subtotal=$subtotal+$total_price;
						?>				
					</td>
		 	 </tr>
				  <?php }
				  ?>
			  
			  <tr bgcolor="#F0F0F0">
			  <td colspan="3"></td>
				<td><strong>Total Price:</strong> &nbsp;&nbsp;<input type="hidden" name="price" value="<?php print $subtotal;?>" >  </td>
				 <td> <strong><?php print $subtotal;?></strong></td>
			  </tr>
		 
		  </tbody>
		</table>
	
		</div>
		</div>
		<div class="col-lg-12">
					<input type="submit" value="submit" name="submit2" style="background:#0099FF; color:#FFFFFF; width:100px;" />
		</div>
		</div>
		
		</div>
		</form>
	</body>
</html>
