<?php
///////////////////ДЛЯ ПОДКЛЮЧЕНИЯ///////////////////////////////////////////
$server = 'NEKRONAMICON\SANYA';
$name = 'sa';
$pass = '123';
////////////////////////////////////////////////////////////////////////////
$link = mssql_connect($server, $name, $pass);
$query = "SELECT * FROM datainf";

if (!$link){
	die ('Error: '. mssql_get_last_message());
}

mssql_select_db('test',$link);
////////////////////////////////////////////////////////////////////////
$sql = "SELECT * FROM datainf ORDER BY id";
$result = mssql_query($sql);
$count=mssql_num_rows($result);
if(!mssql_query($sql))
{
	die('Error: ' . mssql_get_last_message());
}
else
{
	$login = array();
	$password = array();
	$id = array();
	$name = array();
	$profess = array();
	while($row=mssql_fetch_array($result))
	{
		$id[]=$row['id'];
		echo $row['id'];
		echo nl2br ("\n");
		$login[]=$row['login'];
		echo $row['login'];
		echo nl2br ("\n");
		$password[] = $row['password'];
		echo $row['password'];
		echo nl2br ("\n");
		$name[] = $row['name'];
		echo $row['name'];
		echo nl2br ("\n");
		$profess[] = $row['profess'];
		echo $row['profess'];
		echo nl2br ("\n");
	}
}
mssql_free_result($result);
///////////////////////////////////////////////////////////////////
echo nl2br ("\n");



mssql_close($link);
?>