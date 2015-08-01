<?php defined('BASEPATH') or exit('No direct script access are allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<?php echo $before_head; ?>
	<link href="<?php echo base_url('assets/admin/css/bootstrap.min.css" rel="stylesheet'); ?>">
  <link href="<?php echo base_url('assets/admin/css/main.css" rel="stylesheet'); ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
<?php
if($this->ion_auth->logged_in()){
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('admin'); ?>"><span class="glyphicon glyphicon-send" id="logo" aria-hidden="true" style="padding-right: 15px"></span>Amrita</a>
    </div>

    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('admin'); ?>">Home</a></li>
        <li><a href="#">Search</a></li>
        <li><a href="<?php echo site_url('admin/user/repos');?>">Repos</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="<?php echo site_url('admin/user/createRepos');?>">Create Repos</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php print_r($this->ion_auth->user()->row()->username);?> <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <?php
        if($this->ion_auth->is_admin())
        {
        ?>
          <li><a href="<?php echo site_url('admin/groups'); ?>">Groups</a></li>
          <li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
        <?php
        }
        ?>
          <li><a href="<?php echo site_url('admin/user/profile');?>">Profile page</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo site_url('admin/user/logout');?>">Logout</a></li>
        </ul>
      </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<?php
if($this->session->flashdata('message'))
{
?>
  <div class="container" style="padding-top:40px;">
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
      <?php echo $this->session->flashdata('message');?>
    </div>
  </div>
<?php
}
?>
<?php
}else{?>
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('admin'); ?>"><span class="glyphicon glyphicon-send" id="logo" aria-hidden="true" style="padding-right: 15px"></span>Amrita</a>
    </div>

    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('admin'); ?>">Home</a></li>
        <li><a href="#">Search</a></li>
        <li><a href="#">Repos</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<?php
}
?>