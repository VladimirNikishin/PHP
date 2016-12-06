<HTML>
    <head>
		<TITLE>Практическая №4</TITLE>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./css/style.css">
    </head>
	<body>
	<?php
		$err = "";
		if(isset($_POST['indextwo']))
		{
			$start = true;
			require_once './indextwo.php';
		}
	?>
		<div class="container">
			<form method="POST">
				<div>Ссылка для поиска  <a target="blank" href="http://muzofon.com">http://muzofon.com</a></div>
				<div class="red"><?php echo $err; ?></div>
				<div>Введите ссылку на страницу</div>
				<input type="text" name="url"/>
				<div>Шаблон для поиска музыки</div>
				<select type="text" name="opt">
					<option></option>
					<option>Исполнители</option>
					<option>Дуэты</option>
					<option>Время трека</option>
					<option>Только русские</option>
					<option>Только английские</option>
				</select>
				<?php
					if($start==true)
					{
						echo '<div>Результат:</div><textarea type="textarea" name="result">';
						echo $res.'</textarea>';
					}
				?>
				<input type="submit" name="indextwo" value="Найти"/>
			</form>
		</div>
	</body>
</HTML>