<?php
$date_today = date("d.m.y");
$mas = array();
$gr = $_POST["member"];
$N = count($gr);
for ($i=0; $i < $N; $i++)
{
array_push($mas, $gr[$i]);
}

$id = $_POST['id'];


$povestkamas = array();
$gr1 = $_POST["aims"];
$N1 = count($gr1);
for ($i=0; $i < $N1; $i++)
{
array_push($povestkamas, $gr1[$i]);
}
$solutionsmas = array();
$gr2 = $_POST["solutions"];
$N2 = count($gr2);
for ($i=0; $i < $N2; $i++)
{
array_push($solutionsmas, $gr2[$i]);
}
$speechmas = array();
$gr3 = $_POST["speach"];
$N3 = count($gr3);
for ($i=0; $i < $N3; $i++)
{
array_push($speechmas, $gr3[$i]);
}





echo $date_today;
print_r($mas);
echo $N;
echo $id;
print_r($povestkamas);
print_r($solutionsmas);
print_r($speechmas);


$host="localhost";/*Имя сервера*/
$user="emaxv";/*Имя пользователя*/
$password="";/*Пароль пользователя*/
$db="c9";/*Имя базы данных*/
mysql_connect($host, $user, $password); /*Подключение к серверу*/
mysql_select_db($db); /*Подключение к базе данных на сервере*/
mysql_query("SET NAMES 'utf8'"); 
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
mysql_query("CREATE TABLE IF NOT EXISTS tst2(id int, date DATE, member text, povestka text, speech text, solutions text)") or die(mysql_error());


$mas2 = serialize($mas);
$povestkamas2 = serialize($povestkamas);
$speechmas2 = serialize($speechmas);
$solutionsmas2 = serialize($solutionsmas);

$insert_sql = "INSERT INTO tst2 (id, date, member, povestka, speech, solutions)" . "VALUES('{$id}', '{$date}', '{$mas2}', '{$povestkamas2}', '{$speechmas2}', '{$solutionsmas2}');"; mysql_query($insert_sql);



?>