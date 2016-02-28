<?php
if(defined('master_page')){
$news_query = odbc_exec($sqlweb_conn,'SELECT * FROM News ORDER BY ID');
if(odbc_num_rows($news_query) != 0){
while($result = odbc_fetch_array($news_query)){
echo '<h2>'.$result["NewsTitle"].'</h2>';
echo '<p>'.$result["NewsText"].'</p>';
echo '<h6>Postado por <a href="#">'.$result['NewsAuthor'].'</a>';
}} else {
echo '<p style="color:red;">Desculpe ,nenhuma novidade postada!</p>';
}
} else {
header('HTTP/1.0 404 Not Found');
}
?>