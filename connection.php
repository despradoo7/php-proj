 <?php
    $username="root";
    $password="";
    $database="dbdictionary";
    $server="localhost";
    $connect=mysql_connect("$server","$username","$password");
    if($connect)
    {
        $select=mysql_select_db("$database") or die("هناك مشكلة فى قاعدة البيانات");
        }
    else
    {
        echo("لم يتم الاتصال بالقاعدة");
    }
?>