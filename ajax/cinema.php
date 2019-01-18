<?php

include '../system.php';
include '../security.php';

	$query_cinema = mysqli_query($Connection, "SELECT * FROM `film`");

	while ($cinema = mysqli_fetch_array($query_cinema))
	{
		echo '
			<div class = "wrap_film_content page_block">
				<a href	= "/cinema/'.$cinema['unical'].'">
					<div class = "wrap_image_logo_viveo">
						<img class = "image_logo_viveo" src = "../img/ironmen.jpg">
					</div>

					<div class = "wrap_info_film">
						<div class = "name_film">Железный человек</div>
						<div class = "info_film">Приключения и боевики · 2008 · 12+ · русский</div>
						<div class = "text_film">Переживите незабываемые приключения вместе с героем Роберта Дауни мл. в невероятном фантастическом фильме...</div>
						<div class = "cast_film">В ролях: Роберт Дауни мл., Гвинет Пэлтроу, Терренс Ховард</div>
						<div class = "prod_film">Режиссер: Джон Фавро</div>
					</div>
				</a>
			</div>
		';
	}

?>