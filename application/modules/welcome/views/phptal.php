
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="Rafael V. de Oliveira" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="<?php echo base_url('css/bootstrap.css'); ?>" rel="stylesheet" />
	<script type="text/javascript">
		//Endereço do website
		var base_url = '<?php echo base_url(); ?>';
	</script>
	<!-- JQuery & UI -->
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/ui-lightness/jquery-ui.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('js/jquery.ui.datepicker-pt-BR.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/bootstrap-dropdown.js'); ?>"></script>
	
	<style type="text/css">
	body { padding-top: 60px; }
	</style>
</head>
<body>
	<div tal:repeat="a admins">
		${structure php:safe_mailto(a.email, a.name)}<br />
	</div>

</body>
</html>