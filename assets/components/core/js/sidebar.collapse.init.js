(function($)
{
	$('ul.collapse')
	.on('show.bs.collapse', function(e)
	{
		e.stopPropagation();

		if ($(this).closest('#menu').length)
		{
			var t = $(this).parents('.hasSubmenu').length;
			if (t != 1) return;

			var a = $('#menu > div > div > ul > li.hasSubmenu.active > ul').not(this);

			a
			.removeClass('in').addClass('collapse').removeAttr('style')
			.closest('.hasSubmenu.active').removeClass('active');
		}
	})
	.on('shown.bs.collapse', function(e)
	{
		e.stopPropagation();
		
		if ($(this).closest('#menu').length)
			$('#menu *').getNiceScroll().resize();
	});
})(jQuery);