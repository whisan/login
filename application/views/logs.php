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

	<br>

	<h1 class="page-header text-center">C.R.U.D [Create Read Update Delete]</h1>
	<hr>
	<!-- <div class="row"> -->

		<div class="col-lg-12">
			<h3>LOGS</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>DID</th>
						<th>User</th>
						<th>Action</th>
						<th>Particular User ID</th>
						<th>Date</th>
						<th>IP address</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($logs as $log){
					?>
						<tr> 
							<td><?php echo $log->did; ?></td>
							<td><?php echo $log->user; ?></td>
							<td><?php echo $log->action; ?></td>
							<td><?php echo $log->particular; ?></td>
							<td><?php echo $log->date; ?></td>
							<td><?php echo $log->ipadd; ?></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
			<div class="col-lg-12">
				<div class="row">
			<a href="<?php echo base_url(); ?>login/view" class="btn btn-primary">BACK</a><br><br>
			<a href="<?php echo base_url(); ?>login/truncate" class="btn btn-danger">TRUNCATE</a><br><br>
				</div>
			</div>
	<!-- </div> -->
</div>
</body>
</html>