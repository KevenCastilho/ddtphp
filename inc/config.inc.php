<?php
if(defined('master_page')){
define('HOST','Gabriel-PC\DDTank');
define('USER','sa');
define('PASS','555884');
define('T_DB','Db_Tank');
define('W_DB','Db_Web');
define('CONFIG_ID',0);
/* Parte de Querys para o SQL , caso não entenda não modifique nada abaixo */
$sqltank_conn = odbc_connect("Driver={SQL Server};Server=".HOST.";Database=".T_DB.";", USER, PASS);
$sqlweb_conn = odbc_connect("Driver={SQL Server};Server=".HOST.";Database=".W_DB.";", USER, PASS);
$settings_query = odbc_exec($sqlweb_conn,'SELECT * FROM WebSettings WHERE ID = '.CONFIG_ID);
$count_settings_query = odbc_fetch_array(odbc_exec($sqlweb_conn,'SELECT Count(*) AS CNT FROM WebSettings WHERE ID = '.CONFIG_ID));
if($count_settings_query['CNT'] != 0){
define('SERVER_ID',odbc_result($settings_query,'ServerID'));
define('SERVER_NAME',odbc_result($settings_query,'ServerName'));
define('TITLE_SEPARATOR',odbc_result($settings_query,'TitleSeparator'));
define('REGISTER_MONEY',odbc_result($settings_query,'RegisterMoney'));
define('REGISTER_GOLD',odbc_result($settings_query,'RegisterGold'));
define('REGISTER_FREEMONEY',odbc_result($settings_query,'RegisterFreeMoney'));
define('DONATE_TEXT',odbc_result($settings_query,'DonateText'));
define('RANKING_PLAYER_TOP',odbc_result($settings_query,'PlayersInRanking'));
define('GAME_LINK',odbc_result($settings_query,'GameLink'));
define('FORUM_LINK',odbc_result($settings_query,'ForumLink'));
define('BG_ID',odbc_result($settings_query,'BackgroundID'));
$serverlist_query = odbc_exec($sqltank_conn,'SELECT * FROM Server_List WHERE ID = '.SERVER_ID);
define('ON',odbc_result($serverlist_query,'Online'));
define('SERVER_ONLINE',odbc_result($serverlist_query,'State'));
define('CHANNEL_NAME',odbc_result($serverlist_query,'Name'));
define('MIN_LEVEL',odbc_result($serverlist_query,'LowestLevel'));
define('MAX_LEVEL',odbc_result($serverlist_query,'MustLevel'));
define('MAX_PLAYERS',odbc_result($serverlist_query,'Total'));
define('SITE_STATUS',1);
} else {
define('SITE_STATUS',0);
}
} else {
header('HTTP/1.0 404 Not Found');
}
?>