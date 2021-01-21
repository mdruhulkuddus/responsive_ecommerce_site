<?php
	@session_start();
	$session=session_id();
	//print $session;
	include("database/db_connect.php");
	//print $db_message;
	

	$select_customer_information=mysql_query("select * from coustomer_information_bd where session_id='$session'");
	$fetch_cus=mysql_fetch_row($select_customer_information);
	
	$select_delivery_information=mysql_query("select * from delivery_information_bd where session_id='$session'");
	$fetch_del=mysql_fetch_row($select_delivery_information);
	
	
	
?>	
<html>
	<head></head>
	<body>
		<form method="post" >
		<div class="col-lg-9 well" style="background:#f4f4f4; text-align:center; overflow:hidden">
		<div class="table-responsive" style="background:#f0f0f0;">
				
		<table width="78%" height="709"  cellpadding="0" cellspacing="0" style=" background:#FFFFFF; margin:auto" style="border:1px solid #000000;" >
  <tr>
    <td height="70"><table width="100%" height="57" border="0" cellpadding="0" cellspacing="0" style="background-color:#0099FF; border:2px #0099CC solid; box-shadow:5px 5px 5px # 8F8F8F;">
      <tr>
        <td align="center" style="color:#FFFFFF; font-family:'Courier New', Courier, monospace;"><h3><b>Your Invoice</b></h3></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="58" align="center"  ><img src="image/FFture.JPG" height="80px" width="90px" ><span style=" color:#006633; font-family:'Courier New', Courier, monospace; font-size:30px; "><b>Online Shopining.com</b></span>
	<p><h4 style="color:#006666">mdeasin_fci@yahoo.com</h4></p>
	<p><h5 style="color:#006666">Mobile: 01845709663,</h5></p>
	<p><h5 style="color:#006666">feni,sbit,Road-102</h5></p>
	</td>
  </tr>
  <tr>
    <td><table width="101%" height="290" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="50%" height="237"><table width="94%" height="261" border="1" bordercolor="#F0F0F0" cellpadding="0" cellspacing="0" style="margin-left:10px;">
          <tr>
            <td height="61" colspan="2" align="center" style="color:#006633; font-family:'Times New Roman', Times, serif;"><h3>Your Informtion</h3></td>
            </tr>
          <tr>
            <td><div align="center">Name</div></td>
            <td><?php print $fetch_cus[1] ?></td>
          </tr>
          <tr>
            <td><div align="center">Full Address </div></td>
            <td><?php print $fetch_cus[2] ?></td>
          </tr>
          <tr>
            <td width="27%"><div align="center">Phone Number </div></td>
            <td width="73%"><img  src="images/<?php print $fetch_cus[0]?>.jpg" height="50Ppx" width="50px"/></td>
          </tr>
        </table></td>
        <td width="50%"><table width="94%" height="243" border="1" bordercolor="#F0F0F0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="56" colspan="2" align="center" style="font-family:'Times New Roman', Times, serif; color:#006633;"><h3>Delivery Information</h3></td>
            </tr>
          <tr>
            <td width="26%"><div align="center">Name </div></td>
            <td width="74%"><?php print $fetch_del[6] ?></td>
          </tr>
          <tr>
            <td><div align="center">Full Address </div></td>
            <td><?php print $fetch_del[4] ?></td>
          </tr>
          <tr>
            <td height="53"><div align="center">Phone Number </div></td>
            <td><?php print $fetch_del[5] ?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" height="172" border="1" bordercolor="#f0f0f0" align="center" cellpadding="0" cellspacing="0" bgcolor="#f4f4f4">
		  <tr bgcolor="#00CC99">
			<td height="30" colspan="7" bgcolor="#ccc"><div align="center"  >
			    <h1 style="color:#000; font-size:22px; word-spacing:5px; ">Shoping Details </h1> 
						</div></td>
			  		</tr>
	 	  <tr bgcolor="#CCCCCC">
			<td width="7%" height="65" bgcolor="#FFFFFF"><div align="center">SL. No </div></td>
						
			<td width="15%" bgcolor="#FFFFFF"><div align="center">Product Name </div></td>
			<td width="24%" bgcolor="#FFFFFF"><div align="center">Product Image </div></td>
			<td width="21%" bgcolor="#FFFFFF"><div align="center">Product Details </div></td>
			<td width="11%" bgcolor="#FFFFFF"><div align="center">Quantity</div></td>
			<td width="10%" bgcolor="#FFFFFF"><div align="center">Price</div></td>
			<td width="20%" bgcolor="#FFFFFF"><div align="center">Total Price </div></td>
 	    </tr>
		  
		  <?php
		  $i=0;
		  $subtotal=0;
		  $select_shopping_card=mysql_query("select * from shopping_card where session_id='$session'");
		//  print "select * from shopping_card where session_id='$session'";
			while($fetch=mysql_fetch_array($select_shopping_card))
			{
			$i++;
		  ?>
		  <tr>
				<td height="24" align="center" bgcolor="#FFFFFF"><?php print $i;?></td>
				
				<td align="center" bgcolor="#FFFFFF"><?php print $fetch[2] ?> </td>
				<td align="center" bgcolor="#FFFFFF"><img  src="images/<?php print $fetch[1]?>.jpg" height="50Ppx" width="50px"/></td>
				<td align="center" bgcolor="#FFFFFF"><?php print $fetch[5] ?></td>
				<td align="center" bgcolor="#FFFFFF"><?php print $fetch[4] ?></td>
				<td align="center" bgcolor="#FFFFFF"><?php print $fetch[3] ?></td>
				<td bgcolor="#FFFFFF">
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
		  	
			<td height="28" colspan="6" align="right" bgcolor="#FFFFFF"><strong>Total Price:</strong> &nbsp;&nbsp;   </td>
			<td width="2%" bgcolor="#FFFFFF"><?php print $subtotal;?></td>
		  </tr>
	</table></td>
  </tr>
  <tr>
   <td height="43" align="center"><input type="submit" name="finish" value="Finish Invoce" /> <input type="submit" value="Print Invoce" onClick="window.print()" /></td>
    
  </tr>
  <tr>
	<td height="29" align="center">&nbsp;</td>  
  </tr>
</table>
</table>
		
		</div>
		
		
		
		</div>
	</form>
	</body>
	</html>	