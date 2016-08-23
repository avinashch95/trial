<?php
include "db_connect.php";
$link = connect();
 
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
//$input = json_decode(file_get_contents('php://input'),true);
 
// connect to the mysql database
mysqli_set_charset($link,'utf8');
 
// retrieve the table and key from the path
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
//echo array_shift($request);
$key = array_shift($request);

echo $key;
// escape the columns and values from the input object
// $columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
// $values = array_map(function ($value) use ($link) {
//   if ($value===null) return null;
//   return mysqli_real_escape_string($link,(string)$value);
// },array_values($input));
 
// // build the SET part of the SQL command
// $set = '';
// for ($i=0;$i<count($columns);$i++) {
//   $set.=($i>0?',':'').'`'.$columns[$i].'`=';
//   $set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');
// }

echo "select * from pubKyes WHERE uid='".$key."' ";

 $q = mysqli_query($link,"select * from pubKyes;");
// die if SQL statement failed


// print results, insert id or affected row count
// if ($method == 'GET') {
  if (!$key) echo '[';
  for ($i=0;$i<mysqli_num_rows($q);$i++) {
    echo ($i>0?',':'').json_encode(mysqli_fetch_object($q));
  }
  if (!$key) echo ']';
// } elseif ($method == 'POST') {
//   echo mysqli_insert_id($link);
// } else {
//   echo mysqli_affected_rows($link);
// }
 
// close mysql connection


?>