<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="" />
	<meta name="author" content="Rafael V. de Oliveira">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url('css/bootstrap.css'); ?>" rel="stylesheet">
	<script type="text/javascript">
		//Endereço do website
		var base_url = '<?php echo base_url(); ?>';
	</script>
	<!-- JQuery & UI -->
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/ui-lightness/jquery-ui.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('js/jquery.ui.datepicker-pt-BR.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/bootstrap-dropdown.js'); ?>"></script>
	
	<style type="text/css">
	body { padding-top: 60px; }
	</style>
</head>
<body>
	<div id="navbar-example" class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container" style="width: auto;">
				<a class="brand" href="<?php echo site_url('admin'); ?>">CMS :: </a>
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<?php if ( $this->session->userdata('admin_id') ) : ?><?php echo PHP_EOL; ?>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrators <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo site_url('administrators/admin'); ?>">Administrators</a></li>
								<li><a href="<?php echo site_url('groups/admin'); ?>">Groups</a></li>
							</ul>
						</li>
					</ul>

					<ul class="nav pull-right">
						<li id="fat-menu"><a href="<?php echo site_url('administrators/logout'); ?>" title="Sair"><i class="icon-eject icon-white"></i></a></li>
					</ul>

				</div>
				<?php endif; ?><?php echo PHP_EOL; ?>
			</div>
		</div>
	</div>
	<div class="row-fluid">  
	  <div class="span12">
	    <div class="content">
	    	<?php echo PHP_EOL; ?><?php echo $template['body']; ?><?php echo PHP_EOL; ?>
	    </div>
	  </div>
	</div>
</body>
</html>