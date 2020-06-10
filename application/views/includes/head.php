<?php
//session_start();
if (@!$_COOKIE['theme'])
    $_COOKIE['theme'] = 'light';
?>

    <!DOCTYPE html>
<html lang="tr" class="<?php if (@$_COOKIE['theme'] == 'light') echo 'light'; else echo 'dark'; ?>">
<head>

    <title>Müzik Onair</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo  base_url("public/uploads/mafav.png");?>">


    <script src="<?php echo base_url("public/front_end/assets/libraries/jquery-3.4.1.min.js"); ?>"
            crossorigin="anonymous"></script>
    <link rel="stylesheet"
		  href="<?php echo base_url("public/front_end/assets/libraries/bootstrap/bootstrap.min.css"); ?>">
		  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="<?php echo base_url("public/front_end/assets/libraries/bootstrap/popper.min.js"); ?>"></script>
    <script src="<?php echo base_url("public/front_end/assets/libraries/bootstrap/bootstrap.min.js");?>" ></script>
	<script src = "<?php echo base_url("public/front_end/assets/libraries/bootstrap/bootstrap.bundle.min.js");?>" ></script>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url("public/front_end/assets/styles/mdb.min.css");?>" >

	<script src = "<?php echo base_url("public/front_end/assets/libraries/owl-carousel/owl.carousel.js");?>" ></script>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url("public/front_end/assets/libraries/owl-carousel/owl.carousel.min.css");?>" >
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url("public/front_end/assets/libraries/owl-carousel/owl.theme.default.min.css");?>" >

	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url("public/front_end/assets/libraries/fancybox/jquery.fancybox.min.css");?>" >
	<script src = "<?php echo base_url("public/front_end/assets/libraries/fancybox/jquery.fancybox.min.js");?>" ></script >

	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url("public/front_end/assets/styles/app.css");?>?v=<?php echo time(); ?>" >
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url("public/front_end/assets/libraries/font-awesome/css/font-awesome.min.css");?>" >

	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url("public/front_end/assets/libraries/jquery.scrollbar/jquery.scrollbar.css");?>" >
	<script type = "text/javascript" src = "<?php echo base_url("public/front_end/assets/libraries/jquery.scrollbar/jquery.scrollbar.min.js");?>" ></script>
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
	<script type = "text/javascript" src = "<?php echo base_url("public/front_end/assets/libraries/jquery-cookie/jquery.cookie.js");?>" ></script>

	<script src = "<?php echo base_url("public/front_end/assets/libraries/app.js");?>?v=<?php echo time(); ?>" ></script >

	<script >
$(document) . ready(function () {
    // jQuery('.sidebar-category').scrollbar();
    //scrollbar sapıtıyor
});
	</script >
</head>