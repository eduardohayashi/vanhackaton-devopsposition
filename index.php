<form action="" method='POST'>
	<TABLE BORDER=0>
	<TR><TD>NAME:</TD><TD><input type="text" name='name'></TD></TR>
	<TR><TD>EMAIL: </TD><TD><input type="text" name='email'></TD></TR>
	<TR><TD><input type="submit" value="ORDER NOW"></TD></TR>
	<TR><TD><input type="submit" name="delete" value="CLEAN DATABASE"></TD></TR></TABLE>
	<br>
	<br>
	<br>
<?php

$db_handle = new SQLite3(__DIR__.'/orders.db',SQLITE3_OPEN_READWRITE) or die('Unable to open database');

if ($_POST['delete']) {
	//var_dump($_POST);
	$name = $_POST['name'];
	$query_string = 'delete from orders';
	$res = $db_handle->exec($query_string);	
}


if ($_POST['email']) {
	//var_dump($_POST);
	$name = $_POST['name'];
	$query_string = 'insert into orders (name, email) values("'.addslashes($_POST['name']).'", "'.addslashes($_POST['email']).'")';
	$res = $db_handle->exec($query_string);
}


$query_string = 'select * from orders';
$result     = $db_handle->query($query_string);

echo '<br>';
echo "<b>#ID | Name | Email </b><br>"; 
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
	echo $row['id'].' | '.$row['name'].' | '.$row['email']."<br>";
}
