<!DOCTYPE html>
<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "../template/default/css/header.css">
</head>
</html>

<script>
	
function header_button_menu()
{
	var menu = document.getElementById('wrap_header_menu');

	wrap_header_menu.style.display = "block";
}

window.onclick = function(eventw)
{
	if (wrap_header_menu.style.display == "block")
	{
		var menu_all_elements = document.getElementById('wrap_header_menu').querySelectorAll('div');
		var menu = document.getElementById('wrap_header_menu');

		var q1 = document.getElementById('q1'), q2 = document.getElementById('q2'), q3 = document.getElementById('q3'), q4 = document.getElementById('q4'), q5 = document.getElementById('q5');

		if (eventw.target != menu_all_elements && eventw.target != menu && eventw.target != q1 && eventw.target != q2 && eventw.target != q3 && eventw.target != q4 && eventw.target != q5)
		{
			menu.style.display = "none";
		}
	}
}

</script>



<?php

if ($settings['header'] == 'up')
{
	echo '

		<div class = "tophead">
			<div class = "back"></div>

			<div id = "q1" onclick = "header_button_menu()" class = "wrap_header_button_menu">
				<div id = "q2" class = "header_button_menu_name">Серёжа</div>
				<div id = "q3" class = "header_button_menu_wrap_icon">
					<img id = "q4" class = "header_button_menu_icon" src = "../img/users/camera_50.jpg">
				</div>
			</div>

		</div>

		<div id = "wrap_header_menu" class = "wrap_header_menu">

			<div class = "menu_name_link">Моя страница</div>
			<div class = "hr"></div>
			<div class = "menu_name_link">Редактировать</div>
			<div class = "hr"></div>
			<div class = "menu_name_link">Настройки</div>
			<div class = "hr"></div>
			<div class = "menu_name_link">Редактировать дизайн</div>
			<div class = "hr"></div>
			<div class = "menu_name_link">Помощь</div>
			<div class = "hr"></div>
			<div class = "menu_name_link">Выйти</div>

		</div>

	';
}
else if ($settings['header'] == 'down')
{

}
else if ($settings['header'] == 'left')
{

}
else if ($settings['header'] == 'right')
{

}

?>