
<?php
include('validate.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="login.css">
	<title>Login Page</title>

    <style>
  
/* General styling */
body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
}

.login-box {
    width: 300px;
    padding: 60px;
    position: relative;
    background: white;
    text-align: center;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    border: 2px solid #ddd;
}

.login-box h1 {
    margin: 0 10px 40px;
    padding: 0;
    color: rgb(221, 85, 85);
    font-size: 30px;
    border-bottom: 4px solid rgb(221, 85, 85);
    display: inline-block;
    padding-bottom: 10px;
}

.textbox {
    position: relative;
    margin-bottom: 30px;
}

.textbox i {
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    color: #191970;
}

.textbox input {
    width: 100%;
    padding: 10px 10px 10px 20px;
    background: none;
    border: none;
    border-bottom: 1px solid black;
    outline: none;
    color: rgb(221, 85, 85);
    font-size: 18px;
}

.button {
    width: 100%;
    background: white;
    border: 2px solid rgb(221, 85, 85);
    color: rgb(221, 85, 85);
    padding: 10px;
    cursor: pointer;
    font-size: 18px;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.button:hover {
    background: rgb(221, 85, 85);
    color: white;
}
    </style>
</head>

<body>
	<form action="validate.php" method="post">
		<div class="login-box">
			<h1>Login</h1>

			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Username"
						name="username" value="">
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="Password"
						name="password" value="">
			</div>

			<input class="button" type="submit"
					name="login" value="Sign In">
		</div>
	</form>
</body>

</html>
