<?php
    session_start();
   // require('config.php');
    # когда появится БД, $users убрать
    function auth($login, $password, $users)
    {
        if($users["{$login}"] == $password)
        {
            $_SESSION['login'] = $login;
            $_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT);
            return 0;
        }
        else
            return 1;
    }


    if(isset($_POST['login']))
        if(auth($_POST['login'], $_POST['password'], $users) == 0)
        {
            header('Location: ./index.php');
        }
        else
        {
            echo "Неправильные данные";
        }

    if(isset($_SESSION['login']))
        header('Location: ./index.php');

    if(isset($_POST['exit'])){
        session_destroy();
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
	<title>Авторизация</title>
</head>
<body>
	<header class = "headerlogin">
			<center><h2 class = "plogin"> Система анализа студенческих работ </h2></center>
	</header>

</br></br></br>
<div id="qwe">
	<div class="container">
		<form class="form-signin" action="login.php" method="POST">
			<input type="text" name="login" class="form-control" placeholder="Логин" required>
			<input type="password" name="password" class="form-control" placeholder="Пароль" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
		</form>
	</div>
</div>
	<footer>
    <p>Copyright </p>
    <address><a class = "two" >Petrozavodsk, Russia. 2019.
    </a></address>
  </footer> 
</body>
</html>