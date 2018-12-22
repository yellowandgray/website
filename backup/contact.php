<?php 
if($_POST)
{
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
// the message
$msg = "<h3>A New Contact Form Enquiry</h3><br/><table>
<tr><td style='background:#f9c138;color: white;'>Name</td><td style='background:#f9c138;color: white'>&nbsp;".$name."</td></tr>
<tr><td style='background:#f9c138;color: white;'>Email</td><td style='background:#f9c138;color: white'>&nbsp;".$email."</td></tr>
<tr><td style='background:#f9c138;color: white;'>Message</td><td style='background:#f9c138;color: white'>&nbsp;".$message."</td></tr></table>";
$headers = "From: test@mymahis.com";
$headers.= "MIME-Version: 1.0\r\n"; 
$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$headers.= "X-Priority: 1\r\n"; 
$status = mail("mohan@mymahis.com","Contact Form",$msg,$headers);
$status1 = mail("gerry@mymahis.com","Contact Form",$msg,$headers);
echo $status;
if($status && $status1){
	echo "Mail Sent Sucessfully";
}
else{
	echo "Mail Not sent";
}

}
?>