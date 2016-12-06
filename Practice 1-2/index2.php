<!DOCTYPE html>
<html>
    <head>
        <title>Практическая работа №2</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <div class="regdiv">
            <form method="post" align="center" class="regform">
                 <label>Фамилия</label><br />
                <input type="text" name="surname" value="<? if(isset($_POST['surname'])) echo $_POST['surname']; ?>"><br />
                <label>Имя</label><br />
                <input type="text" name="name" value="<? if(isset($_POST['name'])) echo $_POST['name']; ?>"><br />
                <label>Отчество</label><br />
                <input type="text" name="midname" value="<? if(isset($_POST['midname'])) echo $_POST['midname']; ?>"><br />
				<label>Придумайте Логин</label><br />
                <input type="text" name="log" value="<? if(isset($_POST['log'])) echo $_POST['log']; ?>"><br />
                <label>Придумайте пароль</label><br />
                <input type="password" name="pass" value="<? if(isset($_POST['pass'])) echo $_POST['pass']; ?>"><br />
                <label>Повторите пароль</label><br />
                <input type="password" name="pass1" value="<? if(isset($_POST['pass1'])) echo $_POST['pass1']; ?>"><br />
               
                <label>Пол</label><br />
					<select name="pol">
						<option value="Мужской">Мужской </option>
						<option value="Женский">Женский</option>
					</select><br />
                <label>EMail</label><br />
                <input type="email" name="email" value="<? if(isset($_POST['email'])) echo $_POST['email']; ?>"><br />
                <label>Возраст</label><br />
                <input type="text" name="age" value="<? if(isset($_POST['age'])) echo $_POST['age']; ?>"><br />
                <label>Страна</label><br />
               <select name = "from">
						<option value="Россия">Россия </option>
						<option value="Америка">Америка</option>
					</select><br />
                <label>Курс обучения</label><br />
						<select name="lvl">
							<option value="1">1 курс</option>
							<option value="2">2 курс</option>
							<option value="3">3 курс</option>
							<option value="4">4 курс</option>
						</select><br />
                <label>О себе</label><br />
                <textarea name="about"><? if(isset($_POST['about'])) echo $_POST['about']; ?></textarea><br />
                <input type="submit" value="Регистрация" class="submit"/>
                <input type="reset" value="Сброс" class="submit"/>
            </form>
        </div>
        <?
            if(isset($_POST['log']) && isset($_POST['pass']) && isset($_POST['pass1']) && isset($_POST['surname']) && isset($_POST['name'])
            && isset($_POST['midname']) && isset($_POST['pol']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['from']) && isset($_POST['lvl'])
            && !empty($_POST['log']) && !empty($_POST['pass']) && !empty($_POST['pass1']) && !empty($_POST['surname']) && !empty($_POST['name'])
            && !empty($_POST['midname']) && !empty($_POST['pol']) && !empty($_POST['email']) && !empty($_POST['age']) && !empty($_POST['from']) && !empty($_POST['lvl']))
            {
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                {
                    if($_POST['pass'] == $_POST['pass1'])
                    {
                        $pd = false;
                        $file = fopen("logins.txt", "r");
                        while(!feof($file))
                        {
                            $line = fgets($file);
                            $arr = explode('|', $line);
                            if(@$arr[0] == $_POST['log']) $pd = true;
                        }
                        fclose($file);
                        if($pd == false)
                        {
                            $str = $_POST['log'].'|'.$_POST['pass'].'|'.$_POST['surname'].'|'.$_POST['name'].'|'.$_POST['midname'].'|'.$_POST['pol'].'|'.$_POST['email'].'|'.$_POST['age'].'|'
                            .$_POST['from'].'|'.$_POST['lvl'].'|'.$_POST['about'];
                            $file = file_put_contents('logins.txt', $str.PHP_EOL , FILE_APPEND | LOCK_EX);
                            echo 'Успешная регистрация!';
                        }
                        else echo 'Логин уже занят.';
                    }
                    else echo 'Проверти правильность паролей!';
                }
                else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) echo 'Неверный формат Email.';
            }
            else if(isset($_POST['lvl'])) echo 'Все данные введены верно!';
        ?>
    </body>
</html>
