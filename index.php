<?php
	
	@session_start();
	
	$session=session_id();
	microtime($session);
	//print $session;

		include("database/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>online shoping</title>
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="navbar.css" rel="stylesheet">

  </head>
  <body>
        <div class="container-fluid">
		
			<div class="col-lg-12"  >
				<div class="col-lg-6 col-md-12  col-xs-12" >
					<div class="col-lg-2 col-xs-12 col-md-4 col-xs-12 "  style="background:#ff0000">Mobile</div>
					<div class="col-lg-2 col-xs-12 col-md-4 col-xs-12"  style="background:#99CCCC">Email</div>
					<div class="col-ld-2 col-xs-12 col-md-4 col-xs-12" style="background:#ccc">Google+</div>
				</div>
	
				
				<div class="col-lg-6  col-md-12  col-xs-12 " style="float:right;">
					<div class="col-lg-6 col-xs-12 col-md-4" style="color:#0066FF; font-weight:bold; font-family:'Courier New', Courier, monospace; font-size:20px;" >Online Shopping</div>
					<div class="col-lg-2 col-xs-12 col-md-4 "  style="background:#5cb85c;  float:right; ">Mobile</div>
					<div class="col-lg-2 col-xs-12 col-md-4"  style="background:#ff0000; float:right; ">Email</div>
					<div class="col-lg-2 col-xs-12 col-md-4" style="background:#ccc; float:right; ">Google+</div>
				</div>
			</div>
			<!---- End top Menu -->
			
		
		<div  class="col-lg-12" style="overflow:hidden;">
		
			<div class="col-lg-4 col-md-6 col-xs-12"  > 
				<img src="image/ecommerce.jpg" class="img-responsive" style="width:100%; height:100px; "   >
			</div>
			
			<div class="col-lg-4 col-md-6 col-xs-12"  > 
			<form method="post" action="search.php">
				<input type="text"  class="form-control" name="txtsearch"  placeholder="Search" style="margin-top:20px; float:left; clear:right;">&nbsp;<input type="submit" name="search" class="btn-info" value="Search" style="float:right; ">
				</form>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12"  > 
				<p style=" color:#006600; font-weight:bold; font-family:'Courier New', Courier, monospace; font-size:36px;   padding-top:20px; text-align:center" >Skill Based IT</p>
				<p style="color:#003300; font-size:12px; text-align:center; text-transform:uppercase; font-weight:bold; margin-top:-15px; "><var><i>WE PROVIED ALL TECHNOLOGICAL & SHOPING SERVICEES...</i></var></p>
			</div>
		
		</div>
		
			
		<div class="col-lg-12">
					

		  <!-- Static navbar -->
		  <nav class="navbar navbar-default">
			
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="background:#0099FF; color:#FFFFFF">Project name</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="index.php?page=about">About</a></li>
              <li><a href="#">Contact</a></li>
			  <li><a href="index.php?page=shop_card">Cheek Out</a></li>
			  <li><a href="login.php">Administrator</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Laptop</a></li>
                  <li><a href="#">Monitor</a></li>
                  <li><a href="#">Hardware</a></li>
				  <li><a href="#">Mobile</a></li>
				  <li><a href="#">Television</a></li>
				  
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Others</li>
                  <li><a href="#">Electromix</a></li>
                  <li><a href="#">Electrical</a></li>
                </ul>
              </li>
            </ul>
           
      			</div><!--/.container-fluid -->
		</nav>

		</div>
		
	 
		
			 <div class="col-lg-5"  style="margin-top:-20px; overflow:hidden;" >
			  <?php include("no-jquery.html");?>
			</div>
			<div class="col-lg-3" style="  height:290px;  overflow:hidden;">
			  <img src="image/anigif.gif" style="width:100%; height:290px;">
			</div>
			<div class="col-lg-4" style="  overflow:hidden;">
			  <img src="image/neww.jpg" style="width:100%; height:290px; margin-top:-20px;">
			</div>
			
		
			
			<div class="col-lg-12" style="">
			
				<div class="col-lg-3 well" style="background:#F8F8F8">
					<?php
						$select_item=mysql_query("select * from iteminformation");
						while($fetch_item=mysql_fetch_array($select_item))
						{
						
						?>
					<div class="col-lg-12" style="background:#0099FF; font-family:'Times New Roman', Times, serif; color:#FFFFFF"><h4><a href="index.php?page=item&itemName=<?php print $fetch_item['Item_name']?>" style="color:#FFFFFF"><?php print $fetch_item['Item_name']?></a></h4></div>
					<div class="col-lg-12" style=" background:#f4f4f4"></div>
						<?php
						
							$select_cat=mysql_query("select * from  categoryinformation where Item_Name='$fetch_item[1]'");
							while($fetch_cat=mysql_fetch_array($select_cat))
							{?>
					 <div class="col-lg-12" style="background:#ffffff; font-family:'Times New Roman', Times, serif; color:#333333"><h4><a href="index.php?page=category&categoryName=<?php print $fetch_cat['Category_Name']?>&itemName=<?php print $fetch_item['Item_name']?>"><?php print $fetch_cat['Category_Name']?></a></h4></div>
					 <div class="col-lg-12" style="background:#ccc"></div>
					<?php
					}
							}
						?>
			
				 </div>
				 
				<div>
					
						<?php
							
							if(isset($_GET["page"]))
							{
								switch($_GET["page"])
								
								{
									case "datails";
									{
										include("details.php");
									}
									break;
									
									case "item";
									{
										include("item.php");
									}
									break;
									
									case "category";
									{
										include("category.php");
									}
									break;
									
									case "shop_card";
									{
										include("shopingcard.php");
									}
									break;
									
									case "order_form";
									{
										include("order.php");
									}
									break;
									
									case "credit_trangition";
									{
										include("credit transaction.php");
									}
									break;
									case "invoice";
									{
										include("invoice.php");
									}
									break;
									
									case "about";
									{
										include("about.php");
									}
									break;
								}
								
						
							}
							else
							{
								include("allproduct.php");
							}
						?>
				</div>
						<!-- start footer -->
		<div class="col-lg-12 well" style=" height:45px; background:#0099FF; color:#FFFFFF; text-align:center; font-size:15px; padding-top:10px; "><i>@Copyright  All Right Reserved SKILL BASED IT (<a href="facebook.com/md.easin.1297" style="color:#FFFFFF;">MD R.K. EASIN</a>)</i>
			
		</div>
				
		<!-- END footer -->
		
	</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script>
	
		$("#confirm_pass").keyup(function() {
			var pass = $("#password").val();
			var conFirmPass = $("#confirm_pass").val();
			if(pass==conFirmPass){
				$("#stutus").html("<span style='color:green'> Password Matched</span>");
			}else{
				$("#stutus").html("<span style='color:RED'> Password Not Matched</span>");
			}
		});
		/*
		$(selectors).event(function() {
			
		});
		$("input[type='text']").keyup(function() {
			alert("Yeasin");
		}); //for all inpit */
	</script> 
  </body>
</html>