<?php
if($_POST) {
	$ldapuser = $_POST["username"];
	$ldappass = $_POST["password"];

	$ldapconn = ldap_connect("ldaps://ldap.cs.prv") or die("Не могу соединиться с сервером LDAP.");
	if ($ldapconn) {	//анонимная привязка
		ldap_start_tls($ldapconn);	//включить TLS
		$ldapbind = ldap_bind($ldapconn) or die("ошибка в бинде");
		if ($ldapbind) {
			echo "Анонимная привязка LDAP прошла успешно...";	//ou=faculty,ou=people,dc=cs,dc=karelia,dc=ru
		} else {
			echo "Анонимная привязка LDAP не удалась...";	//ou=students,ou=people,dc=cs,dc=karelia,dc=ru
		}
	}
	$result = ldap_search($ldapconn, "ou=students,ou=people,dc=cs,dc=karelia,dc=ru", "(uid=$ldapuser*)", array("dn")) or die("ошибка в поиске");
	$info = ldap_get_entries($ldapconn, $result);
	if ($info[count] == 0) {	//если нет записей стреди студентов, то попробовать среди преподавателей
		echo "нет ни одной записи среди студентов";
		$result = ldap_search($ldapconn, "ou=faculty,ou=people,dc=cs,dc=karelia,dc=ru", "(uid=$ldapuser*)", array("dn")) or die("ошибка в поиске");
		$info = ldap_get_entries($ldapconn, $result);
		if ($info[count] == 0) {
			echo "нет ни одной записи среди преподавателей";
		} else {
			echo "найдено $info[count] записей среди преподавателей";
			$ldapbinda = ldap_bind($ldapconn, $info[0]["dn"], $ldappass);	//попытка авторизации
			if ($ldapbinda) {
				echo "Авторизация LDAP как преподаватель прошла успешно...";
			} else {
				echo "Авторизация LDAP как преподаватель не удалась...";
			}
			echo $info[0]["dn"];
		}
	} else {
		echo "найдено $info[count] записей среди студентов";
		$ldapbinda = ldap_bind($ldapconn, $info[0]["dn"], $ldappass);	//попытка авторизации
		if ($ldapbinda) {
			echo "Авторизация LDAP как студент прошла успешно...";
		} else {
			echo "Авторизация LDAP как студент не удалась...";
		}
		echo $info[0]["dn"];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<form action="ldap.php" class="form-signin" method="post">
			<input type="text" name="username" class="form-control" placeholder="Логин" required>
			<input type="password" name="password" class="form-control" placeholder="Пароль" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
		</form>
	</div>
</body>
</html>