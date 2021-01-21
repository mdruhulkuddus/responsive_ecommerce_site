<?php
$categoryName=$_GET["categoryName"];
$itemName=$_GET["itemName"];
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
				 	
				 
				 	<div class="col-lg-12" style="background:#0099FF; font-family:'Times New Roman', Times, serif; color:#FFFFFF"><h4><?php print $categoryName ?></h2></div>
				 	
					
					<?php
					$select_pdt=mysql_query("SELECT * FROM productinformation WHERE Item_name='$itemName' and Category_name='$categoryName'");
					while($fetch_pdt=mysql_fetch_array($select_pdt))
					{
					?>
					
					<div class="col-lg-4 well" style="background:#FFFFFF; overflow:hidden">
						<div class="col-lg-12 img" style="float:left"><img src="images/<?php  print $fetch_pdt['Product_id'] ?>.jpg" class="img-responsive" style=" height:181px; width:220px; "></div>
						<div class="col-lg-12" style="float:left; color:#009933; font-family:'Courier New', Courier, monospace; font-size:16px; font-weight:bold"><?php  print $fetch_pdt['Product_name'] ?></div>
						<div class="col-lg-12" style="float:left; color:#009933; font-family:'Courier New', Courier, monospace; font-size:16px;"><?php  print $fetch_pdt['Product_price'] ?>&#2547;</div>
						<div class="col-lg-12 details" style=" text-align:center; font-family:'Courier New', Courier, monospace; font-weight:bold; font-size:16px; border-radius:4px 4px;"><a href="index.php?page=datails&id=<?php  print $fetch_pdt['Product_id'] ?>">View Details</a></div>

					</div>
					<?php
					}
						
						?>
				 </div>
			</div>
			