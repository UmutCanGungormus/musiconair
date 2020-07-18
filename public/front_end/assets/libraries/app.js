$(document).ready(function () {
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

	$(".homeSlider").owlCarousel({
		margin: 20,
		nav: true,
		lazyLoad:true,
		loop: true,
		items:1,
		navText: ['<i class="fa fa-chevron-left left d-none d-md-block d-lg-block d-xl-block"></i>', '<i class="fa fa-chevron-right right d-none d-md-block d-lg-block d-xl-block"></i>'],
		//responsive: true
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

	$(document).on("click", ".top-theme", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		let htmlClass = $('html').attr('class');

		if (htmlClass === 'dark') {
			$('html').attr('class', 'light');
			$('.navbar-brand img').attr('src', base_url + '/public/front_end/assets/images/logo-light-theme.png');
			$('.navbar-brand img').attr('src', base_url + '/public/front_end/assets/images/logo-light-theme.png');
			setCookie('theme', 'light', 30);
			setCookie('logo', 'light', 30);

		} else {
			$('html').attr('class', 'dark');
			$('.navbar-brand img').attr('src', base_url + '/public/front_end/assets/images/logo-black-theme.png');
			$('.navbar-brand img').attr('src', base_url + '/public/front_end/assets/images/logo-black-theme.png');
			setCookie('theme', 'dark', 30);
			setCookie('logo', 'dark', 30);
		}
	});

	$(document).on("click", "i.sidebar-toggle", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		$(".wrapper").toggleClass("toggled", 2000);
	});
});

$(window).on("load", function () {
	if (getCookie("theme") === null && getCookie("logo") === null) {
		setCookie('theme', 'dark', 30);
		setCookie('logo', 'dark', 30);
	}
});

function emoji_error() {
	iziToast.error({
		title: 'Uyarı!',
		message: 'Bir Habere En Fazla 2 Tepki Yapabilirsin.',
		position: 'bottomRight'
	});
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