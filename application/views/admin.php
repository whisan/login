<?php
$userid = $this->session->userdata('userid');

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>[C.R.U.D]</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/lux/bootstrap.css">
	
</head>
<body>
<?php $this->session->userdata('level')=== "1" ?>
<div class='row'>
<div class='col-lg-12'>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-fixed-top">
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

	<div class="jumbotron">
	  <h1 class="display-3">Hello, ADMIN!</h1>
	  <h1>Welcome Back <?php echo $this->session->userdata('user_name');?></h1>
	  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
	  <hr class="my-4">
	  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
	  <p class="lead">
	    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
	  </p>
	</div>
	<br>

	<h1 class="page-header text-center">C.R.U.D [Create Read Update Delete]</h1>
	<hr>
	<!-- <div class="row"> -->
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>login/addnew" class="btn btn-primary">Add New</a><br><br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Password</th>
						<!-- <th>Firstname</th> -->
						<!-- <th>Lastname</th> -->
						<!-- <th>Email</th> -->
						<!-- <th>Salt</th> -->
						<th>Created at</th>
						<th>Status</th>
						<th>User_Level</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($users as $user){
						?>
						<tr>
							<td><?php echo $user->user_id; ?></td>
							<td><?php echo $user->user_name; ?></td>
							<td><?php echo $user->user_password; ?></td>
							<!-- <td><?php echo $user->fname; ?></td> -->
							<!-- <td><?php echo $user->lname; ?></td> -->
							<!-- <td><?php echo $user->user_email; ?></td> -->
							<!-- <td><?php echo $user->salt; ?></td> -->
							<td><?php echo $user->datelog; ?></td>
							<td><?php echo $user->status; ?></td>
							<td><?php echo $user->user_level; ?></td>
							<td><a href="<?php echo base_url(); ?>login/edit?id=<?php echo $user->user_id; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a> || <a href="<?php echo base_url(); ?>login/delete/<?php echo $user->user_id; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a> || <a href="<?php echo base_url(); ?>login/view_btn?id=<?php echo $user->user_id; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span>View</a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
			<a href="<?php echo base_url(); ?>login/logs_btn" class="btn btn-primary">LOGS</a><br><br>
	<!-- </div> -->
</div>
</body>
</html>