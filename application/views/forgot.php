<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <link href="https://bootswatch.com/4/lux/bootstrap.css" rel="stylesheet">
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
<br>
    <div class="container">
    <form class="form-signin" action="<?php echo site_url('login/forget');?>" method="post">
      <fieldset>
        <legend>Forgot Password?</legend>
        <?php echo $this->session->flashdata('msg');?>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="user_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required autofocus>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Date Created</label>
          <input type="text" name="datelog" class="form-control" id="exampleInputPassword1" placeholder="eg. 2019-04-01 08:26:01" required>
        </div>
        <button type="submit" class="btn btn-primary">Next</button>
        <a href="<?php echo base_url(); ?>" class="btn btn-secondary"><span class="glyphicon glyphicon-plus"></span>BACK</a><br><br>
      </fieldset>
    </form>
  </div>
  </body>
</html>

