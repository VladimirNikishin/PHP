<?php
	require_once './shd.php';
	$html = file_get_contents($_POST['url']);
	$ready = false;
	if($_POST['opt']=="Исполнители")
	{
		$regex = "/<strong>(.*)?<\/strong>/u";
		$ready = true;
	}
	if($_POST['opt']=="Дуэты")
	{
		$regex = "/<strong>.+[Ff]eat(.*)?<\/strong>/u";
		$ready = true;
	}
	if($_POST['opt']=="Время трека")
	{
		$regex = "/\[[0-9:]{5}\]/u";
		$ready = true;
	}
	if($_POST['opt']=="Только русские")
	{
		$regex = "/<strong>[А-Я].+(.*)?<\/strong>/u";
		$ready = true;
	}
	if($_POST['opt']=="Только английские")
	{
		$regex = "/<strong>[A-Z].+(.*)?<\/strong>/u";
		$ready = true;
	}
	
	if($ready==true){
		$index = preg_match_all($regex, $html, $matches);
		for($i = 0; $i < $index; $i++)
			{
				$res .= @$matches[0][$i]."\n";
			}
	}
	else{
		$err = "Выберите шаблон!";
	}
?>