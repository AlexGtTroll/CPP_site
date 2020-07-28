<?php

$server = 'NEKRONAMICON\SANYA';
$name = 'sa';
$pass = '123';

$link = mssql_connect($server, $name, $pass);
$query = "SELECT * FROM datainf";

if (!$link){
	die ('DEAD WAY');
}

mssql_select_db('test',$link);

$result = mssql_query($query);
if($result)
{
	$rows = mssql_num_rows($result);

	echo "<table><tr><th>Id</th><th>LOGIN</th><th>password</th><th>name</th><th>job</th></tr>";
	for ($i=0; $i<$rows; ++$i){
		$row = mssql_fetch_row($result);
		echo "<tr>";
		for ($j=0; $j<5;++$j) echo "<td>$row[$j]</td>";
			echo "</tr>";
	}
	echo "</table>";

	mssql_free_result($result);
}

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