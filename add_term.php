<html dir="rtl">

<head>
<meta content="ar-eg" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>ComputerDictionary</title>
<style type="text/css">
.auto-style1 {
	font-size: x-large;
	color: #0000FF;
	font-weight: bold;
	text-align: center;
}
</style>

</head>

<body>
<?php
include ("header.php");
?>



<p class="auto-style1">ادخال مصطلح</p>
<div>
	<form action="add_term.php" enctype="multipart/form-data" method="post">
		المصطح<br />
		<input name="text_term" style="width: 407px" type="text" /><br />
		ترجمته<br />
		<input name="trans" style="width: 407px" type="text" /><br />
		تعريفه<br />
		<textarea name="TextArea1" style="width: 406px; height: 47px"></textarea><br />
		الصورة<br />
		<input name="File1" style="width: 403px" type="file" /><br />
		<input name="Submit1" style="width: 139px" type="submit" value="اضاقه" /></form>


</div>

<?php
include("connection.php");
if(isset($_POST['Submit1']))
{
if(!is_dir('pic'))
{
mkdir('pic');
}
@$file=$_FILES['File1']['name'];
@$tmp=$_FILES['File1']['tmp_name'];
if(!empty($file))
{
move_uploaded_file($tmp,'pic/'.$file);
}
$term=$_POST['text_term'];
$trans=$_POST['trans'];
$defe=$_POST['TextArea1'];
$picture="pic/".$file."";
    

if($term!=="" && $trans!=="" && $defe!=="" && !empty($file))
{
mysql_query("SETNAMES'utf8'");
$query=mysql_query("INSERT INTO terms VALUES ('','$term','$trans','$defe','$picture')");
if($query)
{
$datares="تم اضافة البيانات بنجاح";
echo("<label id='Label1'style='color:#ff0000;font-size:xlarge;'>$datares</label>");
}
else
{
$datares="لم يتم اضافة البيانات";
echo("<label id='Label1'style='color:#ff0000;font-size:xlarge;'>$datares</label>");

}


}
else
{
$datares="البيانات التى ادخلتها ليست كاملة";
echo("<label id='Label1'style='color:#ff0000;font-size:xlarge;'>$datares</label>");

}
}

?>


</body>

</html>
