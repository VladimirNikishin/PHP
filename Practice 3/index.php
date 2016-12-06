<HTML>
	<head>
		<title>Практическая работа №1</title>
			<meta charset="utf-8">
				<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
	
		<div class = "bg-one">
		
					<div class = "bg-two">
					<img src ="./one.png">
					<br>
					<p>Добро пожаловать!</p>
					<br>
					<p>Введите правильные имя<br> 
					пользователя и пароль для<br> 
					входа на сайт! </p>
					<br>
					<p><a href="index2.php">Регистрация</a></p>
			</div>
					<div class = "bg-three">
					
					<h1>Вход</h1>
                        
				<div class = "bg-fon">		
<?php
		$login = 'vova';
		$pass = '1111';

if(isset($_POST['login']) && $_POST['login'] == $login && $_POST['pass'] == $pass) 
		echo '<br /><h2 align="center">Добро пожаловать, '.$_POST['login'].'</h2>';
else if(isset($_POST['login']) && $_POST['login'] != $login && $_POST['pass'] != $pass) 
		echo '<br /><h2 align="center">Логин и пароль введены неверно</h2>';
	 else echo  '
<form method="post">
<h3>  Логин:   <input type="text" name="login" required></h3><br />
<h3> Пароль: <input type="password" name="pass" required></h3><br />
	<h3><input type="submit" name="submit" value="Войти" ></h3>
</form>';	
?>
				</div>
					</div>
		</div>	
	</body>	
	</HTML>
	