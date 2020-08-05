<?php
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
?>