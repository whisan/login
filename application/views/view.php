<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>C.R.U.D</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/lux/bootstrap.css">
</head>
<body>
<?php $this->session->userdata('level')=== "1" ?>
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
    <form class="form-inline my-2 my-lg-0">
	<a href="<?php echo base_url(); ?>login/logout" class="btn btn-outline-danger"><span class="glyphicon glyphicon-plus"></span>Sign Out</a><br><br>
    </form>
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
			<h3>User View
				<span class="pull-right"><a href="<?php echo base_url();?>login/view" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<?php extract((array) $user); ?>
			<form method="POST" action="<?php echo base_url(); ?>login/update?id=<?php echo $user_id; ?>">
				<fieldset disabled=''>
				<div class="form-group">
					<label>Username:</label>
					<input type="text" input class="form-control" id="disabledInput" value="<?php echo $user_name; ?>" name="user_name">
				</div>
				</fieldset>
				<fieldset disabled=''>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" input class="form-control" id="disabledInput" value="<?php echo $user_password; ?>" name="user_password">
				</div>
				</fieldset>
				<fieldset disabled=''>
				<div class="form-group">
					<label>FirstName:</label>
					<input type="text" input class="form-control" id="disabledInput" value="<?php echo $fname; ?>" name="fname">
				</div>
				</fieldset>
				<fieldset disabled=''>
				<div class="form-group">
					<label>LastName:</label>
					<input type="text" input class="form-control" id="disabledInput" value="<?php echo $lname; ?>" name="lname">
				</div>
				</fieldset>
				<fieldset disabled=''>
                <div class="form-group">
					<label>Email:</label>
					<input type="text" input class="form-control" id="disabledInput" value="<?php echo $user_email; ?>" name="user_email">
				</div>
				</fieldset>
				<fieldset disabled=''>
                <div class="form-group">
					<label>Level:</label>
					<input type="text" input class="form-control" id="disabledInput" value="<?php echo $user_level; ?>" name="user_level">
				</div>
				</fieldset>
                </div>
			</form>
		</div>
	</div>
	</div>
</body>
</html>