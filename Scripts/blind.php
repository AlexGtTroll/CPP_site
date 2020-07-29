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

/*$query = "SELECT login, password, name, profess FROM datainf";
for ($i = 0; $i<count($id); ++$i)
{
$result = mssql_query($query);
$id[$i] = (string)mssql_fetch_assoc($result);
}


$ids = array();
while ($titlerows = mssql_fetch_row($result)){
$ids[] = $titlerows[0];
}

echo $ids[0];*/
//$show = mssql_query('SELECT * FROM datainf WHERE id = 1');
//$empl = mssql_fetch_array($show);



/*if (count($boy)>=5)
{
	var_dump($boy);
}

else echo 'vse horosho';*/

/*for ($i=0; $i<5; $i++)   // count($empl)
{
	echo "$empl[$i] ";
}

mssql_free_result($show);

echo nl2br ("\n");

$print_test = mssql_query('SELECT * FROM datainf WHERE id = 2');
$bid = mssql_fetch_array($print_test);    //$"_".{[login][id]}
for ($i=0; $i<5;$i++)
{
	echo "$bid[$i] ";
}

mssql_free_result($print_test);

echo nl2br ("\n");

$nametest = mssql_query('SELECT login FROM datainf WHERE id = 3');
$name = mssql_fetch_array($nametest);

echo "$name[0]";*/

mssql_close($link);
?>