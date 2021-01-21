<?php
include("database/db_connect.php");
$user_Name=$_POST["user"];
$user_Password=$_POST["pass"];
if(isset($_POST["login"]))
{
	$query=mysql_query("SELECT * FROM createadminuser WHERE user_name='$user_Name' AND PASSWORD='$user_Password'");
	$fetch=mysql_fetch_row($query);
	if($fetch[0]==$user_Name && $fetch[2]==$user_Password )
	{
		print "<script>location='admin/index.php?username=$fetch[0]'</script>";
	}
	else
	{
		print"login unsussefully";
	}
	
}
?>
<html>
		<head>
		<title>user panel</title>
		</head>
		
		
		<style type="text/css">
		table{background:#f4f4f4; border: 5px #FFFFFF solid; box-shadow:0px 5px 5px #999; margin-top:150px; }
			.title{ color:#FFFFFF; font-size:28px; font-family: "Times New Roman", Times, serif; text-transform:uppercase ; text-shadow:0px 6px 6px #000; letter-spacing:1px; font-weight:bold;}
			.txt{ color:#0066FF; font-size:18px; font-family: "Times New Roman", Times, serif;  text-shadow:0px 3px 3px #ccc; font-weight:bold;  letter-spacing:2px; padding-left:30px;}
			.input{ border:1px #5481FC solid; height:28px; width:200px; padding-left:10px; border-radius: 5px;}
			.input:focus{ background:#DDEBF8;}
			.btm{ background:#5481FC; color:#FFFFFF; height:30px; width:100px; border-radius:5px; border:1px #FFFFFF solid;   }
			
		</style>
		
		
		<body>
		 
			<form name="login" method="post" action="<?php print $_SERVER['PHP_SELF']; ?>" >
 				<table height="276" width="536" cellpadding="0" cellspacing="0" align="center"  >
					<tr>
						<td colspan="3" height="82" align="center" bgcolor="#5481FC"><font class="title"><font color="FF0000">L</font>OGIN<font color="FF0000"> F</font>OR <font color="FF0000">A</font>DMINISTATOR</font></td>
					</tr>
					<tr>
						<td width="38%"><font  class="txt" > User Name</font></td>
						<td width="6%" align="center">:</td>
					  <td width="56%"><input type="text" name="user"  class="input" placeholder=" User Name" required /></td>
					</tr>
					<tr>
						<td><font  class="txt" >Password</font></td>
						<td align="center">:</td>
						<td><input type="Password" name="pass" class="input" placeholder="Password" required /></td>
					<tr>
					<tr bgcolor="#5481FC">
						<td colspan="3" align="center" ><input type="submit" value="LOGIN" class="btm" name="login" name="login" /> <input type="reset" value="CANCEL" class="btm"   />  </td>
					</tr>	
				
	    </table>
		</form>
		</body>
</html>