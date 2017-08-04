<?php
//this will embed the login file
//code below
require_once('header.php');
//require_once('login.php');
?>
<?php
//this is the file used for logins by admin
//code below
session_start();
require_once('dbconnect.php');
if(isset($_POST['btn-login']))
{
	$conn=mysqli_connect(host,uname,pass,dbname) or die("Error in connection " . mysqli_connect_error());
	$idd = $_POST['idd'];
	$upass = $_POST['pass'];
	$q="SELECT * FROM admin WHERE uname='$idd'";
	$res=mysqli_query($conn,$q) or die ("Error in query" . mysqli_error($conn));
	$count = mysqli_affected_rows($conn);
  $row=mysqli_fetch_array($res); // if uname/pass correct it returns must be 1 row
	if($row[1]==$upass && $count==1)
	{
	    header("location:admin.php");
	}
	else
	{
        echo "no match";
	}
}
?>
<center>
<div id="login-form">
<form method="post">
<table align="center"  border="0">
<tr>
	<td><h1>Login</h1></td>
</tr>
<tr>
<td><input type="text" name="idd" placeholder="Unique id" title="Unique id" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Password" title="Your password here please" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Login</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
