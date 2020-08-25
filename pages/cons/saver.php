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


if (!isset($_POST['obj'])){ 
	die('Не передано имя объекта');
}else{
$obj = $_POST['obj'];
/**/$obj = mb_convert_encoding($_POST['obj'], "Windows-1251", "UTF-8");//
}
if (!isset($_POST['name'])){
die('Не передано Ваше имя');
}else{
	$name = $_POST['name'];
/**/$name = mb_convert_encoding($_POST['name'], "Windows-1251", "UTF-8");//
}
if (!isset($_POST['comment'])){
	die('Сообщение не передано');
}else{
	$comment = $_POST['comment'];
/**/$comment = mb_convert_encoding($_POST['comment'], "Windows-1251", "UTF-8");//
}

<div id = "current_date_time_block"></div>

<script type = "text/javascript">
function zero_first_format(value){
	if (value<10){
		value = '0' + value;
	}
	return value;
}

function date_time(){
	var current_datetime = new Date();
	var day = zero_first_format(current_datetime.getDate());
	var month = zero_first_format(current_datetime.getMonth()+1);
	var year = current_datetime.getFullYear();
	var hours = zero_first_format(current_datetime.getHours());
	var minutes = zero_first_format(current_datetime.getMinutes());
	var seconds = zero_first_format(current_datetime.getSeconds());

	return day+"."+month+"."+year+" "+hours+":"+minutes+":"+seconds;
}

setInterval(function(){
	document.getElementById('current_date_time_block').innetHTML = date_time();
},1000);
</script>


//Вывод таблицы//
$result = mssql_query("SELECT * FROM ext") or die ("Error reading from the table" . mssql_get_last_message());
if($result){
	$rows = mssql_num_rows($result); //кол-во полученных строк
	echo "<table><tr><th>ID</th><th>Объект</th><th>Имя</th><th>Сообщение</th><th>Дата последнего изменения</th><th>Срок сдачи</th><th>Замечание</th>";
	for ($i=0; $i<$rows; ++$i){
		$row = mssql_fetch_row($result);
		echo "<tr>";
		for ($j = 0; $j < 3; ++$j) echo "<td>$row[$j]</td>";
			echo "</tr>";
	}
	echo "<table>";
	mssql_free_result($result);

	<!--ВЫВОД ТАБЛИЦЫ БД-->
<?php
$table_request = "SELECT * FROM ext ORDER BY id";
$result = mssql_query($table_request);
$count = mssql_num_rows($result);
if(!mssql_query($table_request)){
	die('Cannot read from the table: '.mssql_get_last_message());
}else{
	$id_ft = array();
	$obj_ft = array();
	$name_ft = array();
	$comment_ft = array();
	$dtime_ft = array();
	$deadline_ft = array();
	$note_ft = array();

	while ($row = mssql_fetch_array($result))
	{
		$id_ft[] = $row['id'];
		echo $row['id'];
		echo nl2br ("\n");
		$obj_ft[] = $row['obj'];
		echo $row['obj'];
		echo nl2br ("\n");
		$name_ft[] = $row['name'];
		echo $row['name'];
		echo nl2br ("\n");
		$comment_ft = $row['comment'];
		echo $row['comment'];
		echo nl2br ("\n");
		$dtime_ft[] = $row['dtime'];
		echo $row['dtime'];
		echo nl2br ("\n");
		$deadline_ft[] = $row['deadline'];
		echo $row['deadline'];
		echo nl2br ("\n");
		$note_ft[] = $row['note'];
		echo $row['note'];
		echo nl2br ("\n");
	}
}

///*ЧИСТКА ПАМЯТИ*///
unset($row); unset($id_ft); unset($obj_ft); unset($name_ft);
unset($comment_ft); unset($dtime_ft); unset($deadline_ft); unset($note_ft);
mssql_free_result($result);

mssql_close($link);
?>


	<!--ВЫВОД ТАБЛИЦЫ БД-->
<?php
///////////////ПРОВЕРКА СОЕДИНЕНИЯ С БД/////////////////
$link = mssql_connect($server, $namesa, $pass);
if (!$link){
	die ('Error: '. mssql_get_last_message());
}

mssql_select_db($database,$link);
/////////////////////////////////////////////////
$table_request = "SELECT * FROM ext ORDER BY id";
$result = mssql_query($table_request);
$count = mssql_num_rows($result);
if(!mssql_query($table_request)){
	die('Cannot read from the table: '.mssql_get_last_message());
}else{
	$id_ft = array();
	$obj_ft = array();
	$name_ft = array();
	$comment_ft = array();
	$dtime_ft = array();
	$deadline_ft = array();
	$note_ft = array();

	while ($row = mssql_fetch_array($result))
	{
		$id_ft[] = $row['id'];
		echo $row['id'];
		echo nl2br ("\n");
		$obj_ft[] = $row['obj'];
		echo $row['obj'];
		echo nl2br ("\n");
		$name_ft[] = $row['name'];
		echo $row['name'];
		echo nl2br ("\n");
		$comment_ft = $row['comment'];
		echo $row['comment'];
		echo nl2br ("\n");
		$dtime_ft[] = $row['dtime'];
		echo $row['dtime'];
		echo nl2br ("\n");
		$deadline_ft[] = $row['deadline'];
		echo $row['deadline'];
		echo nl2br ("\n");
		$note_ft[] = $row['note'];
		echo $row['note'];
		echo nl2br ("\n");
	}
}

///*ЧИСТКА ПАМЯТИ*///
unset($row); unset($id_ft); unset($obj_ft); unset($name_ft);
unset($comment_ft); unset($dtime_ft); unset($deadline_ft); unset($note_ft);
mssql_free_result($result);
?>