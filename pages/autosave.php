<html>
<head>

	<!--<script type = "text/javascript">
		function refresh(f){
			f.reset();
		}-->
	</script>
	<title>ОТЧЕТЫ</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon"> 
	<link rel ="stylesheet" type ="text/css" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name = "viewport" content = "width=device-width,initial-scale=1">
</head>

	<style>

		table {
			width:100%;
			background: white;
			border-spacing:1px;
		}

		.head{
			text-shadow: 1px 1px 1px #000;
			border-style: normal;
			border-color: grey;
		}

		td,th{
			background: grey;
			padding: 5px;
			text-align: center;
		}

	</style>

	<style type = "text/css">

	</style>

	<body>
		<div class = "head" style = "position: relative">
		<h1 align = "center">Здесь, допустим, пишут отчеты</h1>
		<h2 align = "center">Конкретно эта страница для отчетов по трубам, что обычно горят</h2>
	</div>

<div style = "position: relative">
<form method = "POST" action = "" name = "reset">
	<input name = "obj" type = "text" placeholder = "Объект" size = "22"/>
		<p><input name = "name" type = "text" placeholder = "Ваше имя" size = "26"/></p>
	Ваше сообщение<br /><textarea name = "comment" cols = "30" rows = "5" placeholder = "Комментарий..." style = "max-width: 250px; max-height:100px; min-width: 200px; min-height:100px"></textarea><br/>
	<br/>
	<p><input type = "submit" value = "Отправить"/></p>
</form>
	</div>



<!--Вывод ошибки с нормальной кодировкой-->
<?php
function errorka(){
return mb_convert_encoding(mssql_get_last_message(), "UTF-8", "Windows-1251");
}
?>


<!--Основной код-->
<?php
error_reporting(E_ALL);

////Переменные с формы////
if (!isset($_POST['obj']) || !isset($_POST['name']) || !isset($_POST['comment'])){
	die('Пожалуйста, заполните форму');
}else{
$obj = $_POST['obj'];
/**/$obj = mb_convert_encoding($_POST['obj'], "Windows-1251", "UTF-8");//
$name = $_POST['name'];
/**/$name = mb_convert_encoding($_POST['name'], "Windows-1251", "UTF-8");//
$comment = $_POST['comment'];
/**/$comment = mb_convert_encoding($_POST['comment'], "Windows-1251", "UTF-8");//
unset($_POST);
}
//---------Данные для подключения-------------//
$server = 'NEKRONAMICON\SANYA';
$namesa = 'sa';
$pass = '123';
$database = 'test';
$db_table = 'ext';
///////////////ПРОВЕРКА СОЕДИНЕНИЯ С БД/////////////////
$link = mssql_connect($server, $namesa, $pass);
if (!$link){
	die ('Error: '. errorka());
}
mssql_select_db($database,$link);
/////////////////////////////////////////////
if (empty($obj) || empty($name) || empty($comment)){
	echo "Заполните все поля" . nl2br("\n");
}else{
	///25.08.2020///
	$check = false;
	$duplicate = mssql_query("SELECT (obj,name,comment) FROM `ext` WHERE (`obj` = '$obj' AND `name` = '$name' AND `comment` = '$comment'");
	if($duplicate == true){
	/*Debug*/echo "Duplicate = " . var_dump($duplicate) . nl2br("\n");
	echo "Данная запись уже есть в БД" . nl2br("\n");
	echo "Если хотите изменить запись - нажмите 'Редактировать запись'" . nl2br("\n");

	exit();
	}
	/*Debug*/echo "duplicate = ". var_dump($duplicate) . nl2br("\n");
	if(!$duplicate) $check = true;
	/*Debug*/echo "check = " . var_dump($check) . nl2br("\n");
	if ($check == true || $duplicate == NULL){
		$id_arr = array();
		$result = mssql_query("SELECT id FROM ext ORDER BY id");
		while ($myrow = mssql_fetch_assoc($result)){
			$id_arr[] = $myrow['id'];
		}
		$id_max = max($id_arr);
		$id_max+=1;
		/*Debug*/ echo "obj " . var_dump($obj) . nl2br("\n") .
		"name " . var_dump($name) . nl2br("\n") . 
		"comment " . var_dump($name) . nl2br("\n");/*Debug*/
if($result = mssql_query("INSERT INTO ext (id, obj, name, comment) VALUES ('$id_max','$obj', '$name', '$comment')")){
echo "Данные занесены в таблицу ". errorka();
}else{
	echo "Ошибка при внесении данных " . errorka();
}
}
	unset($obj); unset($name); unset($comment); unset($id_max);
	unset($result); unset($id_arr);
	mssql_close($link);
}
?>

<!--Создание и вывод таблицы-->
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Объект</th>
			<th>Имя</th>
			<th>Комментарий</th>
			<th>Время изменения</th>
			<th>Срок сдачи</th>
			<th>Замечание</th>
		</tr>
	</thead>

<tbody>
<?php
//Вывод таблицы//
$table_request = "SELECT * FROM ext ORDER BY id";
$result = mssql_query($table_request);
$count = mssql_num_rows($result);
if(!mssql_query($table_request)){
	die('Cannot read from the table: '.errorka());
}else{
	$obj_ft = array();
	$name_ft = array();
	$comment_ft = array();
	$dtime_ft = array();
	$deadline_ft = array();
	$note_ft = array();

	while ($row = mssql_fetch_array($result))
	{
		$id_ft[] = $row['id'];
		$obj_ft[] = $row['obj'];
		$name_ft[] = $row['name'];
		$comment_ft = $row['comment'];
		$dtime_ft[] = $row['dtime'];
		$deadline_ft[] = $row['deadline'];
		$note_ft[] = $row['note'];
		echo "<tr>
		<td>".$row['id']."</td>
		<td>".$row['obj']."</td>
		<td>".$row['name']."</td>
		<td>".$row['comment']."</td>
		<td>".$row['dtime']."</td>
		<td>".$row['deadline']."</td>
		<td>".$row['note']."</td>
		</tr>";
	}
}
///*ЧИСТКА ПАМЯТИ*///
unset($row); unset($id_ft); unset($obj_ft); unset($name_ft);
unset($comment_ft); unset($dtime_ft); unset($deadline_ft); unset($note_ft);
mssql_free_result($result);

mssql_close($link);
?>
</tbody>
</table>


</body>
</html>