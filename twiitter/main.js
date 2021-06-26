function save_data2()
{
	var form_element = document.getElementsByClassName('form_data');

	var form_data = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
		form_data.append(form_element[count].name, form_element[count].value);
	}

	document.getElementById('submit').disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST','post.php');

	ajax_request.send(form_data);

	ajax_request.onreadystatechange = function()
	{
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			document.getElementById('submit').disabled = false;

			var response = JSON.parse(ajax_request.responseText);

			

			
		}
	}
}