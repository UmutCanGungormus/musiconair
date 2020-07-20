$(document).ready(function () {
	/* Login & Register Modal */
	$("#modal-custom").iziModal({
		overlayClose: false,
		overlayColor: 'rgba(0, 0, 0, 0.6)',
		headerColor: (getCookie("theme") === "dark" ? "#202020" : "#eee"),
		background: (getCookie("theme") === "dark" ? "#222222" : "#fff"),
		zindex: 1030,
		bodyOverflow: true
	});

	/*$(document).on('click', '.trigger-custom', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		$('#modal-custom').iziModal('open');
	});*/

	/* JS inside the modal */

	$("#modal-custom").on('click', 'header a', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		let index = $(this).index();
		$(this).addClass('active').siblings('a').removeClass('active');
		$(this).parents("div").find("section").eq(index).removeClass('d-none').siblings('section').addClass('d-none');

		if ($(this).index() === 0) {
			$("#modal-custom .iziModal-content .icon-close").css('background', '#ddd');
		} else {
			$("#modal-custom .iziModal-content .icon-close").attr('style', '');
		}
	});

	$("#modal-custom").on('click', '.submit', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		let fx = "wobble",  //wobble shake
			$modal = $(this).closest('.iziModal');

		if (!$modal.hasClass(fx)) {
			$modal.addClass(fx);
			setTimeout(function () {
				$modal.removeClass(fx);
			}, 1500);
		}
	});
	/* Login & Register Modal */

	/* Sidebar Toggler */
	let sidebarToggle = true;
	$(document).on("click", ".sidebar-toggle", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		$('div.sidebar-menu .category-item div.name').toggle();

		if (sidebarToggle) {
			$('div.sidebar-menu').addClass('d-block');
			$('div.sidebar-menu').css('width', '265px');
			$('div.sidebar-content').css('width', '265px');
			$('div.sidebar-bottom').removeClass('d-none');
			$('body').append('<div class="menu-shadow"></div>');
			sidebarToggle = false;
		} else {
			$('div.sidebar-menu').removeClass('d-block');
			$('div.sidebar-menu').addClass('d-none');
			$('div.sidebar-menu').css('width', '70px');
			$('div.sidebar-content').css('width', '70px');
			$('div.sidebar-bottom').addClass('d-none');
			$('div.menu-shadow').remove();
			sidebarToggle = true;
		}
	});

	$('body').on("click", 'div.menu-shadow', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		$('div.sidebar-menu div.category-item div.name').hide();

		$('div.sidebar-menu').removeClass('d-block');
		$('div.sidebar-menu').addClass('d-none');
		$('div.sidebar-menu').css('width', '70px');
		$('div.sidebar-content').css('width', '70px');
		$('div.sidebar-bottom').addClass('d-none');
		$('div.menu-shadow').remove();
		sidebarToggle = true;
	});

	$(document).on("click", "i.sidebar-toggle", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		$(".wrapper").toggleClass("toggled", 2000);
	});
	/* Sidebar Toggler */

	/* Carousel */
	$(".homeSlider").owlCarousel({
		margin: 20,
		nav: true,
		lazyLoad: true,
		loop: true,
		items: 1,
		navText: ['<i class="fa fa-chevron-left left d-none d-md-block d-lg-block d-xl-block"></i>', '<i class="fa fa-chevron-right right d-none d-md-block d-lg-block d-xl-block"></i>'],
		//responsive: true
	});

	$(".owl-trends").owlCarousel({
		margin: 20,
		nav: true,
		lazyLoad: true,
		loop: true,
		items: 4,
		navText: ['<i class="fa fa-chevron-left left d-none d-md-block d-lg-block d-xl-block"></i>', '<i class="fa fa-chevron-right right d-none d-md-block d-lg-block d-xl-block"></i>'],
		//responsive: true
	});
	/* Carousel */
	
	/* Theme Color Switcher */
	$(document).on("click", ".top-theme", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		let htmlClass = $('html').attr('class');

		if (htmlClass === 'dark') {
			$('html').attr('class', 'light');
			$('.navbar-brand img').attr('src', base_url + '/panel/assets/img/logo-light-theme.png');
			$('.navbar-brand img').attr('src', base_url + '/panel/assets/img/logo-light-theme.png');
			setCookie('theme', 'light', 60 * 60 * 24 * 365);
			setCookie('logo', 'light', 60 * 60 * 24 * 365);

		} else {
			$('html').attr('class', 'dark');
			$('.navbar-brand img').attr('src', base_url + '/panel/assets/img/logo-black-theme.png');
			$('.navbar-brand img').attr('src', base_url + '/panel/assets/img/logo-black-theme.png');
			setCookie('theme', 'dark', 60 * 60 * 24 * 365);
			setCookie('logo', 'dark', 60 * 60 * 24 * 365);
		}
	});
	/* Theme Color Switcher */

	/* Login */
	$(document).on("click", ".giris-yap", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		let url = $(this).data("url");
		let formData = new FormData(document.getElementById("giris-yap"));
		createAjax(url, formData);
	});
	/* Login */

	/* Register */
	$(document).on("click", ".kayit-ol", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		let url = $(this).data("url");
		let formData = new FormData(document.getElementById("kayit-ol"));
		createAjax(url, formData);
	});
	/* Register */

	/* Register */
	$(document).on("click", ".sifremi-unuttum", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		let url = $(this).data("url");
		let formData = new FormData(document.getElementById("remember-password"));
		createAjax(url, formData);
	});
	/* Register */
});

/* Set Theme Cookie */
$(window).on("load", function () {
	if (getCookie("theme") === null && getCookie("logo") === null) {
		setCookie('theme', 'light', 60 * 60 * 24 * 365);
		setCookie('logo', 'light', 60 * 60 * 24 * 365);
	}
});
/* Set Theme Cookie */

/* Functions */

function createAjax(url, formData, successFnc = function(){},errorFnc = function(){}) {
	$.ajax({
		type: "POST",
		url: url,
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "JSON"
	}).done(function (response) {
		if (response.success) {
			iziToast.success({ title: response.title, message: response.message, position: "topCenter" ,displayMode: 'once',});
			successFnc(response);
			if (response.redirect !== null && response.redirect !== "" && response.redirect !== undefined) {
				setTimeout(function () {
					window.location.href = response.redirect;
				}, 2000);
			}
		} else {
			iziToast.error({ title: response.title, message: response.message, position: "topCenter",displayMode: 'once', });
			errorFnc(response);
			if (response.redirect !== null && response.redirect !== "" && response.redirect !== undefined) {
				setTimeout(function () {
					window.location.href = response.redirect;
				}, 2000);
			}
		}
	});
}

function createModal(modalClass = null, modalTitle = null, modalSubTitle = null, width = 600, bodyOverflow = true, padding = "20px", radius = 0, headerColor = "#e20e17", background = "#fff", onOpening = function () { }, onOpened = function () { }, onClosing = function () { }, onClosed = function () { }, afterRender = function () { }, onFullScreen = function () { }, onResize = function () { }, fullscreen = true, openFullscreen = false, closeOnEscape = true, closeButton = true, overlayClose = false, autoOpen = 0, zindex = 1040) {
	if (modalClass !== "" || modalClass !== null) {
		$(modalClass).iziModal({
			title: modalTitle,
			subtitle: modalSubTitle,
			headerColor: headerColor,
			background: background,
			width: width,
			zindex: zindex,
			fullscreen: fullscreen,
			openFullscreen: openFullscreen,
			closeOnEscape: closeOnEscape,
			closeButton: closeButton,
			overlayClose: overlayClose,
			autoOpen: autoOpen,
			padding: padding,
			bodyOverflow: bodyOverflow,
			radius: radius,
			onFullScreen: onFullScreen,
			onResize: onResize,
			onOpening: onOpening,
			onOpened: onOpened,
			onClosing: onClosing,
			onClosed: onClosed,
			afterRender: afterRender
		});
	}
}

function openModal(modalClass = null, event = function () { }) {
	$(modalClass).iziModal('open', event);
}

function closeModal(modalClass = null, event = function () { }) {
	$(modalClass).iziModal('close', event);
}

function setCookie(name, value, days) {
	let expires;

	if (days) {
		let date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toGMTString();
	} else {
		expires = "";
	}
	document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
}

function getCookie(name) {
	let nameEQ = encodeURIComponent(name) + "=";
	let ca = document.cookie.split(';');
	for (let i = 0; i < ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) === ' ')
			c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) === 0)
			return decodeURIComponent(c.substring(nameEQ.length, c.length));
	}
	return null;
}

function deleteCookie(name) {
	setCookie(name, "", -1);
}

/* Functions */