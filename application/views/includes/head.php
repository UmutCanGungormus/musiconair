<?php
if (!get_cookie("theme", true)) :
	set_cookie("theme", "light", strtotime("+1 Year"));
endif;
?>

<!DOCTYPE html>
<html lang="tr" class="<?= (get_cookie("theme", true) == 'light' ? "light" : "dark") ?>">

<head>

	<!-- TITLE -->
	<title>Müzik Onair</title>
	<!-- TITLE -->

	<!-- META TAGS -->
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Mutfak Yapım">
	<meta name="keywords" content="MüzikOnAir">
	<meta name="description" content="MüzikOnAir">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<!-- META TAGS -->

	<!-- FAVICON -->
	<link rel="icon" href="<?= base_url("public/uploads/mafav.png"); ?>">
	<!-- FAVICON -->

	<!-- === STYLES === -->
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/v4-shims.min.css">
	<!-- MDBootstrap -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
	<!-- FancyBox -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
	<!-- iziToast -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
	<!-- iziModal -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css" />
	<!-- App -->
	<link rel="stylesheet" href="<?= base_url("public/front_end/assets/styles/app.css") ?>?v=<?= time() ?>">
	<!-- === STYLES === -->

	<!-- SCRIPTS -->
	<!-- Jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- SCRIPTS -->
	<script>
		let base_url = "<?= base_url() ?>";
	</script>
</head>

<body>