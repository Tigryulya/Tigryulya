
function close_message() {
        div = document.querySelector('div.closes');
		div.style.display = div.style.display == "none" ? "none" : "none";
}

function update(file, print)
{
	var form = new FormData();
	var xhr = new XMLHttpRequest();
	
	xhr.open("POST", '../ajax/' + file, true);
	xhr.send();

	xhr.onreadystatechange = function() {
		console.log(xhr.responseText);
		document.getElementById(print).innerHTML = xhr.responseText;
	}
}

function header(link)
{
	document.location.href = link;
}

function show_block(inddeficator)
{
	var show_block_div = document.getElementById(inddeficator);

	show_block_div.style.display = show_block_div.style.display == "none" ? "block" : "none";

	if (show_block_div.style.display == "block")
	{
		document.getElementById('show_text_one').style.display = "none";
		document.getElementById('show_text_two').style.display = "block";

	}else if (show_block_div.style.display == "none")
	{
		document.getElementById('show_text_one').style.display = "block";
		document.getElementById('show_text_two').style.display = "none";
	}
}


function like(id)
{
	document.getElementById(id).innerHTML = '<img src = "../img/assessment/like.svg"><span class = "footer_div_num">0</span>';
}