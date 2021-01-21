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
						$select_item=mysql_query("select * from iteminformation");
						while($fetch_item=mysql_fetch_array($select_item))
						{
						
						?>
				 
				 	<div class="col-lg-12" style="background:#0099FF; font-family:'Times New Roman', Times, serif; color:#FFFFFF"><h4><?php print $fetch_item['Item_name']?></h2></div>
				 	
					
					<?php
					$select_pdt=mysql_query("select * from productinformation where Item_name='$fetch_item[Item_name]' ORDER BY RAND() limit 3");
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
						
							}
						?>
				 </div>
			</div>
			
			
		