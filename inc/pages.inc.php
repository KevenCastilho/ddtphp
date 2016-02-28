<?php
if(defined('master_page')){
$pagelist_query = odbc_exec($sqlweb_conn,'SELECT * FROM Pages ORDER BY ID');
if(odbc_num_rows($pagelist_query) != 0){
while($result = odbc_fetch_array($pagelist_query)){
echo '<li><a href="'.$result["Page"].'">'.$result["Name"].'</a></li>';
}}
} else {
header('HTTP/1.0 404 Not Found');
}
?>