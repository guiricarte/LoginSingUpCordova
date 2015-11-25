<?php
header('Access-Control-Allow-Origin: *');
$Mysqli = new mysqli("localhost","root","132", 'safehood');
 
$request = $_SERVER['REQUEST_METHOD'] == 'GET' ? $_GET : $_POST;
 
switch ($request['acao']) {
 
	case "LoginWeb":
	$usuario = addslashes($_POST['usuario']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$senha = md5($senha);
	$Date = addslashes(date('Y-m-d'));
	$Clock = addslashes(date('H:i:s')); 
	
	$erro = "";
	$erro .= empty($usuario) ? "Informe o seu nome \n" : "";
	$erro .= empty($email) ? "Informe a seu email \n" : "";
	$erro .= empty($senha) ? "Informe a sua senha \n" : "";

	$arr = array();

	if(empty($erro)){
		$query = "INSERT INTO safusers (`c_nameusers`, `c_emaiusers`, `c_passusers`, `c_dateusers`, `c_timeusers`) VALUES ('$usuario','$email','$senha','$Date','$Clock')";
		$result = mysql_query($query);
		$arr['result'] = true;

	}else{
		$arr['result'] = false;
		$arr['msg'] = $erro;
	}
	echo json_encode($arr);
	break;
	
}