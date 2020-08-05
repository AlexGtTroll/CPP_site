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
	<input name = "obj" type = "text" placeholder = "Объект"/>
		<input name = "nameus" type = "text" placeholder = "Ваше имя"/>
	<input name = "comment" type = "text" placeholder = "Комментарий.." />
	<input type = "submit" value = "Отправить"/>
	</div>

<?php
error_reporting(E_ALL);
////Переменные с формы////
//$obj = $_POST['obj'];
//$comment = $_POST['comment'];
//$nameus = $_POST['nameus'];
	$obj = "Kotel №1";
	$comment = "Everything is fine";
	$nameus = "Jotaro";
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
$result = mssql_query("INSERT INTO ext VALUES ('$obj', '$nameus', '$comment')");
if ($result == true){
	echo "Информация занесена в базу данных";
}else{
	echo "Информация не занесена в базу данных";
}
?>
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