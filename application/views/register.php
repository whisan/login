<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>C.R.U.D</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/lux/bootstrap.css">
</head>

<body>
<div class='row'>
<div class='col-lg-12'>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">[C.R.U.D]</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
  </div>
</nav>
</div>
</div>
<br>
<div class='container'>
	<h1 class="page-header text-center">C.R.U.D [Create Read Update Delete]</h1>
	<hr>
	<div class="row">
		<div class="col-lg-12">
			<h3>Register Form
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>login/reg">
				<div class="form-group">
					<label>Username:</label>
					<input type="text" class="form-control" name="user_name" required>
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" class="form-control" name="user_password" required>
				</div>
				<div class="form-group">
					<label>FirstName:</label>
					<input type="text" class="form-control" name="fname" required>
				</div>
				<div class="form-group">
					<label>LastName:</label>
					<input type="text" class="form-control" name="lname" required>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input type="email" class="form-control" name="user_email" required>
				</div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Register</button>
			</form>
		</div>
	</div>
	</div>
</body>
</html>