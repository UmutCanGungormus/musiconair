new ClipboardJS('.btnCopyLink');
$(document).ready(function () {
	// Get the header
if ($("#storiesSticky").length > 0) {
	// When the user scrolls the page, execute myFunction
	let header = $("#storiesSticky");

	// Get the offset position of the navbar
	let sticky = header.scrollTop();
	$(parent.window.document).scroll(function() {
		// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
		if ($(window).scrollTop() > sticky && $(window).scrollTop() > sticky) {
			header.css("top", "74px");
			if($(window).width() <= 991){
				header.css("left", "0")
			}else{
				header.css("left", "72px")
			}
			;
			header.addClass("fixed-top");
			header.addClass("px-0");
		} else {
			header.removeClass("fixed-top");
			header.removeClass("px-0");
			header.css("top", "0");
			header.css("left", "0");
		}
	});
	
}
	/* Login & Register Modal */
	/*$("#modal-custom").iziModal({
		overlayClose: false,
		overlayColor: 'rgba(0, 0, 0, 0.6)',
		headerColor: (getCookie("theme") === "dark" ? "#202020" : "#eee"),
		background: (getCookie("theme") === "dark" ? "#222222" : "#fff"),
		zindex: 1030,
		bodyOverflow: true
	});*/

	/* JS inside the modal */

	/* Tooltip */
	$('body').tooltip({
		selector: '[data-toggle="tooltip"]',
		trigger: 'hover',
		container: 'body',
		placement: 'top',
		boundary: 'window',
	}).on('click mousedown mouseup', '[data-toggle="tooltip"]', function () {
		$('[data-toggle="tooltip"]').tooltip('dispose');
	});
	/* Tooltip */
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

	$("#modal-custom").on('click', '.giris-yap,.kayit-ol', function () {
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
			if ($(window).width() <= 991) {
				$('div.sidebar-menu').addClass('d-none');
			} else {
				$('div.sidebar-menu').addClass('d-block');
			}
			$('div.sidebar-menu').removeClass('d-none');
			$('div.sidebar-menu').css('width', '265px');
			$('div.sidebar-content').css('width', '265px');
			$('div.sidebar-bottom').removeClass('d-none');
			$('body').append('<div class="menu-shadow"></div>');
			sidebarToggle = false;
		} else {
			$('div.sidebar-menu').removeClass('d-block');

			$('div.sidebar-bottom').addClass('d-none');
			$('div.menu-shadow').remove();
			if ($(window).width() <= 991) {
				$('div.sidebar-menu').addClass('d-none');
			} else {
				$('div.sidebar-menu').css('width', '70px');
				$('div.sidebar-content').css('width', '70px');
			}
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

	/* Theme Color Switcher */
	$(document).on("click", ".top-theme", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		let htmlClass = $('html').attr('class');

		if (htmlClass === 'dark') {
			$('html').attr('class', 'light');
			if ($(".card").hasClass("bg-dark")) {
				$(".card").removeClass("bg-dark");
			}
			if ($(".jumbotron").hasClass("bg-dark")) {
				$(".jumbotron").removeClass("bg-dark");
			}
			if ($("#stories").hasClass("bg-dark")) {
				$("#stories").removeClass("bg-dark");
			}
			$('.navbar-brand img').attr('src', base_url + '/panel/assets/img/logo-light-theme.png');
			$('.navbar-brand img').attr('src', base_url + '/panel/assets/img/logo-light-theme.png');
			setCookie('theme', 'light', 60 * 60 * 24 * 365);
			setCookie('logo', 'light', 60 * 60 * 24 * 365);

		} else {
			$('html').attr('class', 'dark');
			if (!$(".card").hasClass("bg-dark")) {
				$(".card").addClass("bg-dark");
			}
			if (!$("#stories").hasClass("bg-dark")) {
				$("#stories").addClass("bg-dark");
			}
			if (!$(".jumbotron").hasClass("bg-dark")) {
				$(".jumbotron").addClass("bg-dark");
			}
			$('.navbar-brand img').attr('src', base_url + '/panel/assets/img/logo-black-theme.png');
			$('.navbar-brand img').attr('src', base_url + '/panel/assets/img/logo-black-theme.png');
			setCookie('theme', 'dark', 60 * 60 * 24 * 365);
			setCookie('logo', 'dark', 60 * 60 * 24 * 365);
		}
	});
	/* Theme Color Switcher */

	$(document).on("click", ".btnCopyLink", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		iziToast.success({ title: "İşlem Başarılı!", message: "Link Başarıyla Kopyalandı." });
	});

	/* Login */
	$(document).on("click", ".login-form-btn", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		let url = $(this).data("url");
		let formData = new FormData(document.getElementById("login-form"));
		createAjax(url, formData, function () {
			closeModal(".loginModal");
		});
	});
	/* Login */

	/* Register */
	$(document).on("click", ".register-form-btn", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		let url = $(this).data("url");
		let formData = new FormData(document.getElementById("register-form"));
		createAjax(url, formData, function () {
			closeModal(".loginModal");
		});
	});
	/* Register */

	/* Remember Password */
	$(document).on("click", ".remember-password-form-btn", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		let url = $(this).data("url");
		let formData = new FormData(document.getElementById("remember-password-form"));
		createAjax(url, formData, function () {
			closeModal(".rememberPasswordModal");
			closeModal(".loginModal");
		});
	});

	$(document).on("click", ".reset-password-form-btn", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		let url = $(this).data("url");
		let formData = new FormData(document.getElementById("reset-password-form"));
		createAjax(url, formData, function () {
			closeModal(".rememberPasswordModal");
			closeModal(".loginModal");
		});
	});
	/* Remember Password */
});
$(window).on("resize", function () {
	let w = $(this).width();
	if (w <= 991) {
		$('div.sidebar-menu').removeClass('d-block');
		$('div.sidebar-menu').addClass('d-none');
		$('div.menu-shadow').remove();
		$("section.wrapper > div.wrapper2").css("margin-left", "0");
		$("section.wrapper > div.wrapper2").css("margin-right", "0");
		$("#storiesSticky").css("left","0");
	} else {
		$('div.sidebar-menu').removeClass('d-none');
		$('div.sidebar-menu').addClass('d-block');
		$("section.wrapper > div.wrapper2").css("margin-left", "140px");
		$("section.wrapper > div.wrapper2").css("margin-right", "70px");
		$("#storiesSticky").css("left","74px");
	}
});
/* Set Theme Cookie */
$(window).on("load", function () {
	owlWrapperWidth('.owl-wrapper');
	/* Carousel */
	$(".homeSlider").owlCarousel({
		margin: 20,
		nav: true,
		lazyLoad: true,
		loop: true,
		items: 1,
		onInitialized: fixOwl(),
		onRefreshed: fixOwl(),
		navText: ['<i class="fa fa-chevron-left left d-none d-md-block d-lg-block d-xl-block"></i>', '<i class="fa fa-chevron-right right d-none d-md-block d-lg-block d-xl-block"></i>'],
		//responsive: true
	});

	$(".owl-trends").owlCarousel({
		margin: 20,
		nav: true,
		lazyLoad: true,
		loop: true,
		items: 4,
		onInitialized: fixOwl(),
		onRefreshed: fixOwl(),
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
			},
			576: {
				items: 2,
			},
			768: {
				items: 3,
			},
			991: {
				items: 3,
			},
			1199: {
				items: 4,
			}
		},
		navText: ['<i class="fa fa-chevron-left left d-none d-md-block d-lg-block d-xl-block"></i>', '<i class="fa fa-chevron-right right d-none d-md-block d-lg-block d-xl-block"></i>'],
		//responsive: true
	});
	/* Carousel */
	let w = $(this).width();
	if (w <= 991) {
		$('div.sidebar-menu').removeClass('d-block');
		$('div.sidebar-menu').addClass('d-none');
		$('div.menu-shadow').remove();
		$("section.wrapper > div.wrapper2").css("margin-left", "0");
		$("section.wrapper > div.wrapper2").css("margin-right", "0");
	} else {
		$('div.sidebar-menu').removeClass('d-none');
		$('div.sidebar-menu').addClass('d-block');
		$("section.wrapper > div.wrapper2").css("margin-left", "140px");
		$("section.wrapper > div.wrapper2").css("margin-right", "70px");
	}
	if (getCookie("theme") === null && getCookie("logo") === null) {
		setCookie('theme', 'light', 60 * 60 * 24 * 365);
		setCookie('logo', 'light', 60 * 60 * 24 * 365);
	}
});
/* Set Theme Cookie */

/* Functions */

function createAjax(url, formData, successFnc = function () { }, errorFnc = function () { }) {
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
			iziToast.success({ title: response.title, message: response.message, position: "topCenter", displayMode: 'once', });
			successFnc(response);
			if (response.redirect !== null && response.redirect !== "" && response.redirect !== undefined) {
				setTimeout(function () {
					window.location.href = response.redirect;
				}, 2000);
			}
		} else {
			iziToast.error({ title: response.title, message: response.message, position: "topCenter", displayMode: 'once', });
			errorFnc(response);
			if (response.redirect !== null && response.redirect !== "" && response.redirect !== undefined) {
				setTimeout(function () {
					window.location.href = response.redirect;
				}, 2000);
			}
		}
	});
}

function createModal(modalClass = null, modalTitle = null, modalSubTitle = null, width = 600, bodyOverflow = true, padding = "20px", radius = 0, headerColor = "#e20e17", background = "#fff", zindex = 1040, onOpening = function () { }, onOpened = function () { }, onClosing = function () { }, onClosed = function () { }, afterRender = function () { }, onFullScreen = function () { }, onResize = function () { }, fullscreen = true, openFullscreen = false, closeOnEscape = true, closeButton = true, overlayClose = false, autoOpen = 0) {
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

function fixOwl() {
	var $stage = $('.owl-stage'),
		stageW = $stage.width(),
		$el = $('.owl-item'),
		elW = 0;
	$el.each(function () {
		elW += $(this).width() + +($(this).css("margin-right").slice(0, -2))
	});
	if (elW > stageW) {
		$stage.width(elW);
	};
}
// trigger on start and resize
$(window).resize(function () {
	owlWrapperWidth($('.owl-wrapper'));
});
// set owl-carousel width equals to owl-wrapper width
function owlWrapperWidth(selector) {
	$(selector).each(function () {
		$(this).find('.owl-carousel').outerWidth($(this).closest(selector).innerWidth());
	});
}
/* Functions */

var timestamp = function () {
	var timeIndex = 0;
	var shifts = [35, 60, 60 * 3, 60 * 60 * 2, 60 * 60 * 25, 60 * 60 * 24 * 4, 60 * 60 * 24 * 10];
	var now = new Date(); var shift = shifts[timeIndex++] || 0;
	var date = new Date(now - shift * 1000); return date.getTime() / 1000;
};
var changeSkin = function (skin) { location.href = location.href.split('#')[0].split('?')[0] + '?skin=' + skin; };
var getCurrentSkin = function () {
	var header = document.getElementById('header');
	var skin = location.href.split('skin=')[1];
	if (!skin) { skin = 'Snapgram'; }
	if (skin.indexOf('#') !== -1) { skin = skin.split('#')[0]; }
	var skins = {
		Snapgram: {
			avatars: true,
			list: false,
			autoFullScreen: false,
			cubeEffect: true,
			paginationArrows: false
		},
		VemDeZAP: {
			avatars: false,
			list: true,
			autoFullScreen: false,
			cubeEffect: false,
			paginationArrows: true
		},
		FaceSnap: {
			avatars: true,
			list: false,
			autoFullScreen: true,
			cubeEffect: false,
			paginationArrows: true
		},
		Snapssenger: {
			avatars: false,
			list: false,
			autoFullScreen: false,
			cubeEffect: false,
			paginationArrows: false
		}
	};
	var el = document.querySelectorAll('#skin option');
	var total = el.length;
	for (var i = 0; i < total; i++) {
		var what = skin == el[i].value ? true : false;
		if (what) {
			el[i].setAttribute('selected', 'selected');
			header.innerHTML = skin; header.className = skin;
		} else {
			el[i].removeAttribute('selected');
		}
	}
	return { name: skin, params: skins[skin] };
};



