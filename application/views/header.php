<! DOCKTYPE HTML>
<html lang= "en-US">
<head>
	<title><?php echo $title ?> </title>
	<script src="<?php echo base_url('/js/jquery-1.8.3.min.js') ?>"></script>
	<script src="<?php echo base_url('/js/onload.js') ?>"></script>
</head>

<body>
<header>
<a href="<?php echo site_url('find') ?>">Search</a>
<?php if (!$this->session->userdata('validated')) : ?>
<a href="<?php echo site_url('login') ?>">Login</a>
<?php else : ?>
<a href="<?php echo site_url('hr/do_logout') ?>"> Logout </a>
<?php endif; ?>
</header>	