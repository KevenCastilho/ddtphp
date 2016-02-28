<?php
if(defined('master_page')){
$stafflist_query = odbc_exec($sqltank_conn,"SELECT * FROM Sys_Users_Detail WHERE IsAdmin = 1");
$count_staff_query = odbc_fetch_array(odbc_exec($sqltank_conn,"SELECT Count(*) AS CNT FROM Sys_Users_Detail WHERE IsAdmin = 1"));
if($count_staff_query['CNT'] != 0){
while($result = odbc_fetch_array($stafflist_query)){
echo '<p>'.$result["NickName"].'</p>';
}} else {
echo '<p style="color:red;">Desculpe ,nenhum membro da Staff encontrado!</p>';
}
} else {
header('HTTP/1.0 404 Not Found');
}
?>