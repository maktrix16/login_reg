<?php 
	// var_dump($user);
	// var_dump($this->session->all_userdata());
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>What's Up</title>
	<style type="text/css">
		/* Overall */
		.container{width:800px; font-family: arial;}
		.error{color:red;display:block; font-size:10px;}

		/* Header */
		.header p{display: inline; font-weight: bold; font-size: 18px;}
		.header a{margin-left: 600px; font-weight: normal;}
	</style>
</head>

<div class='container'>

	<div class='header'>
<!-- CHANGE header -->
		<p>Hello, <?=$user['name']?>!</h1>
		<a class='header-link' href="/users/logout">Logout</a>
	</div>

</div>
<body>
	
</body>
</html>