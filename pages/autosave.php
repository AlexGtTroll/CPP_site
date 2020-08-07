<html>
<head>
	<title>ОТЧЕТЫ</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon"> 
	<link rel ="stylesheet" type ="text/css" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name = "viewport" content = "width=device-width,initial-scale=1">
</head>

	<style>

		.head{
			text-shadow: 1px 1px 1px #000;
			border-style: normal;
			border-color: grey;
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
<form method = "POST" action = "">
	<input name = "obj" type = "text" placeholder = "Объект" size = "22"/>
		<p><input name = "name" type = "text" placeholder = "Ваше имя" size = "26"/></p>
	<input name = "comment" type = "text" placeholder = "Комментарий.." size = "30"/>
	<p><input type = "submit" value = "Отправить"/></p>
	</div>

<?php
//id obj name comment note
error_reporting(E_ALL);

////Переменные с формы////
$obj = $_POST['obj'];
/**/$obj = mb_convert_encoding($_POST['obj'], "Windows-1251", "UTF-8");//
$name = $_POST['name'];
/**/$name = mb_convert_encoding($_POST['name'], "Windows-1251", "UTF-8");//
$comment = $_POST['comment'];
/**/$comment = mb_convert_encoding($_POST['comment'], "Windows-1251", "UTF-8");//

//---------Данные для подключения-------------//
$server = 'NEKRONAMICON\SANYA';
$namesa = 'sa';
$pass = '123';
$database = 'test';
$db_table = 'ext';
/////////////////////////////////////////////
$link = mssql_connect($server, $namesa, $pass);
if (!$link){
	die ('Error: '. mssql_get_last_message());
}

mssql_select_db($database,$link);
/////////////////////////////////////////////
if (empty($obj) || empty($name) || empty($comment)){
	echo "Заполните все поля";
}else{
$result = mssql_query("INSERT INTO ext (obj, name, comment) VALUES ('$obj', '$name', '$comment')");
if ($result == true){
	echo "Информация занесена в базу данных";
}else{
	echo "Информация не занесена в базу данных";
}
}
unset($obj); unset($name); unset($comment);
mssql_close($link);
?>

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

<!--<div style = "position: relative">
<form method = "POST" action = "">
	<p><b>Отчитываться сразу снизу прямо здесь и сейчас (для кочегаров)</b></p>
	<p><textarea name = "comment" style = "padding-bottom:150px;
font-size:16px; max-height:50px; max-width:500px;
	 min-height:50px; min-width:500px"></textarea></p>
	  <input type = "submit" value ="OK">
	</form>
	</div>
	<div style = "position: relative">
<form method = "POST" action = "">
	<p><b>Отчитываться сразу снизу прямо здесь и сейчас (для тех, кто остался)</b></p>
	<p><textarea name = "comment" style = "padding-bottom:150px;
font-size:16px; max-height:50px; max-width:500px;
	 min-height:50px; min-width:500px"></textarea></p>
	  <input type = "submit" value ="OK">
	</form>
	</div>
	</body>-->
</html>