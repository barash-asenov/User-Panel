<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>User Panel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css"
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="<?= base_url() ?>"><i class="fas fa-user"></i> UserPanel</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
			aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item <?php if (isset($page) && $page == 'Home'): ?>active<?php endif; ?>">
				<a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
			</li>
		</ul>
		<ul class="navbar-nav my-2 my-lg-0">
			<li class="nav-item">
				<a class="nav-link <?php if (isset($page) && $page == 'Register'): ?>active<?php endif; ?>"
				   href="<?= base_url() . 'register' ?>"><i class="fas fa-key"></i> Register</a>
			</li>
		</ul>
	</div>
</nav>
<div class="container">
