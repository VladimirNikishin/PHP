<?php
	$ready = true;
	//проверка схожести полей
	if($_POST['pass'] != $_POST['pass1'])
	{
		$ready = false;
		$pass1 = "Пароли не совпадают!";
	}
	
	
	//реджексы
	if(!preg_match('/^[uА-Я].[а-я]+[^0-9\t]$/u', $_POST['name']))
	{
		$name_err = 'Неправильное имя!';
		$ready = false;
	}
	if(!preg_match('/^[uА-Я].[а-я]+[^0-9\t]$/u', $_POST['surname']))
	{
		$surname_err = 'Неправильная фамилия!';
		$ready = false;
	}
	if(!preg_match('/^[-0-9a-z_\.]+@[-0-9a-z_\.]+\.[a-z]{2,6}$/i', $_POST['email']))
	{
		$email_err = 'Неправильная почта!';
		$ready = false;
	}
	
	
	//логин, почта
	$file = "./logins.txt";
	$lines_count = count(file($file));
	$content = file_get_contents($file);
	$lines = explode("\n", $content);
	for($i = 0; $i < $lines_count; $i++)
	{
		$line = explode("|", $lines[$i]);
		if($_POST['log'] == $line[0])
		{
			$ready = false;
			$log_err = "Такой логин уже существует!";
		}
		else if($_POST['email'] == $line[3])
		{
			$ready = false;
			$email_err = "Такая почта уже используется!";
		}
	}
?>