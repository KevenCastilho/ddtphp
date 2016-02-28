<?php
if(defined('master_page')){
echo DONATE_TEXT;
} else {
header('HTTP/1.0 404 Not Found');
}
?>