<?php
/////////////////////////////////////////////
$server = 'NEKRONAMICON\SANYA';
$name = 'sa';
$pass = '123';
////////////////////////////////////////////////////////////////////////////
$link = mssql_connect($server, $name, $pass);

if (!$link){
	die ('Error: '. mssql_get_last_message());
}
//////////////////////////////////////
mssql_select_db('test',$link);
$login = htmlspecialchars($_POST['auth-login']);
$password = $_POST['auth-password'];
var_dump($login);
var_dump($password);
$query = "SELECT * FROM datainf WHERE login ='$login' AND password = '$password'";
$ident = mssql_query($query);
$count = mssql_n 
?>

/*
<!DOCTYPE html>
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

<script>
//---------Данные для подключения-------------
$server = 'NEKRONAMICON\SANYA';
$name = 'sa';
$pass = '123';
$database = 'test';
/////////////////////////////////////////////

$link = mssql_connect($server, $name, $pass);

if (!$link){
	die ('Error: '. mssql_get_last_message());
}

mssql_select_db($database,$link);

mssql_query("SELECT id FROM");
/////////////////////////////////////////////
</script>

<div style = "position: relative">
<form action = "saver.php">
	<p><b>Отчитываться сразу снизу прямо здесь и сейчас (для красильщиков)</b></p>
	<p><textarea name = "comment" style = "padding-bottom:250px;
	font-size:16px; max-height:150px; max-width:500px;
	 min-height:150px; min-width:500px"></textarea></p>
	</form>
	</div>

	<div style = "position: absolute; left: 700px; bottom: 330px">
		<p><a href = "tubes.html"><img src = "imgautos/kraska.jpg" alt = "изображение труб" title = "состояние труб"></a></p>
	</div>

<div style = "position: relative">
<form method = "post" action = "cons/saver.php">
	<p><b>Отчитываться сразу снизу прямо здесь и сейчас (для кочегаров)</b></p>
	<p><textarea name = "comment" style = "padding-bottom:250px;
	font-size:16px; max-height:150px; max-width:500px;
	 min-height:150px; min-width:500px"></textarea></p>
	</form>
	</div>
	<div style = "position: relative">
<form action = "saver.php">
	<p><b>Отчитываться сразу снизу прямо здесь и сейчас (для тех, кто остался)</b></p>
	<p><textarea name = "comment" style = "padding-bottom:250px;
	font-size:16px; max-height:150px; max-width:500px;
	 min-height:150px; min-width:500px"></textarea></p>
	</form>
	</div>
	</body>
</html>