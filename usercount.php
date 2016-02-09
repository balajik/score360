<?php
$session=session_id();
$session_name=$_SESSION['username'];
$time=time();
$time_check=$time-120; 

$sql="SELECT * FROM online_count WHERE session='$session'"; 
$result=mysql_query($sql);
$count=mysql_num_rows($result); 

if($count=="0")
{ 
	$sql1="INSERT INTO online_count(session_name, session, time)VALUES('$session_name', '$session', '$time')"; 
	$result1=mysql_query($sql1);
}
else 
{
	$sql2="UPDATE online_count SET time='$time', session_name='$session_name' WHERE session = '$session'"; 
	$result2=mysql_query($sql2); 
}

 $sql3="SELECT * FROM online_count";
 $result3=mysql_query($sql3); 
 $count_user_online=mysql_num_rows($result3);
 echo "Users Online: $count_user_online "; 
 
 $sql4="DELETE FROM online_count WHERE time<$time_check"; 
 $result4=mysql_query($sql4); 

mysql_close();
?>