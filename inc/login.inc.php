<?php
if(defined('master_page')){
if(!isset($_SESSION['user'])){
echo '<h2>Login</h2>
      <form action="" method="post">
      <input class="text" name="user" type="text" placeholder="Usuário" />
      <input class="text" name="pass" type="password" placeholder="Senha" />
      <input class="submit" type="submit" value="Login!" name="submit"/>
	  </form>';
if(isset($_POST['submit'])){
$L_USER = addslashes($_POST['user']);
$L_PASS = addslashes($_POST['pass']);
$qry = odbc_exec($sqltank_conn,"SELECT * FROM Sys_Users_Detail WHERE UserName = '$L_USER'");
$ASOC = odbc_fetch_array($qry);
if(odbc_num_rows($qry) == 0 || $ASOC['Password'] != strtoupper(md5($L_PASS))){
echo 'O Usuário ou a senha está incorreta!';
} else {
echo  'Carregando...';
$_SESSION['user'] = $L_USER;
$_SESSION['pass'] = strtoupper(md5($L_PASS));
$_SESSION['nick'] = $ASOC['NickName'];
echo '<meta http-equiv="Refresh" content="1;url=./">';
}}} else if(isset($_SESSION['user'])) {
echo '<h2>Bem Vindo '.$_SESSION['nick'].'</h2></p>';
if(SERVER_ONLINE != 2){
echo '<input class="submit" type="submit" value="Jogar o DDTank" onclick="alert(\'O Canal Padrão está offline!\');"/></br>';
} else {
echo '<form action="" method="post">';
echo '<a class="submit game_start type="submit" href="'.GAME_LINK.'?user='.$_SESSION["user"].'&pass='.$_SESSION["pass"].'" id="game_on" target="_blank">Jogar DDTank</a></br></p>';
echo '<input class="submit" type="submit" name="exit" value="Sair"/></br>';
echo '</form>';
if(isset($_POST['exit'])){
session_destroy();
echo '<meta http-equiv="Refresh" content="1;url=./">';
}
}}
} else {
header('HTTP/1.0 404 Not Found');
}
?>