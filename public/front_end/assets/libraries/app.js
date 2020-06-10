	$(function(){
	// if ($.cookie('theme'))
	// {
	// 	var theme = $.cookie('theme');
    //
	// 	$('html').addClass(theme);
    //
	// 	if (theme == 'dark'){
	// 		$('input.search-bar').addClass('bg-color');
	// 		$('input.search-bar').addClass('text-color');
	// 		$('div.top-logo a img').attr('src', 'assets/images/logo-black-theme.png');
	// 	} else {
	// 		$('input.search-bar').addClass('bg-color');
	// 		$('input.search-bar').addClass('text-color');
	// 		$('div.top-logo a img').attr('src', 'assets/images/logo-light-theme.png');
	// 	}
	//
	// } else
	// 	{
	// 		$('html').addClass('light');
	// 		$('input.search-bar').addClass('bg-color');
	// 		$('input.search-bar').addClass('text-color');
	// 	}

	$('div.slider ul li').click(function(){
		var img = $(this).attr('data-img');

		$('div.slider-img img').attr('src', ''+img);
		$('div.slider ul li').removeClass('active');
		
		var title = $(this).attr('data-title');
		$('div.slider-img h5').html(title);	


		var description = $(this).attr('data-description');
		$('div.slider-img p').html(description);	

		var link = $(this).attr('data-link');
		$('div.slider-img a').attr('href', link);

		$(this).addClass('active');

		clearInterval(slider_interval);
		slider_interval = setInterval(slider, 3000);
	});

	slider = function(){
		var count 			= $('div.slider ul li').length;
		var index 			= $('div.slider ul li.active').index();
		var index_plus 		= index + 1;
		
		if (index_plus == count)
		{
			index_plus = 0;
		}

		$('div.slider ul li').removeClass('active');
		$('div.slider ul li:eq('+(index_plus)+')').addClass('active');
		var img = $('div.slider ul li.active').attr('data-img');
		$('div.slider-img img').attr('src', ''+img);
		
		var title = $('div.slider ul li.active').attr('data-title');
		$('div.slider-img h5').html(title);	


		var description = $('div.slider ul li.active').attr('data-description');
		$('div.slider-img p').html(description);	

		var link = $('div.slider ul li.active').attr('data-link');
		$('div.slider-img a').attr('href', link);	
	}

	slider_interval = setInterval(slider, 3000);


	var i = 1;
	$('.sidebar-toggle').click(function(){
		
		$('div.sidebar-menu .category-item div.name').toggle();

		if (i == 1){
			$('div.sidebar-menu').addClass('d-block');
			$('div.sidebar-menu').css('width','265px');
			$('div.sidebar-content').css('width','265px');
			$('div.sidebar-bottom').removeClass('d-none');
			$('body').append('<div class="menu-shadow"></div>');
			// $('body').css('overflow-y','hidden');
			i = 2;
		} else
			{
				$('div.sidebar-menu').removeClass('d-block');
				$('div.sidebar-menu').addClass('d-none');
				$('div.sidebar-menu').css('width','70px');
				$('div.sidebar-content').css('width','70px');
				$('div.sidebar-bottom').addClass('d-none');
				$('div.menu-shadow').remove();
				// $('body').css('overflow-y','scroll');
				i = 1;
			}

		return false;
	})

	$('body').stop().on( "click", 'div.menu-shadow', function() {
		$('div.sidebar-menu div.category-item div.name').hide();

		$('div.sidebar-menu').removeClass('d-block');
		$('div.sidebar-menu').addClass('d-none');
		$('div.sidebar-menu').css('width','70px');
		$('div.sidebar-content').css('width','70px');
		$('div.sidebar-bottom').addClass('d-none');
		$('div.menu-shadow').remove();
		 //$('body').css('overflow-y','scroll');
		i = 1;
	});

	$('.top-theme').click(function(){
		var htmlClass = $('html').attr('class');

		if (htmlClass === 'dark'){
			$('html').attr('class', 'light');
			$('div.top-logo a img').attr('src', 'https://music.mutfakyapim.com.tr/public/front_end/assets/images/logo-light-theme.png');
			 $('div.top-logo a img').attr('src', '/music/public/front_end/assets/images/logo-light-theme.png');
			$.cookie('theme', 'light', {expires: 30});
			$.cookie('logo','light',{expires:30});

		}
		else{
			$('html').attr('class', 'dark');
			$('div.top-logo a img').attr('src', 'https://music.mutfakyapim.com.tr/public/front_end/assets/images/logo-black-theme.png');
			$('div.top-logo a img').attr('src', '/music/public/front_end/assets/images/logo-black-theme.png');
			$.cookie('theme', 'dark', {expires: 30});
			$.cookie('logo','dark',{expires:30});
		}
	})

});