<?php


mysql_connect("localhost","root","");
mysql_select_db("commentbox");

if ($_SERVER['REQUEST_METHOD']=='POST'){
$name=$_POST['name'];
$comment=$_POST['comment'];
$submit=$_POST['submit'];
}

$dbLink = mysql_connect("localhost","root","");
    mysql_query("SET character_set_client=utf8", $dbLink);
    mysql_query("SET character_set_connection=utf8", $dbLink);
 if ($_SERVER['REQUEST_METHOD']=='POST'){
if($submit)
{
if($name&&$comment)
{
$insert=mysql_query("INSERT INTO commenttable (name,comment) VALUES ('$name','$comment') ");
echo "<meta HTTP-EQUIV='REFRESH' content='0; url=new.php'>";
}
else
{
echo "please fill out all fields";
}
}
 }
?>

<html>
<head>
<title>Comment box</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>

body{
    margin: 0 auto;
    background-image: url("ab.jpg");
    background-repeat:  no-repeat;
    background-size:cover;
    color: #fff;
}
.container{
    width:450px;
    height:700px;
    text-align: center;
    background-color:rgba(128, 255, 128,.4);
    border-radius:4px;
    margin:0 auto;
    margin-top:120px;
}

input[type="submit"]{
    height:25px;
    width:80px;
    font-size:14px;
    background-color:rgba(13, 84, 37,.6);
    border-radius: 5px;
    border:none;
	color:#fff;
}
input[type="submit"]:hover{
  
    background-color:rgba(13, 84, 37,.3);
  
}
input[type="text"]{
	height:30px;
    width:300px;
    font-size:18px;
    margin-bottom:20px;
    background-color: #fff;
    padding-left:40px;
    border-radius: 5px;
    border:none;
}

a{
    color:#2F4F4F;
}
tr td {
	padding:10px;
	font-size:150%;
	color:#094714;
}

</style>
</head>
 
<body>
<center>
<form action="new.php" method="POST">
	<div class="container">
		<table>
		<tr><td>Name: <br><br><input type="text" name="name"/></td></tr>
		<tr><td colspan="2">Comment: </td></tr>
		<tr>
		<td colspan="5"><textarea name="comment" rows="10" cols="50"></textarea></td></tr>
		<tr><td colspan="2"><input type="submit" name="submit" value="Submit"></td></tr>
	</div>	
		</table>
</form>

<?php
$dbLink = mysql_connect("localhost","root","");
    mysql_query("SET character_set_results=utf8", $dbLink);
    mb_language('uni');
    mb_internal_encoding('UTF-8');
 
$getquery=mysql_query("SELECT * FROM commenttable ORDER BY id DESC");
while($rows=mysql_fetch_assoc($getquery))
{
$id=$rows['id'];
$name=$rows['name'];
$comment=$rows['comment'];


echo $name . '<br/>' . '<br/>' . $comment . '<br/>' . '<br/>' . '<hr size="1"/>';


}
?>
 
</body>
</html>

