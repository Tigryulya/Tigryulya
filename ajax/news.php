<?php

include '../system.php';
include '../security.php';
include '../security.php';

$login = $_COOKIE['LG'];
$im_user = mysqli_fetch_array(mysqli_query($Connection, "SELECT * FROM `users` WHERE login = '$login'"));

$news_check = mysqli_fetch_assoc(mysqli_query($Connection, "SELECT * FROM `news`"));
if ($news_check == null)
{
	echo '
		<div class = "wrap_not_posts margin_15">
			<div class = "not_posts_name">Нету записей</div>
		</div>
	';
}

$opdate_news = mysqli_query($Connection, "SELECT * FROM `news`");

while ($news = mysqli_fetch_assoc($opdate_news))
{
	$text = preg_replace("#\r?\n#", "<br>", $news['text']);
	if ($news['image'] != null) $image = '<img class = "center_content_news_image" src = "../images/'.$news['image'].'.png">';

	if ($news['unical'] == $im_user['unical'] && $login && $password) $function_news = '
					<div class = "header_div_icon_funct">

						<img class = "header_icon_funct" src = "../img/down-arrow.svg">

						<div class = "in_header_function_block">
							<div onclick = "edit_news('.$news['unical_id'].')" class = "in_header_function_link">Редактировать запись</div>
							<div onclick = "delete_news('.$news['unical_id'].')" class = "in_header_function_link">Удалить запись</div>
						</div>

					</div>
	';


	$unical = $news['unical'];
	$who = mysqli_fetch_assoc(mysqli_query($Connection, " SELECT * FROM `users` WHERE `unical` = '$unical' "));

	echo '
			<div id = "'.$news['unical_id'].'" style = "display: block;" class = "content_news margin_15">

				<div class = "content_news_header">
					<div class = "header_div_icon_who"><img src = "../img/users/camera_50.jpg"></div>
					<div class = "header_div_name">
						<div class = "header_title">'.$who['name'].' '.$who['surname'].'</div>
						<div class = "header_date">'.$news['day'].'.'.$news['month'].'.'.$news['year'].' '.$news['clock'].':'.$news['minutes'].'</div>
						</div>
					'.$function_news.'
					</div>

				<div class = "content_news_center">
					<div class = "center_content_news_text">'.$text.'</div>
					<div>'.$image.'</div>
					</div>

				<div class = "content_news_footer">
					<div onclick = "like('.$news['unical_id'].')" class = "footer_div_icon"><img src = "../img/assessment/like.svg"><span class = "footer_div_num">0</span></div>
					<div class = "footer_div_icon"><img src = "../img/coment.svg"><span class = "footer_div_num">0</span></div>
					</div>

			</div>

			<div id = "'.$news['unical_id'].'_edit" style = "display: none;" class = "content_news margin_15">

				<div class = "content_news_header">
					<div class = "header_div_icon_who"><img src = "../img/users/camera_50.jpg"></div>
					<div class = "header_div_name">
						<div class = "header_title">'.$who['name'].' '.$who['surname'].'</div>
						<div class = "header_date">'.$news['day'].'.'.$news['month'].'.'.$news['year'].' '.$news['clock'].':'.$news['minutes'].'</div>
						</div>
					</div>

				<div class = "content_news_center">
					<div id = "'.$news['unical_id'].'_edit_text" contenteditable = "true" class = "edit_center_content_news_text">'.$text.'</div>
					<div>'.$image.'</div>

					<div class = "wrap_button_news_edit">
						<button onclick = "not_edit_news('.$news['unical_id'].')" class = "button_active_on button_news_edit">Отмена</button>
						<button onclick = "reedit('.$news['unical_id'].')" class = "button_active_on button_news_edit">Отредактировать</button>
					</div>
					</div>

				<div class = "content_news_footer">
					<div onclick = "like('.$news['unical_id'].')" class = "footer_div_icon"><img src = "../img/assessment/like.svg"><span class = "footer_div_num">0</span></div>
					<div class = "footer_div_icon"><img src = "../img/coment.svg"><span class = "footer_div_num">0</span></div>
					</div>

			</div>
	';
}

?>