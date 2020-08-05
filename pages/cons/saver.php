<?php
if (isset($_PODT['obj'])&&isset($_POST['comm'])){
////Переменные с формы////
$obj_name = $_POST['obj'];
$comment = $_POST['comm'];
$name = $_POST['name'];
$dtime = $_POST['dtime'];
//---------Данные для подключения-------------
$server = 'NEKRONAMICON\SANYA';
$namecon = 'sa';
$pass = '123';
$database = 'test';
$db_table = 'ext';
/////////////////////////////////////////////

$link = mssql_connect($server, $namecon, $pass);

if (!$link){
	die ('Error: '. mssql_get_last_message());
}

mssql_select_db($database,$link);
/////////////////////////////////////////////
$result = $mssql->query("INSERT INTO".$db_table."(obj,comm,name,dtime) VALUES('$obj_name','$comment','$name','$dtime')");

if ($result == true){
	echo "Информация занесена в базу данных";
}else{
	echo "Информация не занесена в базу данных";
}
}
?>