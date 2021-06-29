
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="s1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="main.js">


	

</script>
<script>
function save_logdata()
{
	var form_element = document.getElementsByClassName('form_data1');

	var form_data1 = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
		form_data1.append(form_element[count].name, form_element[count].value);
	}

	document.getElementById('submit1').disabled = true;

	var ajax_request1 = new XMLHttpRequest();

	ajax_request1.open('POST','login.php');

	ajax_request1.send(form_data1);

	ajax_request1.onreadystatechange = function()
	{
		if(ajax_request1.readyState == 4 && ajax_request1.status == 200)
		{
			document.getElementById('submit1').disabled = false;

			var response = JSON.parse(ajax_request1.responseText);

			if(response.success === "login successful")
			{
				document.getElementById('sample_form1').reset();

				document.getElementById('message1').innerHTML = response.success;


				document.getElementById('email_error1').innerHTML = '';
				document.getElementById('password_error1').innerHTML = '';
                  window.location.href = 'index.php';
			
			}
			else
			{
				//display validation error
		
				document.getElementById('email_error1').innerHTML = response.email_error;
				document.getElementById('password_error1').innerHTML = response.password_error;
				document.getElementById('message1').innerHTML = response.success;
			
			}

			
		}
	}
}
</script>
	<title>SignUp and Login</title>
	
</head>
<body>

<div class="container" id="container">
<div class="form-container sign-up-container">
<div id="message"></div>
<form id="sample_form" enctype="multipart/form-data">
	
<div id="status"></div>
	<h1>Create Account</h1>
	<div class="social-container">
		<a href="#" class="social"><i class="fa fa-facebook"></i></a>
		<a href="#" class="social"><i class="fa fa-google"></i></a>
		<a href="#" class="social"><i class="fa fa-linkedin"></i></a>
	</div>
	<span>or use your email for registration</span>
	<input type="text" name="name"  id="name" class="form-control form_data" placeholder="Name">
	<span id="name_error" class="text-danger"></span>
	<input type="email" name="email"  id="email" class="form-control form_data" placeholder="Email">
	<span id="email_error" class="text-danger"></span>
	<input type="password" name="password" id="password" class="form-control form_data" placeholder="Password">
	<span id="password_error" class="text-danger"></span>

	<button type="button"  onclick="save_data(); return false;" id="submit" >SignUp</button>
</form>
</div>
<div class="form-container sign-in-container">
<div id="message1"></div>
<form id="sample_form1">
	<?php  ?>
		<h1>Sign In</h1>
		<div class="social-container">
		<a href="#" class="social"><i class="fa fa-facebook"></i></a>
		<a href="#" class="social"><i class="fa fa-google"></i></a>
		<a href="#" class="social"><i class="fa fa-linkedin"></i></a>
	</div>
	<span>or use your account</span>
	<input type="email" name="email1" id="email1"  class="form-control form_data1" placeholder="Email">
	<span id="email_error1" class="text-danger"></span>
	<input type="password" name="password1" id="password1"  class="form-control form_data1" placeholder="Password">
	<span id="password_error1" class="text-danger"></span>
	<a href="#">Forgot Your Password</a>

	<button type="button" onclick="save_logdata(); return false;"  id="submit1" >Sign In</button>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Welcome Back!</h1>
			<p>To keep connected with us please login with your personal info</p>
			<button class="ghost" id="signIn">Sign In</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Hello, Friend!</h1>
			<p>Enter your details and start journey with us</p>
			<button class="ghost" id="signUp">Sign Up</button>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>


</body>
</html>








