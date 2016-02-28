<?php
ob_start();
define('master_page',true);
function dump_error_to_file($errno, $errstr) {
    $fh = fopen('./php_errors/'.date("Y-m-d").'.log','a+');
    fwrite($fh,date("Y-m-d H:i:s - ").$errstr.PHP_EOL);
	fclose($fh);
}
set_error_handler('dump_error_to_file');
error_reporting(E_ALL); 
ini_set("display_errors", 0);
include('./inc/config.inc.php');
session_save_path('./sessions/');
session_start();
if(SITE_STATUS == 1){
?>
<!DOCTYPE html>
<html> 
    <head>
        <title><?php echo SERVER_NAME.' '.TITLE_SEPARATOR.' '.$_GET['p']; ?></title>
        <style>
		<?php
		if(BG_ID != '' && file_exists('./style/images/bg_'.BG_ID.'.jpg')){
		echo '@import url(\'./style/css/main.php?bg='.BG_ID.'.jpg\');';
	    } else {
		echo '@import url(\'./style/css/main.php\')';
		}
		?>
        </style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="./js/jQueryMain.js"></script>
		<script>
		$(document).ready(function(){
		if($.CheckIeVersion() > -1){
		document.location = 'http://www.updateyourbrowser.net/pt/';
		}
		})
		</script>
    </head>
    <body>
        <ul id="nav">
		    <li><a href="!Home">Home</a></li>
            <?php
            include('./inc/pages.inc.php');
            ?>			
            <li><a href="#">Forum</a></li> 
        </ul>
                  
        <div id="logo"></div>
        
        <div id="content">
            <div id="left">
                <div class="painel">
                    <div class="center"> 
                    <?php
					include('./inc/login.inc.php');
					?>
                    </div>
                </div>
                <div class="painel">
                    <h2>Status | Canal : <?php echo CHANNEL_NAME; ?></h2>
					<?php
					if(SERVER_ONLINE == 2){
					?>
                    <p>Status: <span style="color:green;">Online</span> </p>
					<p>Players Online: <?php echo ON;?> </p>
					<p>Nível Mínimo: <?php echo MIN_LEVEL; ?></p>
					<p>Nível Máximo: <?php echo MAX_LEVEL; ?></p>
					<p>Máximo de Player's: <?php echo MAX_PLAYERS; ?></p>
					<?php
					} else {
					echo '<p>Status: <span style="color:red;">Offline</span></p>';
					}
					?>
                </div>
                <div class="painel">
                    <h2>Staff</h2>
                    <?php include('./inc/staff.inc.php'); ?>
                </div>
            </div>
            
            <div id="center">
                <div class="painel">
                    <?php
					$page = $_GET['p'];
					if($page != ''){
					if(file_exists('./pages/'.$page.'.php')){
					include('./pages/'.$page.'.php');
					} else {
					echo 'Erro <b>404</b></br>A Página requisitada não existe';
					}
					} else {
					header('Location: !Home');
					}
					?>
                </div>
            </div>
        </div>
		<div class="footer">
		Design feito por Marcos Valério , Scripts feito por Gabriel.</br>
		TankMito Developer's © 2012 | All Right Reserved
		</div>
    </body> 
</html>
<?php 
} else {
echo '<b>Site offline devido a erro de configuração</b>';
}
?>