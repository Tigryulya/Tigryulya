<?php

include '../system.php';
include '../security.php';

	$mods_query_echo = mysqli_query($Connection, "SELECT * FROM `mods`");

	while ($mods = mysqli_fetch_array($mods_query_echo))
	{
		if ($mods['src'] == null)
		{
			$error_bd = '<div class = "wrap_function"><img title = "В базе данных не обнаружен путь к файлу" class = "wrap_function_selete_server" src = "../img/error.png"></div>';

			if (file_exists('web/clients/HiTech/mods'.$mods['src'].'') )
			{
				$error_server = '<div class = "wrap_function"><img title = "На сервере не обнаружен файл" class = "wrap_function_selete_server" src = "../img/error.png"></div>';
			}
		}

		echo '
			<div class = "wrap_mod">
				<div class = "wrap_name_mod">'.$mods['name'].'</div>

				<!-- <div class = "wrap_function"><img onclick = "delete_file('.$mods['id'].')" title = "Удалить файл" class = "wrap_function_selete_server" src = "../img/delete.svg"></div> -->
				<div class = "wrap_function"><img id = "button_content_edit" title = "Редактировать" class = "wrap_function_selete_server" src = "../img/edit.svg"></div>

				<div class = "wrap_description">
					<div class = "wrap_function"><img onclick = "wrap_description_click('.$mods['id'].')" title = "Описание" class = "wrap_function_selete_server" src = "../img/info.svg">
						<div id = "wrap_description'.$mods['id'].'" style = "display: none;" class = "wrap_description_text page_block">'.$mods['description'].'</div>
					</div>
				</div>

				'.$error_bd.'
				'.$error_server.'

				<div class = "server_or_client">'.$mods['server_or_client'].'</div>
			</div>
			';
	}

?>